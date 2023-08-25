@extends('admin.layouts.guest')
@section('admin_auth_content')
<div class="login-box">
  <div class="login-logo">
  <h3>{{__('Welcome to Admin Login')}}</h3>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{__('Sign in to start your session')}}</p>

      @if ($errors->any())
        <div >
            <div class="font-medium text-red-600">
                {{ __('Error! Something went wrong.') }}
            </div>

            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form role="form" method="POST" action="{{ route('admin.adminlogin') }}">
        @csrf
        <div class="input-group mb-3">
          <input id="email" class="form-control" type="email" name="email" placeholder="admin@example.com" value="{{old('email')}}" autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" class="form-control" type="password" name="password" placeholder="123456789" autocomplete="current-password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <input  type="hidden" name="account_type" value="admin">

        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{__('Login')}}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
    
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection


