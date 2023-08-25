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
                    <li class="breadcrumb-item active">{{__('Create Admin')}}</li>
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
                            <h3 class="card-title">{{__('Create Admin')}}</h3>
                
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{route('admin.super-admin.store')}}"  enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body">

						    	<input type="hidden" name="user_type" value="admin">



                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Name')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="name" placeholder="Name" class="form-control">
                                    </div>
                                </div>

                                

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="email" name="email" placeholder="Email" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Password')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="password" name="password" placeholder="Password" class="form-control" >
                                    </div>
                                </div>


                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Confirm Password')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password"  class="form-control" >
                                    </div>
                                </div>


                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Phone')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="phone" placeholder="Phone" class="form-control" >
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
                                    <img id="image" src="" >
                                    </div>
                                </div>


                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label"> Roles <span class="text-danger">*</span></label>

       
                                    <div class="col-sm-10">
                                        <div class="col-sm-10 text-left">
                                        @foreach($roles as $role) 
                                            <input type="checkbox" name="roles[]" value="{{$role->id}}"> {{ucfirst($role->name)}}
                                         @endforeach
                                        </div>

                                    </div>
                                </div>


                              

                                



                       <!--   <div class="form-group">
                                    <input id="referral" class="form-control" type="text" name="referral" placeholder="referral"  autofocus />
                                </div>

                                
                                <div class="form-group">
                                    <input id="status" class="form-control" type="text" name="status" placeholder="Status"  autofocus />
                                </div>
                         -->




                                <div class="form-group  i-checks row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Is Main Admin')}} </label>

                                    <div class="col-sm-10 pt-1">
                                        <input type="checkbox" class="icheckbox_square-green" name="isMainAdmin" value="1" >
                                    </div>
                                </div>
                
        
                        
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
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


<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                .attr('src', e.target.result)
                .height(80);
                
            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>

@endsection

