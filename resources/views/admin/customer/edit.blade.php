@extends('includes.layouts.admin')
@section('page-title')
    Edit Custome
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Custome </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Custome </li>
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
                            <form action="{{ route('admin.customer.update', $customerDetails->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Title<span class="mandetory">*</span></label>
                                        <select class="select form-control @error('title') is-invalid @enderror" name="title" value={{old('title')}}>
                                            <option value="Mr" @if($customerDetails->title == "Mr") selected @endif>Mr</option>
                                            <option value="Mrs" @if($customerDetails->title == "Mrs") selected @endif>Mrs</option>
                                            <option value="Miss" @if($customerDetails->title == "Miss") selected @endif>Miss</option>
                                            <option value="Sir" @if($customerDetails->title == "Sir") selected @endif>Sir</option>
                                            <option value="Ms" @if($customerDetails->title == "Ms") selected @endif>Ms</option>
                                            <option value="Dr" @if($customerDetails->title == "Dr") selected @endif>Dr</option>
                                            <option value="Madam" @if($customerDetails->title == "Madam") selected @endif>Madam</option>
                                            <option value="Ma'am" @if($customerDetails->title == "Ma'am") selected @endif>Ma'am</option>
                                            <option value="Lord" @if($customerDetails->title == "Lord") selected @endif>Lord</option>
                                            <option value="Lady" @if($customerDetails->title == "Lady") selected @endif>Lady</option>
                                        </select>
                                        @error('title')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="forename" id="forename" mandate="*" label="Forename" value="{{ $customerDetails->forename }}" class="form-control {{ $errors->has('forename') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="surname" id="surname" mandate="*" label="Surname" value="{{ $customerDetails->surname }}" class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}"  />
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="phone" id="phone" mandate="*" label="Phone" value="{{ $customerDetails->phone_no }}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="email" name="email" id="email" mandate="*" label="Email" value="{{ $customerDetails->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" readonly />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="organisation" id="organisation"  label="Organisation" value="{{ $customerDetails->organisation }}" />
                                    </div>

                                </div>


                                <div><span style="font-weight:bold">Primary Address:</span></div>


                                <!--address section start-->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="house_number" id="house_number" mandate="*" label="House Name/Number" value="{{ @$customerDetails->address->values()->get(0)->house_number }}" class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="street" id="street" mandate="*" label="Street" value="{{ @$customerDetails->address->values()->get(0)->street }}" class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="locality" id="locality" label="Locality" value="{{ @$customerDetails->address->values()->get(0)->locality }}"/>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="town" id="town" mandate="*" label="Town " value="{{ @$customerDetails->address->values()->get(0)->town }}" class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="country" id="country" label="Country" value="{{ @$customerDetails->address->values()->get(0)->country }}"/>
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" name="postcode" id="postcode" mandate="*" label="Postcode" value="{{ @$customerDetails->address->values()->get(0)->post_code }}" class="form-control {{ $errors->has('postcode') ? 'is-invalid' : '' }}"/>
                                    </div>

                                </div>
                                <!--address section start-->

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

