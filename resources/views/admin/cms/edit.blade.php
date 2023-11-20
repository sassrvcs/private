@extends('includes.layouts.admin')
@section('page-title')
    Edit Cms
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Accounting Software </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Accounting Software </li>
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
                            <form action="{{ route('admin.cms.update', $cmsDetails->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <x-Forms.Input type="text" readonly label="Title" value="{{ $cmsDetails->title }}"/>
                                    </div>
                                    <div class="col-sm-12" {{$cmsDetails->title!="business-logo"?'hidden' : ''}}>
                                        <x-Forms.Input type="number" label="Price"  name="price" value="{{ $cmsDetails->price }}"/>
                                            {{-- <input type="text" name="price" value="{{ $cmsDetails->price }}" > --}}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Description <span class="mandetory">*</span></label>
                                        <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description">
                                            {!! $cmsDetails->description !!}
                                        </textarea>
                                        <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
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

   $('#image').change(function(){

    let reader = new FileReader();

    reader.onload = (e) => {
      $('#preview-image-before-upload').attr('src', e.target.result);
      //$('#has_image').value(1);
    }

    reader.readAsDataURL(this.files[0]);

   });

});

</script>



@endsection

