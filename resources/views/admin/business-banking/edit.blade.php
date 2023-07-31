@extends('includes.layouts.admin')
@section('page-title')
    Edit Business Banking
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Business Banking </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Business Banking </li>
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
                            <form action="{{ route('admin.business-banking.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Image</label>
                                        <input type="file" mandate="*" name="image" id="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">
                                        @error('image')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if($data->getFirstMediaUrl('business_banking_images'))
                                        <div class="col-sm-3">
                                            <img src="{{  $data->getFirstMediaUrl('business_banking_images')}}"  width="120px">
                                        </div>
                                    @endif

                                    <div class="col-sm-5">
                                        <label>Short Description</label>
                                        <input type="text" mandate="*"
                                            name="short_desc" value="{{ $data->short_description }}"
                                            class="form-control {{ $errors->has('short_desc') ? 'is-invalid' : '' }}"  />
                                            @error('short_desc')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Terms and conditions</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('long_description') ? 'is-invalid' : '' }}" name="terms">
                                            {!! $data->long_description !!}
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

@endsection

