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
                        <li class="breadcrumb-item"><a
                                href="{{route('admin.permissions.index')}}">{{__('Permissions Index')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Crerate Permission')}}</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">

                    <a href="{{route('admin.permissions.index')}}" class="btn btn-sm btn-primary float-right mr-3">
                        {{__('Permission Index')}}</a>
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
                            <h3 class="card-title">{{__('Crerate Permission Form')}}</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{route('admin.permissions.store')}}" method="post">
                            @csrf
                            <div class="card-body">




                                <div class="form-group  row">

                                    <label class="col-sm-4 col-form-label">{{__('Permission Name')}} <span
                                            class="text-danger">*</span></label>

                                    <div class="col-sm-8">
                                        <input type="text" name="name" placeholder="Permission Name"
                                            class="form-control">
                                    </div>
                                </div>

                               


                                <hr>


                                <button type="submit" class="btn btn-primary">Submit</button>


                        </form>








                    </div>
                    <!-- /.card-body -->



                    <div class="card-footer">
                        <p><strong>Note:</strong>
                            Type by correct spelling! <br>
                            <b>Listed Permissions:</b> 

                           settings




                        </p>
                    </div>
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