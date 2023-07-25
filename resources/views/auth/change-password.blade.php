@extends('includes.layouts.admin')
@section('page-title')
    Change Password
@endsection
@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        
            <p class="login-box-msg">{{ __('Change your password') }}</p>

            <form action="{{ route('admin.change-password.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <x-Forms.Input type="password" mandate="*" label="Old Password" id="old_password"
                        name="old_password" value="{{ old('old_password') }}"
                        placeholder="Enter your old password"
                        class="{{ $errors->has('old_password') ? 'is-invalid' : '' }}" />
                    </div>    
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <x-Forms.Input type="password" mandate="*" label="New Password" id="new_password"
                        name="new_password" value="{{ old('new_password') }}"
                        placeholder="Enter your new password"
                        class="{{ $errors->has('new_password') ? 'is-invalid' : '' }}" />
                    </div>    
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <x-Forms.Input type="password" mandate="*" label="Confirm Password" id="confirm_password"
                        name="confirm_password" value="{{ old('confirm_password') }}"
                        placeholder="Confirm your new password"
                        class="{{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" />
                    </div>    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn_baseColor" onclick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';">{{__('Change password')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection