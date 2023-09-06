@extends('includes.layouts.admin')
@section('page-title')
    View Company
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> View Company </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View Company </li>
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
                            <div class="review-sec mt-4">                                
                                <div class="review-ttl-block">
                                    <h5>Company Formation</h5>
                                    <div class="rt-side">
                                        
                                    </div>
                                </div>
                                <div class="review-panel">
                                    <h3>Particulars</h3>
                                    <ul>
                                        <li><strong>Company Name : </strong>{{ $review->companie_name ?? '' }}</li>
                                        <li><strong>Company Type : </strong>{{ $review->companie_type ?? '' }}</li>
                                        <li><strong>Jurisdiction : </strong>{{ $review->jurisdiction->name ?? '' }}</li>
                                        <li><strong>SIC Codes : </strong>
                                            @if (isset($review) && $review->sicCodes->count() > 0)
                                                {{ implode(', ', $review->sicCodes->pluck('name')->toArray()) }}
                                            @else
                                                {{-- No data present --}}
                                            @endif 
                                        </li>
                                    </ul>                                    
                                </div>
                                <div class="review-panel">
                                    @if (!empty($review->forwarding_registered_office_address))
                                        <h3>Registered Office</h3>
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>  52 Danes Court, North End Road, Wembley,
                                                Middlesex, HAQ OAE, United Kingdom
                                            </li>
                                        </ul>
                                        <h3>Forwarding Address</h3>
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>
                                                {{ $review->officeAddressWithForwAddress->house_number ?? '' }},
                                                {{ $review->officeAddressWithForwAddress->street ?? '' }},
                                                {{ $review->officeAddressWithForwAddress->locality ?? '' }},
                                                {{ $review->officeAddressWithForwAddress->town ?? '' }},
                                                {{ $review->officeAddressWithForwAddress->post_code ?? '' }},
                                            </li>
                                        </ul>
                                    @else
                                        {{-- <h3>Registered Office</h3>
                                    <ul>
                                        <li><strong>Address : </strong>9 Raglan Court, Empire Way, WEMBLEY, HA9 0RE, SCOTLAND</li>
                                    </ul> --}}
                                        <h3>Registered Office</h3>
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>
                                                {{ $review->officeAddressWithoutForwAddress->house_number ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->street ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->locality ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->town ?? '' }},
                                                {{ $review->officeAddressWithoutForwAddress->post_code ?? '' }}
                                            </li>
                                        </ul>
                                    @endif                                    
                                </div>
                                <div class="review-panel">

                                    @if (!empty($review->forwarding_business_office_address))
                                        <h3>Buisness Address</h3>
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>52 Danes Court, North End Road, Wembley,
                                                Middlesex, HAQ OAE, United Kingdom
                                            </li>
                                        </ul>
                                        <h3>Forwarding Address</h3>
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>
                                                {{ $review->businessAddressWithForwAddress->house_number ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->street ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->locality ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->town ?? '' }},
                                                {{ $review->businessAddressWithForwAddress->post_code ?? '' }},
                                            </li>
                                        </ul>
                                    @else
                                        {{-- <h3>Registered Office</h3>
                                    <ul>
                                        <li><strong>Address : </strong>9 Raglan Court, Empire Way, WEMBLEY, HA9 0RE, SCOTLAND</li>
                                    </ul> --}}

                                        <h3>Buisness Address</h3>
                                        @if(isset($review) && $review->business_address)
                                        <ul>
                                            <li>
                                                <strong>Address : </strong>
                                                {{ $review->businessAddressWithoutForwAddress->house_number ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->street ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->locality ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->town ?? '' }},
                                                {{ $review->businessAddressWithoutForwAddress->post_code ?? '' }}
                                            </li>
                                        </ul>
                                        @endif
                                    @endif                                    
                                </div>
                                <div class="review-panel">
                                    <h3>Appointments</h3>
                                    @foreach ($appointmentsList as $val)


                                    <ul>
                                        <li><strong>Name : </strong><span style="text-transform:uppercase;">@php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $fullName = $officerDetails['first_name'] . ' ' . $officerDetails['last_name'];
                                            echo $fullName;
                                        @endphp</span> </li>
                                        @php
                                            $positionString = $val['position'];
                                            $positionArray = explode(', ', $val['position']);
                                        @endphp
                                        <li><strong>Roles : </strong>{{ in_array('Director', $positionArray) ? 'Director,' : '' }} {{ in_array('Shareholder', $positionArray) ? 'Shareholder,' : '' }} {{ in_array('Secretary', $positionArray) ? 'Secretary,' : '' }} {{ in_array('PSC', $positionArray) ? 'PSC' : '' }}</li>
                                        <li><strong>Holdings : </strong>@if($val['sh_quantity']) {{$val['sh_quantity']}} x ORDINARY at {{$val['sh_pps']}} {{$val['sh_currency']}} @endif</li>
                                        <li><strong>DOB : </strong>@php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $dob = $officerDetails['dob_day'];
                                            echo $dob;
                                        @endphp</li>
                                        <li><strong>Occupation : </strong>@php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $occupation = $officerDetails['occupation'];
                                            echo $occupation;
                                        @endphp</li>
                                        <li><strong>Nationality : </strong>
                                        @php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $nationality = $officerDetails['nationality'];
                                            $nationality_name = \App\Models\Country::where('id',$nationality)->pluck('name')->first();
                                            echo $nationality_name;
                                        @endphp</li>
                                        <li><strong>Residential Address : </strong> @php
                                            $officerDetails = officer_details_for_appointments_list(isset($val['person_officer_id']) ? $val['person_officer_id']:'');
                                            $add_id = $officerDetails['add_id'];
                                            $address = \App\Models\Address::where('id',$add_id)->first();

                                        @endphp
                                        {{$address->house_number ?? ''}},
                                        {{$address->street ?? ''}},
                                        {{$address->locality ?? ''}},
                                        {{$address->town ?? ''}},
                                        {{$address->country ?? ''}},
                                        {{$address->post_code ?? ''}}
                                        </li>
                                        <li><strong>Service Address : </strong>
                                            @if (isset($val['own_address_id']))
                                                @php
                                                    $service_add = \App\Models\Address::where('id',$val['own_address_id'])->first();
                                                    // dd($service_add);

                                                @endphp
                                                 {{$service_add->house_number ?? ''}},
                                                 {{$service_add->street ?? ''}},
                                                 {{$service_add->locality ?? ''}},
                                                 {{$service_add->town ?? ''}},
                                                 {{$service_add->country ?? ''}},
                                                 {{$service_add->post_code ?? ''}}

                                            @else
                                                @php
                                                    $service_add = \App\Models\Address::where('id',$val['forwarding_address_id'])->first();
                                                    // dd($service_add);

                                                 @endphp
                                                {{$service_add->house_number ?? ''}},
                                                {{$service_add->street ?? ''}},
                                                {{$service_add->locality ?? ''}},
                                                {{$service_add->town ?? ''}},
                                                {{$service_add->country ?? ''}},
                                                {{$service_add->post_code ?? ''}}
                                            @endif
                                        </li>
                                        @if (in_array('PSC', $positionArray))

                                            <li><strong>Name Of Control : </strong> {{$val['noc_vr']}} </li>
                                        @endif
                                    </ul>
                                    @endforeach                                    
                                </div>
                                <div class="review-panel">
                                    <h3>Documents</h3>
                                    <ul>                                        
                                        <li>
                                            <strong>Memorandum and Articles : </strong>
                                            {{ $review && $review->legal_document == 'generic_article' ? 'Generic Limited by Share Articles' : 'Byspoke article of association' }}
                                        </li>
                                    </ul>                                    
                                </div>
                                <hr class="mb-4">
                                <h6>Business Account</h6>
                                <div class="review-panel">
                                    <p>{{ $review->businessBanking->businessBanking->title ?? 'No Merchant Account Selected' }}
                                    </p>                                    
                                </div>
                               
                                <h6>Accounting Software</h6>
                                <div class="review-panel">
                                    <p>{{ $review->businessBanking->accountingSoftware->accounting_software_name ?? 'No Accounting Software Product Selected' }}
                                    </p>                                    
                                </div>
                                <h6>Insurance</h6>
                                <div class="review-panel">
                                    <p>No Insurance Product Selected</p>                                    
                                </div>
                                <h6>Memberships</h6>
                                <div class="review-panel">
                                    <p>No Membership Product Selected</p>                                    
                                </div>
                            </div>

                            <a class="btn btn_baseColor btn-sm mt-2" href="{{ route('admin.company.index') }}"> &nbsp;&nbsp; Back &nbsp;&nbsp;
                            </a>
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

        var maxField = 10; //Input fields increment limitation
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

