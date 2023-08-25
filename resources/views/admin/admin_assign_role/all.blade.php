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
                    @if($isAdmin->isMain == 1)
                    <li class="breadcrumb-item active">{{__('Admin Assign Role Index')}}</li>
                    
                    @endif
                   
                </ol>
                
            
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

                @if($isAdmin->isMain ==1)
                    <div class="card">
                    <div class="card-header">
                        
                        
                            <h3 class="card-title">{{__('Admin Assign Role List')}} </h3>
                       
                        
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                            
                                <tr>
                                <th>{{__('#SL')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Avatar')}}</th>
                                <th>{{__('Roles')}}</th>
                                
                                <th>{{__('Action')}}</th>
                            
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $sl=1;
                                ?>
                                
                                 @foreach($admins as $admin)
                                <tr>
                                   <td>{{$sl++}}</td>

                                    @if($admin->id == $isAdmin->id)
                                    <td>{{$admin->username}} (You)</td>
                                    @else
                                    <td>{{$admin->username}}</td>
                                    @endif

                                    <td><img src="{{URL::to($admin->avatar)}}" width="50px"> </td>

                                    <?php
                                    $admin_id = $admin->id;
                                    $roles = Spatie\Permission\Models\Role::with('users')->whereHas('users', function($q) use($admin_id){
                                                                                $q->where('model_id', $admin_id);
                                                                            })->get();
                                    ?>

                                    @if($admin->id == $isAdmin->id)
                                    <td> @foreach($roles as $role)
                                            [{{$role->name}}]
                                          @endforeach 
                                    </td>
                                    @else
                                    <td> @foreach($roles as $role)
                                            [{{$role->name}}]
                                          @endforeach 
                                    </td>
                                    @endif

                                   

                                    <td>
                                    

                                    
                                    <a class="btn btn-success btn-sm" href="{{route('admin.admin-assign-role.edit', $admin->id)}}">{{__('Assign Role')}}</a>
                     


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
                @endif

                    
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

@endsection