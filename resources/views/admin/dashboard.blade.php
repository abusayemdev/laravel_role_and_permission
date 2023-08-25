@extends('admin.layouts.app')
@section('admin_dashboard_content')

<?php
    $settings = App\Models\Setting::where("Status",1)->first();

    
      $admin_id = Auth::user()->id;
      $admin = App\Models\User::findOrFail($admin_id);
    
?>



<div class="wrapper ">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light admin-dashboar-language-change">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav  ml-auto header-navbar-nav">




      <li class="nav-item">



        <ul class="nav nav-link navbar-right ">
          <li class="mr-1">
            <a data-toggle="dropdown" class="dropdown-toggle text-dark" href="#">
              <span class=" m-t-xs font-bold ">{{ Auth::user()->username ?? '' }} <b
                  class="caret"></b></span>
            </a>
            <div class="dropdown-menu pb-0 animated fadeInRight" style="right:0px !important;">

              <div class="card text-center mb-0 mr-0" style="width:30vw">

                <div class="card-body bg-success ">


                  <div class="image text-center d-flex align-items-center justify-content-center ">
                    <img src="{{URL::to($admin->avatar ?? '')}}" width="100px" class="img-circle elevation-2"
                      alt="User Image">
                  </div>

                  <h5 class="mt-3"> {{ $admin->username }}</h5>

                  <p>{{ $admin->email }}</p>
                </div>


                <div class="btn-div">

                  <ul class="list-group list-group-horizontal justify-content-center">

                    <li class="list-group-item">
                      <a href="{{route('admin.account')}}" class="btn btn-default ">Profile</a>
                    </li>

                    <li class="list-group-item">
                      <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <a class="btn btn-default" role="button" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                          {{__('Log Out') }}
                        </a>
                      </form>
                    </li>

                  </ul>



                </div>




              </div>


            </div>
          </li>
        </ul>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-light elevation-4">
    <!-- Brand Logo -->

    <a href="{{route('admin.dashboard')}}" class="brand-link ">
      <img src="{{URL::to($settings->Logo ?? '')}}" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$settings->Name ?? ''}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::to($admin->avatar ?? '')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">

          <a href="{{route('admin.account')}}" class="d-block">{{ $admin->first_name }} {{ $admin->last_name }}</a>

        </div>
      </div>




      <!-- Sidebar Menu -->
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::is('admin.dashboard')  ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                <span class="language-text">{{__('Dashboard')}}</span>

              </p>
            </a>

          </li>

          @if($admin->isMain == 1)
          <li class="nav-item">
            <a href="{{route('admin.super-admin.index')}}"
              class="nav-link {{Route::is('admin.super-admin.*') ? 'active' : ''}}">

              <i class="nav-icon fa fa-user"></i>
              <p>
                <span class="language-text">Super Admin Settings</span>
              </p>
            </a>
          </li>

          @else


          <li class="nav-item">
            <a href="{{route('admin.super-admin.index')}}"
              class="nav-link {{Route::is('admin.super-admin.*') ? 'active' : ''}}">

              <i class="nav-icon fa fa-user"></i>
              <p>
                <span class="language-text">{{__('Admin Settings')}}</span>
              </p>
            </a>
          </li>

          @endif




          @if(Auth::user()->hasPermissionTo('settings'))
          <li class="nav-item">
            <a href="{{route('admin.settings.index')}}"
              class="nav-link {{Route::is('admin.settings.*') ? 'active' : ''}}">

              <i class="nav-icon fa fa-cog"></i>
              <p>
                <span class="language-text">{{__('Settings')}}</span>
              </p>
            </a>
          </li>
          @endif


          @if($admin->isMain == 1)
          <!-- Roles & Permissions dropdown start -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p class="dropdown-icon-new">
                <span class="language-text">{{__('Role & Permissions')}}</span>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('admin.roles.index')}}"
                  class="nav-link pl-5 {{Route::is('admin.roles.*') ? 'active' : ''}}">

                  <p><span class="language-text">{{__('Roles')}}</span> </p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('admin.permissions.index')}}"
                  class="nav-link pl-5 {{Route::is('admin.permissions.*') ? 'active' : ''}}">

                  <p><span class="language-text">{{__('Permission')}}</span> </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.admin-assign-role.index')}}"
                  class="nav-link pl-5 {{Route::is('admin.admin-assign-role.*') ? 'active' : ''}}">

                  <p><span class="language-text">{{__('Admin assign roles')}}</span> </p>
                </a>
              </li>




            </ul>
          </li>
          <!-- Roles & Permissions dropdown end -->
          @endif





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!--content start-->
  @yield('admin_content')
  <!--content start-->


  <footer class="main-footer admin-dashboar-language-change">
    <strong>Copyright &copy; 2021 <a href="https://matjel.net">Matjel Net</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


<!--dashboard wrapper end-->

<style>
  .list-group-login-item {
    width: 33.3%;
    text-align: center;

  }
</style>



@endsection