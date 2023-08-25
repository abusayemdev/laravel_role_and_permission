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
                    <li class="breadcrumb-item active">{{__('Role Index')}}</li>
                </ol>
                
            
            </div><!-- /.col -->
            <div class="col-sm-6">
                
                <a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Create Role')}}</a>
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

                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{__('Role List')}} </h3>
                    
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            
                                <tr>
                                <th>{{__('#SL')}}</th>
                                <th>{{__('Role')}}</th>
                                <th>{{__('Permissions')}}</th>
                             
                                <th>{{__('Action')}}</th>
                            
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $sl=1;
                                ?>

                                @foreach($roles as $role)

                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'))}}</td>
                                   
                                    
                                    <td>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.roles.edit', $role->id)}}">{{__('Edit')}}</a>
                                    <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="role-delete-{{$role->id}}">{{__('Delete')}} </a>
                                        <form action="{{route('admin.roles.destroy', $role->id)}}" id="role-delete-{{$role->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </td>
                            
                                </tr>
                                @endforeach
                        
                            </tbody>
                    
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
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