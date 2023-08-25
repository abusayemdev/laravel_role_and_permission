
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
                    <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">{{__('Role Index')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Edit Role')}}</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                
                <a href="{{route('admin.roles.index')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Role Index')}}</a>
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
                            <h3 class="card-title">{{__('Edit Role Form')}}</h3>
                
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                            <div class="card-body">


                            <form class="form-horizontal"  action="{{route('admin.roles.update', $role->id)}}" method="POST" enctype="multipart/form-data">  
                            @csrf
                            @method('PUT')
    

                            <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Role Name')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$role->name}}" placeholder="Role Name" class="form-control">
                                    </div>
                                </div>

             


                                <div class="form-group row">
                                    
                                    <label class="col-sm-2 col-form-label"> Permissions <span class="text-danger">*</span></label>

                                    
                                   
                                        <div class="col-sm-10 text-left">
                                            <ul class="list-unstyled row">
                                                <li class="col-sm-12">
                                                    <input type="checkbox" class="all_permissions"> All Permissions
                                                
                                                </li>


                                                @foreach($permissions as $permission)
                                                <li class="col-sm-6">
                                                    <input type="checkbox" class="permission-item" name="permissions[]" value="{{$permission->id}}"> {{ucfirst($permission->name)}}
                                                </li>
                                                @endforeach
                                               
                                            </ul>
                                       
                                        </div>

                                  
                                </div>



                           

            
                        
                            </div>
                            <!-- /.card-body -->
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