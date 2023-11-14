@extends('includes.layouts.admin')
@section('page-title')
    Edit Address list
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Address List </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Address List </li>
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
                            <form action="{{ route('admin.manage-address.update', $address->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Title&nbsp;<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="title" value="{{ $address->title }}"
                                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        />
                                        @error('title')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Description&nbsp;<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="description" value="{{ $address->description }}"
                                            class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                        />
                                        @error('description')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>House No<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="house_number" value="{{ $address->house_number }}"
                                            class="form-control {{ $errors->has('house_number') ? 'is-invalid' : '' }}"
                                        />
                                        @error('house_number')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Street&nbsp;<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="street" value="{{ $address->street }}"
                                            class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}"
                                        />
                                        @error('street')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Locality<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="locality" value="{{ $address->locality }}"
                                            class="form-control {{ $errors->has('locality') ? 'is-invalid' : '' }}"
                                        />
                                        @error('locality')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Town&nbsp;<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="town" value="{{ $address->town }}"
                                            class="form-control {{ $errors->has('town') ? 'is-invalid' : '' }}"
                                        />
                                        @error('town')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>County<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="county" value="{{ $address->county }}"
                                            class="form-control {{ $errors->has('county') ? 'is-invalid' : '' }}"
                                        />
                                        @error('county')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Post Code&nbsp;<span class="mandetory">* </span></label>
                                        <input type="text" mandate="*"
                                            name="post_code" value="{{ $address->post_code }}"
                                            class="form-control {{ $errors->has('post_code') ? 'is-invalid' : '' }}"
                                        />
                                        @error('post_code')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Billing Country<span class="mandetory">* </span></label>
                                        <select name="billing_country" id="" class="form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    {{ $country->id == $address->billing_country ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Price&nbsp;<span class="mandetory">* </span></label>
                                        <input type="number" mandate="*"
                                            name="price" value="{{ $address->price }}"
                                            class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                        />
                                        @error('price')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <br>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="col-md-12 mb-2">
                                            <img id="preview-image-before-upload" src="<?= url("/images/noImage.jpg") ?>"
                                                alt="preview image" style="max-height: 50px; max-width: 50px;">
                                        </div>
                                        <label>Image&nbsp;<span class="mandetory">* </span></label>
                                        <input type="file" mandate="*" name="image" id="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        @error('image')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if($address->getFirstMediaUrl('manage_address_images'))
                                        <div class="col-sm-3">
                                            <img src="{{  $address->getFirstMediaUrl('manage_address_images')}}"  width="120px">
                                        </div>
                                    @endif
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

       var i = 1;
            $("#faq_add").click(function() {
                ++i;
                var row = '<tr class="faqrow" id="row_' + i + '">';
                row += '<td><input type="text" name="faq[' + i + '][question]" placeholder="Question" class="form-control" /></td>';
                row += '<td><input type="text" name="faq[' + i + '][answer]" placeholder="Answer" class="form-control" /><a href="javascript:void(0);" class="btn btn-danger removefaq">remove</a></td>';
                row += '</tr>';

                $("#example1").append(row);
            });
            $("body").on("click", ".removefaq", function () {
                $(this).parents(".faqrow").remove();
            })

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        //$('.ckeditor').ckeditor();

        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input type="text" class="form-control" name="features[]" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button">remove</a></div>'; //New input field html
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
        var faqfieldHTML = '<div><input type="text" class="form-control" name="faq[question][]" placeholder="question" value=""/><input type="text" class="form-control" name="faq[answer][]" placeholder="answer" value=""/><a href="javascript:void(0);" class="btn btn-danger faq_remove_button">remove</a></div>'; //New input field html
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

