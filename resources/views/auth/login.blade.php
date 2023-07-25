@extends('includes.layouts.guest')
@section('page-title')
    Login
@endsection
@section('content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login.process') }}" method="post">
                <div class="input-group mb-3">
                    <input type="email" value="{{ old('email') }}" name="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password"
                        required />
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        {{-- {{ route('password.request') }} --}}
                        {{-- <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div> --}}
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        @csrf()
                        <button type="submit" class="btn btn-block pill_btn btn_baseColor"
                            onClick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';">Sign In</button>
                    </div>
                    <!-- /.col -->
                    @if ($errors->has('wrong_password'))
                        <script>
                            toastr.error('{{ $errors->first('wrong_password') }}')
                        </script>
                    @endif
                    @if (Session::has('inactive'))
                        <script>
                            toastr.error('{{ Session::get('inactive') }}')
                        </script>
                    @endif
                </div>
            </form>
            <br>
            <p class="mb-1">
                {{-- <a href="{{ route('password.request') }}">Forgot Password?</a> --}}
            </p>
            {{-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            {{-- <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> <i class="fab fa-google-plus mr-2"></i> Sign in using Facebook
            </a> --}}
            {{-- <a href="{{ route('register') }}" class="btn btn-block btn_secondaryColor text-white">
                Nominator Registration
            </a> --}}
        </div>
    </div>
    <!-- /.login-card-body -->
    </div>

    @if (Session::has('success'))
        {{-- <div class="toast" data-type="success" data-title="Password Reset" > {{ Session::get('success') }}</div> --}}
        <script>
            toastr.success('{{ Session::get('success') }}')
        </script>
    @endif
@endsection
