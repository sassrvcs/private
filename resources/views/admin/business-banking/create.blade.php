@extends('includes.layouts.admin')
@section('page-title')
    Add Business Banking
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Add Business Banking </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Business Banking </li>
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
                            <form action="{{ route('admin.business-banking.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Image</label>
                                        <input type="file" mandate="*" name="image" id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                        @error('image')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Short Description</label>
                                        <input type="text" mandate="*"
                                            name="short_desc" value="{{ old('short_desc') }}"
                                            class="form-control {{ $errors->has('short_desc') ? 'is-invalid' : '' }}"  />
                                            @error('short_desc')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Terms and conditions</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('terms') ? 'is-invalid' : '' }}" name="terms"></textarea>
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ckeditor').ckeditor();

    });
</script>

@endsection

