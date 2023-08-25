
@extends('admin.dashboard')
@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.super-admin.index')}}">{{__('Admin Index')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Edit Admin')}}</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                
                <a href="{{route('admin.super-admin.index')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Admin Index')}}</a>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row">
        
                <div class="col-lg-12">

                    <!-- Horizontal Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Edit Admin')}}</h3>
                
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal"  action="{{route('admin.super-admin.update', $edit->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @method('PUT')
            
                            <div class="card-body">

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('First Name')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="first_name" placeholder="First Name" value="{{$edit->first_name}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Last Name')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="last_name" placeholder="Last Name" value="{{$edit->last_name}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Username')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="username" placeholder="Username" value="{{$edit->username}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="email" name="email" placeholder="Email" value="{{$edit->email}}" class="form-control" >
                                    </div>
                                </div>


                                
                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Phone')}} </label>

                                    <div class="col-sm-10">
                                        <input type="text" name="phone" placeholder="Phone" value="{{$edit->phone}}" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Address')}} </label>

                                    <div class="col-sm-10">
                                        <input type="text" name="address" placeholder="Address" value="{{$edit->address}}" class="form-control" >
                                    </div>
                                </div>


                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Avatar')}} </label>

                                    <div class="col-sm-10">
                                    <input id="avatar" class="form-control" value="Select a avater..."  type="file"  name="avatar"  onchange="readURL(this);">
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2"></label>

                                    <div class="col-sm-10">
                                    <img id="image" src="{{URL::to($edit->avatar)}}" style="width:80px; height:80px;" >
                                    <img id="image" src="" >
                                    </div>
                                </div>


                              


                              

                        

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Password')}} </label>

                                    <div class="col-sm-10">
                                        <input type="password" name="password" placeholder="Enter New Password" value="" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Password')}} </label>

                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" placeholder="Confirm New Password"  class="form-control" >
                                    </div>
                                </div>
        
                        
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->

                    
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

</div>


@endsection