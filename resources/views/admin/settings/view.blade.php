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
                    <li class="breadcrumb-item"><a href="{{route('admin.settings.index')}}">{{__('Settings Index')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Settings Details')}}</li>
                </ol>
            </div><!-- /.col -->
            <div class="col-sm-6">
                
                <a href="{{route('admin.settings.index')}}" class="btn btn-sm btn-primary float-right mr-3"> {{__('Settings Index')}}</a>
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
                        
                        {{__('Settings Details')}}
                        </h3>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3" >{{__('ID')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->id}}</dd>
                            <dt class="col-sm-3" >{{__('Site Name')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->Name}}</dd>
                            <dt class="col-sm-3" >{{__('Logo')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9"> <img src="{{URL::to($settings->Logo)}}" width="70px"></dd>
                            <dt class="col-sm-3" >{{__('Email')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->Email}}</dd>
                            <dt class="col-sm-3" >{{__('Address')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->Address}}</dd>
                            <dt class="col-sm-3" >{{__('Contact Number')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->ContactNumber}}</dd>
                            <dt class="col-sm-3" >{{__('Whatsapp Number')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->WhatsappNumber}}</dd>
                            <dt class="col-sm-3" >{{__('About')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$settings->About}}</dd>

                        
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

