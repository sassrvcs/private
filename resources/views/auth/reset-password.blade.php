@extends('includes.layouts.guest')
@section('page-title')
    Reset Password
@endsection
@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Generate a new password</p>

            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="hidden" name="email" class="form-control" placeholder="Email" value="{{ $request->email }}">
                </div>
                
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control {{$errors->has('password')? 'is-invalid' : '' }}" placeholder="New Password" required autofocus />
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                    @error('password')
                      <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control {{$errors->has('password_confirmation')? 'is-invalid' : '' }}" placeholder="Confirm Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                      <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn_baseColor btn-block" onclick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';">Save Password</button>
                    </div>
                <!-- /.col -->
                </div>
            </form>

            @guest
                <p class="mt-3 mb-1 text-center loginTxt">
                    <a href="{{ route('login') }}">Login</a>
                </p>    
            @endguest
        </div>
  </div>
@endsection