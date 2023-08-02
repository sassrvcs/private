@extends('includes.layouts.admin')
@section('page-title')
    Edit Accounting Software
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
                            <form action="{{ route('admin.accounting.update', $accounting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Name" id="name"
                                            name="name" value="{{ $accounting->accounting_software_name }}"
                                            placeholder="Enter Accounting Software name"
                                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}" />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Short Description" id="short_desc"
                                            name="short_desc" value="{{ $accounting->short_desc }}"
                                            class="{{ $errors->has('short_desc') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <input type="hidden" id="has_image" name="has_image" value="0">
                                        <span>    
                                        <?php $stored_image = $accounting->image ;?>
                                        <img id="preview-image-before-upload" src="<?= url("/images/$stored_image") ?>" alt="Image" width="50" height="50"/>
                                        </span>
                                            
                                        <span class="sr-only">Choose File</span>
                                        <input type="file" mandate="*" name="image" id="image"
                                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                        @error('image')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror 
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Description</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description">
                                            {!! $accounting->long_desc !!}
                                        </textarea>
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

