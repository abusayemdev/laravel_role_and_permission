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
                    <li class="breadcrumb-item active">{{__('Admin Details')}}</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            
                            {{__('Admin Details')}}
                            </h3>
                        
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">

                                <dt class="col-sm-12 p-3" ><img src="{{URL::to($admin->avatar)}}"  width="100px"> </dt>
                                <dt class="col-sm-3" >{{__('Name')}} </dt>
                                <dd class="col-sm-9">{{$admin->first_name}} {{$admin->last_name}}</dd>

                                <dt class="col-sm-3" >{{__('Username')}} </dt>
                                <dd class="col-sm-9">{{$admin->username}}</dd>

                                <dt class="col-sm-3" >{{__('Admin Type')}} </dt>
                                @if($admin->isMain == 1)
                                <dd class="col-sm-9">{{__('Super Admin')}}</dd>
                                @else
                                <dd class="col-sm-9">{{__('Admin')}}</dd>
                                @endif
                                <dt class="col-sm-3" >{{__('ID')}} </dt>
                                <dd class="col-sm-9">{{$admin->id}}</dd>
                                <dt class="col-sm-3" >{{__('Email')}} </dt>
                                <dd class="col-sm-9">{{$admin->email}}</dd>
                                <dt class="col-sm-3" >{{__('Phone')}} </dt>
                                <dd class="col-sm-9">{{$admin->phone}}</dd>
                                <dt class="col-sm-3" >{{__('Address')}} </dt>
                                <dd class="col-sm-9">{{$admin->address}}</dd>

                            
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

</div>



@endsection

