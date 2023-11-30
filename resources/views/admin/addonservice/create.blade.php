@extends('includes.layouts.admin')
@section('page-title')
    Add Add-on Services
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Add Add-on Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Add-on Services </li>
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
                            <form action="{{ route('admin.addonservice.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Name" id="name"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="Enter Add-on Service name"
                                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}" />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Short Description" id="short_desc"
                                            name="short_desc" value="{{ old('short_desc') }}"
                                            class="{{ $errors->has('short_desc') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="number" mandate="*" label="Price" id="price"
                                            name="price" value="{{ old('price') }}"
                                            class="{{ $errors->has('price') ? 'is-invalid' : '' }}"  />
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Add-On Type</label>
                                        <select name="add_on_type[]" data-placeholder="Choose anything" id="multiple-select-field" class="form-select" multiple>
                                            <option value="Others">Others</option>
                                            <option value="Digital">Digital</option>
                                            <option value="Privacy">Privacy</option>
                                            <option value="Professional">Professional</option>
                                            <option value="Prestige">Prestige</option>
                                            <option value="All_Inclusive">All-Inclusive</option>
                                            <option value="Guarantee">Limited By Guarantee</option>
                                            <option value="Non_Residents">Non Residents</option>
                                            <option value="LLP">LLP</option>
                                            <option value="Eseller">Eseller</option>
                                            <option value="PLC_Package">PLC Package</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Description <span class="mandetory"></span></label>
                                        <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description">{{{ old('description') }}}</textarea>
                                        <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">How it works</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('howItworks') ? 'is-invalid' : '' }}" id="howItworks" name="howItworks">{{{ old('howItworks') }}}</textarea>
                                        <span class="error invalid-feedback">{{ $errors->first('howItworks') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Features</label>
                                        <div class="field_wrapper">
                                            <div class="field-with-btn mb-2">
                                                <input type="text" class="form-control" name="features[]" value=""/>
                                                <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">Add+</a>
                                            </div>
                                        </div>
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
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
    $(document).ready(function(){
     $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    } );

</script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 30; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="field-with-btn mb-2"><input type="text" class="form-control" name="features[]" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

        //faq add

        var faqaddButton = $('.faq_add'); //Add button selector
        var faqwrapper = $('.field_wrapper_faq'); //Input field wrapper
        var faqfieldHTML = '<div class="field-with-btn"><input type="text" class="form-control" name="faq[question][]" placeholder="question" value=""/><input type="text" class="form-control" name="faq[answer][]" placeholder="answer" value=""/><a href="javascript:void(0);" class="btn btn-danger faq_remove_button">Remove</a></div>'; //New input field html
        var y = 1; //Initial field counter is 1

        //Once add button is clicked
        $(faqaddButton).click(function(){
            //Check maximum number of input fields
            if(y < maxField){
                y++; //Increment field counter
                $(faqwrapper).append(faqfieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(faqwrapper).on('click', '.faq_remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            y--; //Decrement field counter
        });
    });
</script>

@endsection

