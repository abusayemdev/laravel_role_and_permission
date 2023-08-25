
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
                    <li class="breadcrumb-item"><a href="{{route('admin.admin-assign-role.index')}}">{{__('Admin Assign Role Index')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Edit Assign Role')}}</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                
                <a href="{{route('admin.admin-assign-role.index')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Admin Assign Role Index')}}</a>
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
                        <form class="form-horizontal"  action="{{route('admin.admin-assign-role.update', $edit->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @method('PUT')
            
                            <div class="card-body">

                                


                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label"> Roles </label>


                                    <div class="col-sm-10 text-left">
                                            <ul class="list-unstyled row">
                                              


                                            @foreach($roles as $role)
                                                <li class="col-sm-12">
                                                <input type="checkbox" name="roles[]" value="{{$role->id}}"> {{ucfirst($role->name)}}
                                                </li>
                                                @endforeach
                                               
                                            </ul>
                                       
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