<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Validator;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;

class AdminController extends Controller
{

    public function index()
    {
        
        return view('admin.home');
    }


    public function account()
    {
    
        $account = User::find(Auth::user()->id);
        return view('admin.admin_profile.profile', compact('account'));
            
       

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
                    $data['phone'] = $request->phone;
                    $data['address'] = $request->address;
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
                    $data['phone'] = $request->phone;
                    $data['address'] = $request->address;
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
                    $data['phone'] = $request->phone;
                    $data['address'] = $request->address;
                    $data['email'] = $request->email;
                    $data['avatar'] = $image_url;
    
                    
                    $update = User::findOrFail($id)->update($data);


                
     
    
                 
                //update without image
                } else {

                    $data['first_name'] = $request->first_name;
                    $data['last_name'] = $request->last_name;
                    $data['username'] = $request->username;
                    $data['phone'] = $request->phone;
                    $data['address'] = $request->address;
                    $data['email'] = $request->email;
    
                   $update = User::findOrFail($id)->update($data);

                 
                }
            }

        
            if ($update) {
                Toastr::success('Admins updateed successfully!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }else {
               Toastr::error('ERROR!', 'Message', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
    }

}
