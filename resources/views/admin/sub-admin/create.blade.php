@extends('includes.layouts.admin')
@section('page-title')
    Add Sub Admin
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Add Sub Admin </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Sub Admin </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('admin.sub-admin.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">First Name&nbsp;<span class="mandetory">* </span></label>
                                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value={{old('first_name')}}>
                                        @error('first_name')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Last Name&nbsp;<span class="mandetory">* </span></label>
                                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" value={{old('last_name')}}>
                                        @error('last_name')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Email&nbsp;<span class="mandetory">* </span></label>
                                        <span class="input-wrapper ">
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value={{old('email')}}>
                                            @error('email')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Phone Number&nbsp;<span class="mandetory">* </span></label>
                                        <span class="input-wrapper ">
                                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value={{old('phone')}}>
                                            @error('phone')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Password&nbsp;<span class="mandetory">* </span></label>
                                        <span class="input-wrapper ">
                                            <input id="password-field" class="form-control @error('password') is-invalid @enderror" type="password" name="password" value={{ old('password')}}>
                                            @error('password')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <button class="btn btn_baseColor btn-sm mt-2" type="submit"
                                    onClick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';"> &nbsp;&nbsp; Save &nbsp;&nbsp;
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

@endsection

