@extends('admin.dashboard')
@section('admin_content')

<?php

  $user_id = Auth::user()->id;
  $user = App\Models\User::findOrFail($user_id);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">


      <div class="row mb-2">
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active">{{__('Profile')}}</li>
          </ol>


        </div><!-- /.col -->
        <div class="col-sm-6">


        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{URL::to($account->avatar)}}"
                  alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$account->name ?? ''}}</h3>

              <p class="text-muted text-center">
                @if($account->isMain == 1)
                {{__('Super Admin')}}
                @else
                {{__('Admin')}}
                @endif

              </p>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="profile">
                

                  <dl class="row">
                      <dt class="col-sm-3" >{{__('Name')}} </dt>
                      <dd class="col-sm-9">{{$account->first_name}} {{$account->last_name}}</dd>

                      <dt class="col-sm-3" >{{__('Username')}} </dt>
                      <dd class="col-sm-9">{{$account->username}}</dd>

                      <dt class="col-sm-3" >{{__('Admin Type')}} </dt>
                      @if($account->isMain == 1)
                      <dd class="col-sm-9">{{__('Super Admin')}}</dd>
                      @else
                      <dd class="col-sm-9">{{__('Admin')}}</dd>
                      @endif
                      <dt class="col-sm-3" >{{__('ID')}} </dt>
                      <dd class="col-sm-9">{{$account->id}}</dd>
                      <dt class="col-sm-3" >{{__('Email')}} </dt>
                      <dd class="col-sm-9">{{$account->email}}</dd>
                      <dt class="col-sm-3" >{{__('Phone')}} </dt>
                      <dd class="col-sm-9">{{$account->phone}}</dd>
                      <dt class="col-sm-3" >{{__('Address')}} </dt>
                      <dd class="col-sm-9">{{$account->address}}</dd>

                  
                  </dl>
              
                </div>
                

                <div class="tab-pane" id="settings">


                  <form class="form-horizontal" action="{{route('admin.account.update', $user_id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf 

                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="first_name" placeholder="First Name" value="{{$user->first_name}}" class="form-control">

                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="last_name" placeholder="Last Name" value="{{$user->last_name}}" class="form-control">

                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="username" placeholder="Username" value="{{$user->username}}" class="form-control">

                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" placeholder="Email" value="{{$user->email}}"
                          class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="text" name="phone" placeholder="Phone" value="{{$user->phone}}"
                          class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="address" placeholder="Address" value="{{$user->address}}"
                          class="form-control">
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-10">
                          <div class="input-group">

                            <input id="avatar" class="form-control d-none" value="Select a avater..." type="file"
                              name="avatar" onchange="readURL(this);">
                            <label for="avatar" class="form-control avatar_label">{{__('Select a avater...')}}...</label>

                            <div class="input-group-append">
                              <label class="input-group-text" for="avatar">Browse</label>
                            </div>


                            </div>
                            <br>

                            <div class="form-group">


                            <img id="image" src="{{URL::to($user->avatar)}}" style="width:80px; height:80px;">
                            <img id="image" src="">

                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Enter New Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" placeholder="Enter New Password" 
                          class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Confirm New Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password_confirmation" placeholder="Confirm New Password"
                          class="form-control">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


</div>























<script>
  function readURL(input) {
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



<style>
  .avatar {
    border: 2px solid white;
    outline: 1px solid lightgrey;
  }
</style>



@endsection