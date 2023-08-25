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
                    <li class="breadcrumb-item active">{{__('Admin Index')}}</li>
                    @else
                    <li class="breadcrumb-item active">{{__('Admin Settings')}}</li>
                    @endif
                   
                </ol>
                
            
            </div><!-- /.col -->
            @if($isAdmin->isMain ==1)
            <div class="col-sm-6">
                <a href="{{route('admin.super-admin.create')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Create Admin')}}</a>
            </div><!-- /.col -->
            @endif
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
                        
                        @if($isAdmin->isMain ==1)
                            <h3 class="card-title">{{__('Admin List')}} </h3>
                        @else
                            <h3 class="card-title">{{__('Admin Settings')}} </h3>
                        @endif
                        
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
                                <th>{{__('Email')}}</th>
                                @if($isAdmin->isMain ==1)
                                <th>{{__('Admin Status')}}</th>
                                @endif
                                <th>{{__('Action')}}</th>
                            
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $sl=1;
                                ?>
                                 @if($isAdmin->isMain ==1)
                                 @foreach($admins as $admin)
                                <tr>
                                   <td>{{$sl++}}</td>

                                    @if($admin->id == $isAdmin->id)
                                    <td>{{$admin->first_name}} {{$admin->last_name}} (You)</td>
                                    @else
                                    <td>{{$admin->first_name}} {{$admin->last_name}}</td>
                                    @endif

                                    <td><img src="{{URL::to($admin->avatar)}}" width="50px"> </td>

                                    @if($admin->id == $isAdmin->id)
                                    <td> {{$admin->email}} (You)</td>
                                    @else
                                    <td> {{$admin->email}}</td>
                                    @endif

                                    @if($isAdmin->isMain ==1)
                                    <td>
                                        
                                        @if($admin->isMain ==1)
                                        <span class="badge badge-primary">{{__('Is Super Admin')}}</span>
                                        @else
                                        <span class="badge badge-secondary">{{__('Make Super Admin')}}</span>
                                        @endif

                                        @if($admin->id != $isAdmin->id)
                                        @if($admin->isMain ==1)
                                        <label class="switch ml-3">
                                            <input type="checkbox" class="input_status" checked value="{{URL::to('/admin/make-admin/'.$admin->id)}}">
                                            <span class="slider round"></span>
                                        </label>
                                        @else
                                        <label class="switch ml-3">
                                            <input type="checkbox" class="input_status" value="{{URL::to('/admin/make-super-admin/'.$admin->id)}}">
                                            <span class="slider round"></span>
                                        </label>
                                        @endif
                                        @endif

                                    </td>
                                    @endif

                                    <td>
                                    @if($admin->id == $isAdmin->id)
                                    <a class="btn btn-info btn-sm" href="{{route('admin.super-admin.show', $admin->id)}}">{{__('View')}}</a>
                                    @endif

                                    @if($admin->id == $isAdmin->id)
                                    <a class="btn btn-success btn-sm" href="{{route('admin.super-admin.edit', $admin->id)}}">{{__('Edit')}}</a>
                                    @endif

                                    @if($admin->id != $isAdmin->id)
                                    <a href="javascript:;" class="btn btn-sm btn-danger delete" data-form-id="super-admin-delete-{{$admin->id}}">{{__('Delete')}} </a>
                                    <form action="{{route('admin.super-admin.destroy', $admin->id)}}" id="super-admin-delete-{{$admin->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    </form>
                                    @endif

                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$isAdmin->name}}</td>
                                    <td><img src="{{URL::to($isAdmin->avatar)}}" width="50px"> </td>
                                    <td> {{$isAdmin->email}}</td>
                                    <td>
                                    <a class="btn btn-info btn-sm" href="{{route('admin.super-admin.show', $isAdmin->id)}}">{{__('View')}}</a>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.super-admin.edit', $isAdmin->id)}}">{{__('Edit')}}</a>
                                    </td>
                                </tr>
                                @endif
                        
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



<style>
.switch {
  position: relative;
  display: inline-block;
  width: 35px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  left: 3px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #0069D9;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 20px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


@endsection