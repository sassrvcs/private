@extends('includes.layouts.admin')
@section('page-title')
    Edit Service
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Service </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Service </li>
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
                            <form action="{{ route('admin.addonservice.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Name" id="name"
                                            name="name" value="{{ $service->service_name }}"
                                            placeholder="Enter Service name"
                                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}" readonly />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Short Description" id="short_desc"
                                            name="short_desc" value="{{ $service->short_desc }}"
                                            class="{{ $errors->has('short_desc') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="number" mandate="*" label="Price" id="price"
                                            name="price" value="{{ $service->price }}"
                                            class="{{ $errors->has('price') ? 'is-invalid' : '' }}"  />
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Add-On Type</label>
                                        <select name="add_on_type[]" data-placeholder="Choose anything" id="multiple-select-field" class="form-select" multiple>
                                            <option value="Others" @if(!empty(json_decode($service->add_on_type)) && in_array('Others',json_decode($service->add_on_type))) selected  @endif>Others</option>
                                            <option value="Digital" @if(!empty(json_decode($service->add_on_type)) && in_array('Digital',json_decode($service->add_on_type))) selected  @endif>Digital</option>
                                            <option value="Privacy" @if(!empty(json_decode($service->add_on_type)) && in_array('Privacy',json_decode($service->add_on_type))) selected  @endif>Privacy</option>
                                            <option value="Professional" @if(!empty(json_decode($service->add_on_type)) && in_array('Professional',json_decode($service->add_on_type))) selected  @endif>Professional</option>
                                            <option value="Prestige" @if(!empty(json_decode($service->add_on_type)) && in_array('Prestige',json_decode($service->add_on_type))) selected  @endif>Prestige</option>
                                            <option value="All Inclusive" @if(!empty(json_decode($service->add_on_type)) && in_array('All Inclusive',json_decode($service->add_on_type))) selected  @endif>All-Inclusive</option>
                                            <option value="Guarantee" @if(!empty(json_decode($service->add_on_type)) && in_array('Guarantee',json_decode($service->add_on_type))) selected  @endif>Limited By Guarantee</option>
                                            <option value="Non Residents" @if(!empty(json_decode($service->add_on_type)) && in_array('Non Residents',json_decode($service->add_on_type))) selected  @endif>Non Residents</option>
                                            <option value="LLP" @if(!empty(json_decode($service->add_on_type)) && in_array('LLP',json_decode($service->add_on_type))) selected  @endif>LLP</option>
                                            <option value="Eseller" @if(!empty(json_decode($service->add_on_type)) && in_array('Eseller',json_decode($service->add_on_type))) selected  @endif>Eseller</option>
                                            <option value="PLC" @if(!empty(json_decode($service->add_on_type)) && in_array('PLC',json_decode($service->add_on_type))) selected  @endif>PLC</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Description <span class="mandetory">*</span></label>
                                        <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description">
                                            {!! $service->long_desc !!}
                                        </textarea>
                                        <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">How it works</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('howItworks') ? 'is-invalid' : '' }}" id="howItworks" name="howItworks"> {!! $service->how_it_works !!}</textarea>
                                        <span class="error invalid-feedback">{{ $errors->first('howItworks') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Features</label>
                                        <div class="field_wrapper">
                                            <div class="features-wrap">
                                                {{-- <input type="text" class="form-control" name="features[]" value=""/>
                                                <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">Add+</a> --}}

                                                @if($service->features)
                                                    @foreach($service->features as $key => $value)
                                                    <?php if($value->feature!=null) { ?>
                                                        <div class="field-with-btn">
                                                            <input type="text" class="form-control" name="features[]" value="{{ $value->feature}}"/>
                                                            <a href="javascript:void(0);" class="btn btn-danger remove_button">Remove</a>
                                                        </div>
                                                    <?php } ?>
                                                    @endforeach
                                                    <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">Add+</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Faqs</label>
                                        <div class="field_wrapper_faq">
                                            <table id="example1" class="table table-bordered text-nowrap key-buttons">
                                                @if($service->service_faqs)
                                                    <tbody>
                                                        @foreach($service->service_faqs as $key => $value)
                                                            <tr class="faqrow" id="row_1">
                                                                <td><input type="text" class="form-control" name="faq[{{$value->id}}][question]" placeholder="question" value="{{ $value->question }}"/></td>
                                                                <td><input type="text" class="form-control" name="faq[{{$value->id}}][answer]" placeholder="answer" value="{{ $value->answer }}"/></td>
                                                                <td><a href="{{route('admin.remove_service_faq',$value->id)}}" class="btn btn-danger remove-tr" data-rowid="1"><i class="fa fa-trash"></i"></a></td>
                                                            </tr>
                                                        @endforeach
                                                        <td>
                                                            <button type="button" name="add" id="faq_add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                        </td>
                                                    </tbody>
                                                @endif
                                            </table>
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

       var i = 1;
            $("#faq_add").click(function() {
                ++i;
                var row = '<tr class="faqrow" id="row_' + i + '">';
                row += '<td><input type="text" name="faq[' + i + '][question]" placeholder="Question" class="form-control" /></td>';
                row += '<td><div class="field-with-btn"><input type="text" name="faq[' + i + '][answer]" placeholder="Answer" class="form-control" /><a href="javascript:void(0);" class="btn btn-danger removefaq"><i class="fa fa-minus"></i></a></div></td>';
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
     $( '#multiple-select-field' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    } );
    $(document).ready(function(){
        //$('.ckeditor').ckeditor();

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


    });
</script>

@endsection

