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
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email_id" value="{{old('email')}}">
                                            <div class="email_err" style="color:red;"></div>
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
                                            <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" value={{old('phone')}}>
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
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">Menu list</label>
                                            <select class="form-select" name="menu[]" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                                @foreach($menu_list as $key => $value)
                                                <option value={{$value->id}}>{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>

                                <button class="btn btn_baseColor btn-sm mt-2" id="submit-btn" type="submit"
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
<script>
    $(document).ready(function(){
     $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    } );
</script>
<script>
    $("#email_id").blur(function() {
            if ($('#email_id').val() != "") {
                var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z]+(?:\.[a-zA-Z]+)+.[a-zA-Z]*$/;
                if ($('#email_id').val().match(validRegex)) {
                    $('#submit-btn').prop('disabled', false);
                    $('.email_err').html('');
                    //$(".submit-btn").css("background-color", "#001B69");
                    return true;

                } else {
                    $('.email_err').html('Please enter a valid email address');
                    $('.serverEmailerror').html('');
                    $('#submit-btn').prop('disabled', true);
                    // $(".submit-btn").css("background-color", "gray");
                    return false;
                }
            }
        });
</script>

@endsection

