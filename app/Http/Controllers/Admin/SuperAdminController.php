<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SuperAdmin\StoreRequest;
use App\Http\Requests\Admin\SuperAdmin\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Validator;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;
use Illuminate\Support\Str;



class SuperAdminController extends Controller
{
    public function index()
    {
       
        $isAdmin = User::where('account_type',"admin")->find(Auth::user()->id); 
        $admins = User::where('account_type',"admin")->get();
        return view('admin.super_admin.all', compact('admins','isAdmin'));
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.super_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        

        $validData = $request->validated();

        if (!$validData) 
        {
            Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->back();

        }else {

            $image=$request->file('avatar');

            if ($image) {
                //image url set
                $image_name=Str::random(20);
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path='backend_image/avatar/';
                $image_url=$upload_path.$image_full_name;
                $success=$image->move($upload_path,$image_full_name);

                $data['first_name'] = $request->first_name;
                $data['last_name'] = $request->last_name;
                $data['username'] = $request->username;
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);
                $data['isMain'] = 0;
                $data['account_type'] = $request->account_type;
                $data['status'] = $request->status;

                $admin = User::create($data);


                $roles = $request['roles']; 

    

                if (isset($roles)) {

                    foreach ($roles as $role) {
                        $role_r = Role::where('id', '=', $role)->findOrFail();            
                        $admin->assignRole($role_r); 
                    }
                }


            } else {

                

                $data['first_name'] = $request->first_name;
                $data['last_name'] = $request->last_name;
                $data['username'] = $request->username;
                $data['email'] = $request->email;
                $data['password'] = Hash::make($request->password);
                $data['account_type'] = $request->account_type;
                $data['status'] = $request->status;
                $data['isMain'] = 0;

                $admin = User::create($data);

                
                $roles = $request['roles']; 
                

                if (isset($roles)) {

                    foreach ($roles as $role) {
                        $role_r = Role::where('id', '=', $role)->firstOrFail();            
                        $admin->assignRole($role_r); 
                    }
                }

            }

    

            if ($admin) {
                Toastr::success('Admins inserted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.super-admin.index');
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        }
    }


    public function make_super_admin($id)
    {
        User::findOrFail($id)->update(['isMain' => 1]);
        Toastr::success('Super admin made successfully!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.super-admin.index');
    }


    public function make_admin($id)
    {
        User::findOrFail($id)->update(['isMain' => 0]);
        Toastr::success('Super admin cancelled!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->route('admin.super-admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.super_admin.view', compact('admin'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $edit = User::findOrFail($id);

        return view('admin.super_admin.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [

            'username' => 'required|unique:users,username,'.Auth::user()->id,
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'password' => 'nullable|min:8|confirmed',

        ]);


        if($validator->fails()){

            $errors = $validator->errors();
            $edit = User::findOrFail($id);
            return view('admin.instructor.edit', compact('errors', 'edit'));
        }


            //update data
            if ($request->password != null) {

                $new_password = Hash::make($request->password);

                $image=$request->file('avatar');
            
                //update with image
                if ($image) {
        
                    //image url set
                    $image_name=Str::random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='backend_image/avatar/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
    
                    //remove old image
                    $old_image = User::findOrFail($id);
                    $old_image_path = $old_image->avatar;
                    

                    if ($old_image_path && file_exists($old_image_path)) {
                        $delete_old_image = unlink($old_image_path);
                    }

    

                    $data['first_name'] = $request->first_name;
                    $data['last_name'] = $request->last_name;
                    $data['username'] = $request->username;
                    $data['email'] = $request->email;
                    $data['password'] = $new_password;
                    $data['password_changed_at'] = now();
                    $data['avatar'] = $image_url;
                    
                    $update = User::findOrFail($id)->update($data);

                  
    
                 
                //update without image
                } else {


                    $data['first_name'] = $request->first_name;
                    $data['last_name'] = $request->last_name;
                    $data['username'] = $request->username;
                    $data['email'] = $request->email;
                    $data['password'] = $new_password;
                    $data['password_changed_at'] = now();
                   
                    $update = User::findOrFail($id)->update($data);


              
    
                 
                }
                
            }else {

                $image=$request->file('avatar');
            
                //update with image
                if ($image) {
        
                    //image url set
                    $image_name=Str::random(20);
                    $ext=strtolower($image->getClientOriginalExtension());
                    $image_full_name=$image_name.".".$ext;
                    $upload_path='backend_image/avatar/';
                    $image_url=$upload_path.$image_full_name;
                    $success=$image->move($upload_path,$image_full_name);
    
                    //remove old image
                    $old_image = User::findOrFail($id);
                    $old_image_path = $old_image->avatar;
                    
                    if ($old_image_path && file_exists($old_image_path)) {
                        $delete_old_image = unlink($old_image_path);
                    }

                    $data['first_name'] = $request->first_name;
                    $data['last_name'] = $request->last_name;
                    $data['username'] = $request->username;
                    $data['email'] = $request->email;
                    $data['avatar'] = $image_url;
    
                    
                    $update = User::findOrFail($id)->update($data);


                
     
    
                 
                //update without image
                } else {

                    $data['first_name'] = $request->first_name;
                    $data['last_name'] = $request->last_name;
                    $data['username'] = $request->username;
                    $data['email'] = $request->email;
    
                   $update = User::findOrFail($id)->update($data);

                 
                }
            }

        
            if ($update) {
                Toastr::success('Admins updateed successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.super-admin.show', $id);
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return back();
            }
        

    }


    


    public function destroy($id)
    {
        $admin = User::findOrFail($id);

        $old_image_path = $admin->avatar;

        if ($old_image_path && file_exists($old_image_path)) {
            $delete_old_image = unlink($old_image_path);
        }

        $delete_admin = User::findOrFail($id)->delete();
        
        if ($delete_admin) {
            Toastr::success('Admin deleted successfully!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.super-admin.index');

        }else {
            Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.super-admin.index');
        }
    }
}
