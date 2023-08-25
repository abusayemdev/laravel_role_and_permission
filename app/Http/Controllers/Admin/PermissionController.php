<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class PermissionController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return IlluminateHttpResponse
    */
    public function index() {
        $permissions = Permission::all(); //Get all permissions

        return view('admin.permissions.all', compact('permissions'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return IlluminateHttpResponse
    */
    public function create() {
        $roles = Role::get(); //Get all roles

        return view('admin.permissions.create', compact('roles'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  IlluminateHttpRequest  $request
    * @return IlluminateHttpResponse
    */
    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('admin.permissions.index');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return IlluminateHttpResponse
    */
    public function show($id) {
        return redirect('admin.permissions.index');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return IlluminateHttpResponse
    */
    public function edit($id) {
        $permission = Permission::findOrFail($id);
        $roles = Role::get();

        return view('admin.permissions.edit', compact('permission','roles'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  IlluminateHttpRequest  $request
    * @param  int  $id
    * @return IlluminateHttpResponse
    */
    public function update(Request $request, $id) {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('admin.permissions.index');

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return IlluminateHttpResponse
    */
    public function destroy($id) {
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission 
        if ($permission->name == "Administer roles & permissions") {
                return redirect()->route('admin.permissions.index');
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index');

    }
}
