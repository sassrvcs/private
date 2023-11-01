@extends('includes.layouts.admin')
@section('page-title')
    Send Email
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Send Email </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Send Email To User</li>
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
                            <form action="{{ route('admin.company.sent_email_user') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <x-Forms.Input type="text" mandate="*" label="User Email" id="name"
                                            name="email" value="{{ $user->email }}"
                                            placeholder="Enter user email"
                                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                             readonly />
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="hidden" id=""
                                            name="user_name" value="{{ $user->forename }}"
                                            placeholder="Enter user name"
                                             readonly />
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Body</label>
                                        <textarea class="ckeditor form-control" name="body">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="">Attachments</label>
                                        <input type="file" name="attachments[]" multiple>
                                    </div>
                                </div>
                                <button class="btn btn_baseColor btn-sm mt-2" type="submit"
                                    onClick="this.form.submit(); this.disabled=true; this.innerText='Hold on...';"> &nbsp;&nbsp; Send &nbsp;&nbsp;
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>

@endsection

