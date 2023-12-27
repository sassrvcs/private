@extends('includes.layouts.admin')
@section('page-title')
    Edit Package
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Edit Package </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Package </li>
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
                            <form action="{{ route('admin.package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" mandate="*" label="Name" id="name"
                                            name="name" value="{{ $package->package_name }}"
                                            placeholder="Enter package name"
                                            class="{{ $errors->has('name') ? 'is-invalid' : '' }}" readonly />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="text" label="Short Description" id="short_desc"
                                            name="short_desc" value="{{ $package->short_description }}"
                                            class="{{ $errors->has('short_desc') ? 'is-invalid' : '' }}"  />
                                    </div>

                                    <div class="col-sm-4">
                                        <x-Forms.Input type="number" mandate="*" label="Price" id="price"
                                            name="price" value="{{ $package->package_price }}"
                                            class="{{ $errors->has('price') ? 'is-invalid' : '' }}"  />
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Package Type&nbsp;<span class="mandetory">* </span></label>
                                        <select name="package_type" id="package_type" class="form-control">
                                            <option value="shares" {{ $package->package_type=='shares'?'selected':'' }}>Limited By Shares</option>
                                            <option value="Guarantee" {{ $package->package_type=='Guarantee'?'selected':''}}>Limited By Guarantee</option>
                                            <option value="Non_Residents" {{ $package->package_type=='Non_Residents'?'selected':'' }}>Non Residents</option>
                                            <option value="LLP" {{ $package->package_type=='LLP'?'selected':'' }}>LLP</option>
                                            <option value="Eseller" {{ $package->package_type=='Eseller'?'selected':'' }}>Eseller</option>
                                            <option value="PLC_Package" {{ $package->package_type=='PLC_Package'?'selected':'' }}>PLC Package</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-4">
                                    <div class="form-check">
                                        <x-Forms.Input type="text" label="Special Offer" id="special_offer"
                                            name="special_offer" value="{{ trim($package->special_offer) }}"
                                            class="{{ $errors->has('special_offer') ? 'is-invalid' : '' }}"  />
                                    </div>
                                </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Description</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description">
                                            {!! $package->description !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Features</label>
                                        <div class="field_wrapper">
                                            <div class="features-wrap">
                                                {{-- <input type="text" class="form-control" name="features[]" value=""/>
                                                <a href="javascript:void(0);" class="btn btn-primary add_button" title="Add field">add</a> --}}
                                                @if($package->features)
                                                    @foreach($package->features as $key => $value)
                                                    <div class="field-with-btn mt-1">
                                                        <input type="text" class="form-control" name="features[]" value="{{ $value->feature}}"/>

                                                        <a href="javascript:void(0);" class="btn btn-danger remove_button">Remove</a>
                                                    </div>
                                                    @endforeach
                                                    <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field"><i class="fa fa-plus"></i></a>
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
                                                @if($package->faqs)
                                                    <tbody>
                                                        @foreach($package->faqs as $key => $value)
                                                            <tr class="faqrow" id="row_1">
                                                                <td><input type="text" class="form-control" name="faq[{{$value->id}}][question]" placeholder="question" value="{{ $value->question }}"/></td>
                                                                <td><input type="text" class="form-control" name="faq[{{$value->id}}][answer]" placeholder="answer" value="{{ $value->answer }}"/></td>

                                                            </tr>
                                                        @endforeach
                                                        <td>
                                                            <button type="button" name="add" id="faq_add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                                            {{-- <button type="button" class="btn btn-danger remove-tr" data-rowid="1"><i class="fa fa-trash"></i></button> --}}
                                                        </td>
                                                    </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="">Please note</label>
                                        <textarea class="ckeditor form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes">{!! $package->notes !!}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label for="">Package Icon</label>
                                        <input type="file" name="package_icon" class="form-control">
                                    </div>
                                    @if($package->getFirstMediaUrl('package_icon'))
                                        <div class="col-sm-3">
                                            <img src="{{  $package->getFirstMediaUrl('package_icon')}}"  width="120px">
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Online Formation Within</label>
                                            <input type="text" name="online_formation_within" class="form-control" value="{{$package->online_formation_within}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Facilities</label>
                                            {{-- @php dd(json_decode($package->facilities)); @endphp --}}
                                            <select class="form-select" name="facility[]" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                                @foreach($facility as $key => $value)
                                                <option value={{$value->id}} @if(!empty(json_decode($package->facilities)) && in_array($value->id,json_decode($package->facilities))) selected  @endif>{{$value->name}}</option>
                                                @endforeach
                                            </select>
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
        //$('.ckeditor').ckeditor();

        var maxField = 30; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="field-with-btn mb-2"><input type="text" class="form-control" name="features[]" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button"><i class="fa fa-minus"></i></a></div>'; //New input field html
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
        var faqfieldHTML = '<div><input type="text" class="form-control" name="faq[question][]" placeholder="question" value=""/><input type="text" class="form-control" name="faq[answer][]" placeholder="answer" value=""/><a href="javascript:void(0);" class="btn btn-danger faq_remove_button"><i class="fa fa-minus"></i></a></div>'; //New input field html
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

@endsection

