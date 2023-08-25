@extends('frontend.layouts.app')
@section('dashboard_content')

<!--dashboard wrapper start-->
<div class="main-wrapper">
    <?php
        $settings = App\Models\Setting::where("Status",1)->first();
    ?>
    <!--header start-->
    <div class="header">
        <div class="header-left">
            <a href="{{route('dashboard')}}" class="logo"> <img src="{{URL::to($settings->Logo ?? '')}}" width="50" height="70" alt="logo"> <span class="logoclass">{{$settings->Name ?? ''}}</span> </a>
            <a href="{{route('dashboard')}}" class="logo logo-small"> <img src="{{URL::to($settings->Logo ?? '')}}" alt="Logo" width="30" height="30"> </a>
        </div>
        <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
        <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
        <ul class="nav user-menu">
           
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">{{ Auth::user()->username ?? '' }}  </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                       
                        <div>
                            <h6>{{__('Username:')}} {{ Auth::user()->username ?? '' }}</h6>
                            
                        </div>
                    </div> 
                    <p class="pl-3">{{__('Email:')}} {{ Auth::user()->email ?? '' }}</p> 

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item mb-2 " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
       
    </div>
    <!--header end-->


    <!--sidebar start-->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="{{Route::is('dashboard') ? 'active' : ''}}"> <a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                    <li class="list-divider"></li>

                    <li class="{{Route::is('user-profile') ? 'active' : ''}}" > <a href="{{route('user-profile')}}"><i class="fas fa-user"></i> <span> Profile </span></a></li>
<!-- 
                    <li class="submenu"> <a href="#"><i class="fas fa-dollar-sign"></i> <span> Currency </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href=""> All currencies </a></li>
                            <li><a href=""> Add currency </a></li>
                        </ul>
                    </li> -->
                   


                </ul>
            </div>
        </div>
    </div>
    <!--sidebar end-->

    @yield('content')


</div>
<!--dashboard wrapper end-->

@endsection