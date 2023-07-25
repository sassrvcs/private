@extends('includes.layouts.guest')
@section('page-title')
    Forget Password
@endsection
@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Retrieve a new password') }}</p>

            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="Email" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn_baseColor btn-block" onclick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';">{{__('Request new password')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mt-3 mb-1">
                {{__('Have Account?')}}
                <a href="{{ route('login') }}">{{__('Login')}}</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
