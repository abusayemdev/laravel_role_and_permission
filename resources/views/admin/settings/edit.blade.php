
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
                    <li class="breadcrumb-item active">{{__('Edit Settings')}}</li>
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

                    <!-- Horizontal Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Edit Settings Form')}}</h3>
                
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal"  action="{{route('admin.settings.update', $edit->id)}}" method="POST" enctype="multipart/form-data">  
                        @csrf
                        @method('PUT')
            
                            <div class="card-body">
                                <div class="form-group  row">
                                
                                    <label class="col-sm-2 col-form-label">{{__('Site Name')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" name="Name" value="{{$edit->Name}}" placeholder="Site Name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Email')}} <span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="email" name="Email" value="{{$edit->Email}}" placeholder="Site Email" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Address')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="Address" value="{{$edit->Address}}" placeholder="Address" class="form-control" >
                                    </div>
                                </div>

                                

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Contact Number')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="ContactNumber" value="{{$edit->ContactNumber}}" placeholder="Contact Number" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Whatsapp Number')}}</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="WhatsappNumber" value="{{$edit->WhatsappNumber}}" placeholder="Whatsapp Number" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('About')}} </label>

                                    <div class="col-sm-10">
                                    <textarea name="About" id="About" placeholder="About"  class="form-control" rows="3">{{$edit->About}}</textarea>

                                    </div>
                                </div>

                                

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label">{{__('Site Logo')}}</label>

                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            
                                            <input id="logo" type="file" name="Logo" class="custom-file-input" accept="image/*" onchange="readURL(this);" >
                                            <label for="logo" class="custom-file-label">{{__('Choose file')}}...</label>
                                            
                                        </div> 
                                    </div>
                                </div>

                                <div class="form-group  row">
                                    
                                    <label class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        <img id="image" src="{{URL::to($edit->Logo)}}" style="width:80px; height:80px;" >
                                        <img id="image" src="" >
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