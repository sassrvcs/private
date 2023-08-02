@extends('includes.layouts.admin')
@section('page-title')
    Add Package
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Add Package </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Package </li>
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
                            <form action="{{ route('admin.package.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Name" id="name"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="Enter package name"
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
                                        <label for="">Description</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"></textarea>
                                        @error('description')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Features</label>
                                        <div class="field_wrapper">
                                            <div class="field-with-btn mb-2">
                                                <input type="text" class="form-control" name="features[]" value=""/>
                                                <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Faqs</label>
                                        <div class="field_wrapper_faq">
                                            {{-- <div>
                                                <input type="text" class="form-control" name="faq[0][question]" placeholder="question" value=""/>
                                                <input type="text" class="form-control" name="faq[0][answer]" placeholder="answer" value=""/>
                                                <a href="javascript:void(0);" class="btn btn-primary faq_add" title="Add field">add</a>
                                            </div> --}}
                                            <table id="example1" class="table table-bordered text-nowrap key-buttons">
                                                <tr class="faqrow" id="row_1">
                                                    <td><input type="text" class="form-control" name="faq[1][question]" placeholder="Question" value=""/></td>
                                                    <td><input type="text" class="form-control" name="faq[1][answer]" placeholder="Answer" value=""/></td>
                                                    <td>
                                                        <button type="button" name="add" id="faq_add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                        {{-- <button type="button" class="btn btn-danger remove-tr" data-rowid="1"><i class="fa fa-trash"></i></button> --}}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Please note</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Package Icon </label>
                                        <div class="col-md-12 mb-2">
                                            <img id="preview-image-before-upload" src="<?= url("/images/noImage.jpg") ?>"
                                                alt="preview image" style="max-height: 50px; max-width: 50px;">
                                        </div>
                                        <input type="file" name="package_icon" id="package_icon" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Online Formation Within</label>
                                            <input type="text" name="online_formation_within" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Facilities</label>
                                            <select class="form-select" name="facility[]" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                                @foreach($facility as $key => $value)
                                                <option value={{$value->id}}>{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Online Formation Within</label>
                                            <input type="text" name="online_formation_within" class="form-control">
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek1" type="checkbox" name="chek1">
                                            <label for="chek1">Email Copy Of Certificate Of Incorporation</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek2" type="checkbox" name="chek2">
                                            <label for="chek2">Email Copy Of Memorandum & Articles Of Association</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek3" type="checkbox" name="chek3">
                                            <label for="chek3">Email Copy Of Share Certificate(S)</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek4" type="checkbox" name="chek4">
                                            <label for="chek4">Compnay Registration</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek5" type="checkbox" name="chek5">
                                            <label for="chek5">Free Online Company Manager To Maintain Your Companies</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek6" type="checkbox" name="chek6">
                                            <label for="chek6">Companies House Filing Fee Paid By Us</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek7" type="checkbox" name="chek7">
                                            <label for="chek7">Free High Street Business Bank Account</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek8" type="checkbox" name="chek8">
                                            <label for="chek8">Free Online Company Manager To Maintain Your Companies</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek9" type="checkbox" name="chek9">
                                            <label for="chek9">Registered Office Address</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek10" type="checkbox" name="chek10">
                                            <label for="chek10">Free .Com Or .Co.Uk Domain Name</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek11" type="checkbox" name="chek11">
                                            <label for="chek11">Printed Certificate Of Incorporation</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek12" type="checkbox" name="chek12">
                                            <label for="chek12">Printed & Bound Memorandum & Articles Of Association</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek13" type="checkbox" name="chek13">
                                            <label for="chek13">Printed Share Certificate(S)</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek14" type="checkbox" name="chek14">
                                            <label for="chek14">1 Month Free Call Answering + Business Telephone Number</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek15" type="checkbox" name="chek15">
                                            <label for="chek15">VAT Registration</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek16" type="checkbox" name="chek16">
                                            <label for="chek16">Filing Of The First Confirmation Statement</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek17" type="checkbox" name="chek17">
                                            <label for="chek17">GDPR Compliance</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek18" type="checkbox" name="chek18" >
                                            <label for="chek18">PAYE Registration</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek19" type="checkbox" name="chek19" value="yes">
                                            <label for="chek19">Certificate Of Good Standing</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek20" type="checkbox" name="chek20" value="yes">
                                            <label for="chek20">Corporate Hijack Protection</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek21" type="checkbox" name="chek21" value="yes">
                                            <label for="chek21">ICO Registration</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek22" type="checkbox" name="chek22" value="yes">
                                            <label for="chek22">Logo Design</label>
                                        </div>
                                        <div class="px-0 form-check">
                                            <input class="" id="chek23" type="checkbox" name="chek23" value="yes">
                                            <label for="chek23">Website Design</label>
                                        </div>
                                    </div>
                                </div> --}}
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
        var fieldHTML = '<div class="field-with-btn mb-2"><input type="text" class="form-control" name="features[]" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button">remove</a></div>'; //New input field html
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


    });
</script>
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
<script type="text/javascript">

    $(document).ready(function(){

       $('#package_icon').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {
          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

    </script>

@endsection

