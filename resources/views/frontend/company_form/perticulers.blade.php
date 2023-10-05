@extends('layouts.master')
@section('content')
<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }}">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg') }}"></span>
                </div>
                <figcaption>My <span>Account</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="/">Home</a></li>
                <li><a>Digital Packages</a></li>
            </ul>
        </div>
        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <div class="icon-container">
                <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg') }}">
            </div>
            <div class="text-box">
                <p>Free Consultations 24/7</p>
                <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
            </div>
        </div>
    </div>
</section>

<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        <div class="companies-wrap">
            <div class="row woo-account">
                <div class="col-md-12">
                    @include('layouts.navbar')
                </div>
                <div class="col-md-12">
                    @php
                        $company_form = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->first();
                        $buisness_ess = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','BusinessEssential')->first();
                        $summary = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','Review')->first();
                    @endphp
                    <div class="particulars-form-wrap">
                        <div class="particulars-top-step">
                            <div class="top-step-items active">
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            @if ($buisness_ess)
                                <div class="top-step-items">
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" > <strong>2.Business Essentials</strong>
                                        <span>Products & Services</span>
                                    </a>
                                </div>

                            @else
                                <div class="top-step-items">
                                    <strong>2.Business Essentials</strong>
                                    <span>Products & Services</span>
                                </div>
                            @endif

                            @if ($summary)
                                <div class="top-step-items ">
                                   <a href="{{route('review.index', ['order' => $_GET['order'] ?? '', 'section' => 'Review', 'step' => 'review'])}}"> <strong>3.Summary</strong>
                                    <span>Details about your order</span>
                                </a>
                                </div>
                            @else
                                <div class="top-step-items ">
                                    <strong>3.Summary</strong>
                                    <span>Details about your order</span>
                                </div>
                            @endif


                            <div class="top-step-items">
                                <strong>4.Delivery & Partner Services</strong>
                                <span>Delivery & Partner Details</span>
                            </div>
                        </div>

                        <div class="particulars-bottom-step">
                            @php
                                $particular_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->where('step','particulars')->first();
                            @endphp

                            @if ($particular_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" style="color: #ffffff;"> Particulars</a>
                                    </p>
                                </div>
                            @else
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" style="color: #ffffff;"> Particulars</a>
                                    </p>
                                </div>

                            @endif


                            @php
                                $register_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->where('step','register-address')->first();
                            @endphp
                            @if ($register_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('registered-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" style="color: #ffffff;"> Registered Address </a>
                                    </p>
                                </div>
                            @else
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                         Registered Address
                                    </p>
                                </div>

                            @endif

                            @php
                                $buisness_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->where('step','business-address')->first();
                            @endphp

                            @if ($buisness_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('choose-address-business', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'business-address']) }}" style="color: #ffffff;"> Business Address </a>
                                    </p>
                                </div>

                            @else
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Business Address</p>
                                </div>

                            @endif

                            @php
                                $appointment_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->where('step','appointments')->first();
                            @endphp

                            @if ($appointment_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('appointments', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'appointments']) }}" style="color: #ffffff;"> Appointment</a>
                                    </p>
                                </div>
                            @else
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Appointment</p>
                                </div>

                            @endif

                            @php
                                $doc_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->where('step','document')->first();
                            @endphp

                            @if ($doc_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        @if( !empty($companyFormationStep->step_name) )
                                            <a href="{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'document']) }}" style="color: #ffffff;"> Document </a>
                                        @else
                                            Document
                                        @endif
                                    </p>
                                </div>
                            @else
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Document</p>
                                </div>
                            @endif


                        </div>

                        <div class="form-wrap">
                            <div class="form-info-block">
                                <h4>Particulars</h4>
                                <div class="desc">
                                    <div class="icon">
                                       <img src="{{ asset('frontend/assets/images/form-icon.png') }}" alt="Companie name">
                                    </div>
                                    <div class="text">
                                        <h5>Company Name</h5>
                                        <p>This is the name that will appear on your certificate of incorporation and will also appear on the public record at Company House. Remember to add <strong>LTD</strong> or <strong>LIMITED</strong> to the end of your company name.</p>
                                    </div>
                                </div>
                            </div>

                            <form id="perticulars" action="{{ route('companie-formation.store') }}" method="POST">
                                @csrf
                                <div class="form-block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Name
                                                    <span data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;">

                                                            <img src="{{ asset('frontend/assets/images/in-icon.png') }}" alt="">

                                                    </span>
                                                </label>
                                                <span class="nb-text">Your requested company name is displayed below. If you wish to change this, insert another name and click.</span>
                                                <div class="check-another-name">
                                                    {{-- <input type="text" class="form-control" name="companie_name" id="companie_name" value="{{ (isset($companyFormationStep->companie_name) && !empty($companyFormationStep->companie_name)) ? strtoupper($companyFormationStep->companie_name) : strtoupper($orders->company_name ?? '' ) }}" oninput="this.value = this.value.toUpperCase();"> --}}
                                                    <input type="text" class="form-control" name="companie_name" id="companie_name"
                                                        value="{{ old('companie_name', strtoupper($companyFormationStep->companie_name ?? ($orders->company_name ?? ''))) }}"
                                                        oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);">
                                                    <button type="submit" class="btn check-company">Check another name</button>
                                                </div>
                                            </div>

                                            <div class="text-danger alert-custom-highlight-s1" id="srchfld-error" style="display: none">
                                                <em id="srchfld-error" class="text-danger">
                                                    <h4 id="message-cls">Warning, <span class="companie-name"> </span> is <span id="c-availablity"></span> available for registration.</h4>
                                                    <p id="paragraph"> You need to put a valid Company ending: LTD, LIMITED, CYF, CYFYNGEDIG, LTD. etc. to proceed further.</p>
                                                </em>
                                            </div>
                                            <div class="text-danger alert-custom-highlight-s1" id="srchfld-success" style="display: none">
                                                <em id="srchfld-success" class="text-danger">
                                                    <h4 id="message-cls"><span class="companie-name"> </span> <span style="color: #3B9D22 !important">is  available for registration.</span></h4>
                                                </em>
                                            </div>

                                            {{-- For sensitive word div --}}
                                            <div class="sensitive-word-chk" style="display: none">
                                                <label for="field-10">Sensitive Words</label>
                                                <div class="sensitive-guidance">
                                                    <div class="sensitive-word">
                                                        <h5 id="is_sensitive_word"> </h5>
                                                        <div class="sensitive-word-guidance"> </div>
                                                    </div>
                                                </div>

                                                <div class="w-row ef-supporting-doc-attachment-wrapper" style="clear:both">
                                                <h4>Supporting Document</h4>
                                                    <div class="w-col w-col-8">
                                                        <div>
                                                            <input class="w-input file-upload" type="file" name="file-upload-sensitive" id="file-upload-sensitive" accept="application/pdf">
                                                            <button type="button" data-url="{{ route('upload-company-doc') }}" data-collection="sensetive-document" id="sensitive-doc-attach" class="button doc-attach">Attach</button>
                                                            @if(!empty($mediaDoc['name']))
                                                                <input type="hidden" name="sesitive_documents" id="sesitive-documents" value="true">
                                                                <div class="w-col w-col-12 sensitive-col ef-upload-result">
                                                                    <span class="attached-label-sensitive">Document Attached
                                                                        <a class="button" href="{{ $mediaDoc['url'] }}" target="_blank">View</a>
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <input type="hidden" name="sesitive_documents" id="sesitive-documents" value="false">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="w-col w-col-12 sensitive-col ef-upload-result"> </div>
                                                </div>
                                            </div>

                                            {{-- For same as name div --}}
                                            <div class="same-as-name-word" style="display: none">
                                                <h6 for="field-10">Name Authorisation</h6>
                                                <div class="sensitive-guidance">
                                                    <div class="sensitive-word">
                                                        <p> You need permission from <strong class="company-name"></strong> to use this company name.</p>
                                                        <p> Please obtain permission and upload file here.</p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="same_as_name" id='same_as_name' value="">
                                                <div class="w-row ef-supporting-doc-attachment-wrapper" style="clear:both">
                                                <h4>Supporting Document</h4>
                                                    <div class="w-col w-col-8">
                                                        <div>
                                                            <input class="w-input file-upload" type="file" name="file-upload-same-as-name" id="file-upload-same-as-name" accept="application/pdf">
                                                            <button type="button" data-url="{{ route('upload-company-doc') }}" data-collection="same-as-name-document" id="same-as-name-doc-attach" class="button doc-attach">Attach</button>
                                                            @if(!empty($mediaDoc['name']))
                                                                <input type="hidden" name="same_as_name_documents" id="same-as-name-documents" value="true">
                                                                <div class="w-col w-col-12 sensitive-col ef-upload-result">
                                                                    <span class="attached-label-sensitive">Document Attached
                                                                        <a class="button" href="{{ $mediaDoc['url'] }}" target="_blank">View</a>
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <input type="hidden" name="same_as_name_documents" id="same-as-name-documents" value="false">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="w-col w-col-12 sensitive-col ef-upload-result"> </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            @php
                                            if ($orders->cart->package==null) {
                                                $package_type = $orders->getCompanyByOrderId->companie_type;
                                            }else{
                                                $package_type = $orders->cart->package->package_type;
                                            }
                                            @endphp
                                           {{-- @dd($package_type) --}}
                                            <div class="form-group">
                                                <label for="companie_type">Type of Company</label>
                                                <select class="form-control" name="companie_type">
                                                    @if (stripos($package_type, 'shares') !== false)
                                                    <option value="Limited By Shares">Limited By Shares</option>
                                                    @endif
                                                    @if (stripos($package_type, 'Guarantee') !== false)
                                                    <option value="Limited By Guarantee">Limited By Guarantee</option>
                                                    @endif
                                                    @if (stripos($package_type, 'Residents') !== false)
                                                    <option value="Limited By Shares">Limited By Shares</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="jurisdiction_id">Jurisdiction <span><img src="{{ asset('frontend/assets/images/in-icon.png') }}" alt=""></span></label>

                                                <select class="form-control @error('jurisdiction_id') is-invalid @enderror" name="jurisdiction_id">
                                                    <option value="">Select one</option>
                                                    @foreach ($jurisdictions as $jurisdiction)
                                                        @if($jurisdiction->name === 'England & Wales' && (!isset($companyFormationStep) || old('jurisdiction_id')))
                                                            <option value="{{ $jurisdiction->id }}" selected>{{ $jurisdiction->name }}</option>
                                                        @else
                                                            <option {{ (old('jurisdiction_id') == $jurisdiction->id || (isset($companyFormationStep) && old('jurisdiction_id', $companyFormationStep->jurisdiction_id) == $jurisdiction->id)) ? 'selected' : '' }} value="{{ $jurisdiction->id }}">{{ $jurisdiction->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                @error('jurisdiction_id')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <input type="hidden" name="section_name" value="company_formation">
                                        <input type="hidden" name="is_sensetibe" id="is_sensetibe" value="">
                                        <input type="hidden" name="step_name" value="particulars">
                                        <input type="hidden" name="c_availablity" id="c_availablity" value="">
                                        <input type="hidden" name="order_id" id="order_id" value="{{ $orders->id ?? '' }}">
                                        <input type="hidden" name="order" id="order" value="{{ $_GET['order'] ?? '' }}">

                                        <input type="hidden" name="company_id" id="company_id" value="{{ $companyFormationStep->id ?? '' }}">

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="sic_name">What are yur business activities (SIC Codes) <span><img src="{{ asset('frontend/assets/images/in-icon.png') }}" alt=""></span></label>
                                                <select class="form-control" name="sic_name" id="sic_name">
                                                    <option value="">Select Category</option>
                                                    @foreach($SICDetails as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="">Selected SIC Codes</label>
                                                {{-- <select class="form-control" name="selected_sic" id="selected_sic"> --}}
                                                <select class="form-select selected_sic @error('sic_code') is-invalid @enderror" name="sic_code[]" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                                    @if( isset($companyFormationStep->sicCodes) )
                                                        @foreach($companyFormationStep->sicCodes as $key => $value)
                                                            <option selected value="{{ $value->code }} - {{ $value->name }}">{{ $value->code }} - {{ $value->name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="">None Selected</option>
                                                    @endif
                                                </select>
                                                <div id="error_sic">

                                                </div>
                                                @error('sic_code')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="btn-wrap">
                                                <button type="submit" class="btn btn-success save-continue">Save & Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}" alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--For Find Postal Code Address Api Modal Popup-->
<div class="modal" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div id="post_address_blk">
                </div>
            </div>
        </div>
    </div>
</div>

<!--Company Name Modal-->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><b>Company Name</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Please enter your desired company name. This is the name that will appear on your certificate of incorporation and also appear on the public record at Companies House.

            Please also include any relevant company name ending, such as LTD, LIMITED, etc
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Reference to the SICDetails and SICCodes arrays
            var sicDetails = "{{ json_encode($SICDetails) }}";
            var sicCodes = {!! htmlspecialchars_decode(json_encode($SICCodes)) !!};

            // Reference to the two dropdowns
            var sicDetailsDropdown = $('#sic_name');
            var selectedSICDropdown = $('#multiple-select-field');

            // Event listener for SICDetails dropdown change
            sicDetailsDropdown.change(function() {
                var selectedSICId = $(this).val();
                selectedSICDropdown.empty();
                // console.log('Working....');
                if (selectedSICId !== "") {
                    var sicCategory = sicCodes[selectedSICId];
                    console.log(sicCodes);

                    if (sicCategory) {
                        $.each(sicCategory, function(categoryId, category) {
                            // console.log(categoryId, category);
                            selectedSICDropdown.append($('<option>', {
                                value: category.id +' - '+ category.name,
                                text: category.id +' - '+ category.name
                            }));
                        });
                    }
                }
            });
        });

        $('.save-continue').click(function(e) {
            e.preventDefault();
            checkCompanieAvailabality();
            // var companyType = $('#company_type').val();
            $sic_data = $('#multiple-select-field').val();
            if($sic_data.length==0){
                console.log('empty');
                $('#multiple-select-field').addClass('is-invalid');
                $('#error_sic').html('<div id="error_sic" style="color:red;"> *SIC Code is requied</div>');
                return;
            }else{
                $('#error_sic').html('');
                $('#multiple-select-field').removeClass('is-invalid');
            }

            var companyName = $('#companie_name').val();

            if (companyName.indexOf('LTD') !== -1 || companyName.indexOf('LIMITED') !== -1 || companyName.indexOf('CYF') !== -1 || companyName.indexOf('CYFYNGEDIG') !== -1 ) {

                if($('#is_sensetibe').val() == 'true' && $("#sesitive-documents").val() == 'false') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please upload document',
                    })
                    return false;
                }

                if($('#same_as_name').val() == 'true' && $("#same-as-name-documents").val() == 'false') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please upload document',
                    })
                    return false;
                }

                // const selectElement = document.querySelector('.selected_sic');
                // // Check if there are selected options
                // if (selectElement && selectElement.options.length > 0) {
                //     // There are selected options
                //     console.log('Selected options exist');
                //     return;
                // } else {
                //     // No selected options
                //     console.log('No selected options');
                //     return;
                // }

                $('#srchfld-error').hide();
                $("#perticulars").submit();
            } else {
                $('#srchfld-error').show();
                $('.companie-name').text(companyName);
                return;
            }
        });

        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        });

        $('.check-company').click(function(e) {
            e.preventDefault();
            checkCompanieAvailabality();
        });

        const checkCompanieAvailabality = async (sensetive = false) => {
            var companyName = $('#companie_name').val();
            console.log('companyName',companyName);
            if (companyName.indexOf('LTD') !== -1 || companyName.indexOf('LIMITED') !== -1 || companyName.indexOf('CYF') !== -1 || companyName.indexOf('CYFYNGEDIG') !== -1) {
                console.log(companyName.indexOf('LTD') !== -1);
                $('#srchfld-error').hide();
                $('#srchfld-success').show();
                $('.companie-name').text(companyName);

                return;
            }else{
                $('#srchfld-error').show();
                $('#srchfld-success').hide();
                $('.companie-name').text(companyName);

            }

            var companyName = $('#companie_name').val();
            var orderId = $('#order_id').val();

            var searchButton = $('.check-company');
            searchButton.prop('disabled', true).text('Checking...');

            // Make the GET request using Axios
            await axios.get('/search-companie', {
                params: {
                    'search': companyName,
                    'same_as': 'true',
                }
            })
            .then(function (response) {
                console.log('response',response);
                // Handle the response data here
                console.log(response.data.items[0]);

                if(response.data.message == 'This company name is available.') {

                    if(response.data.is_sensitive == 1) {
                        $('#srchfld-error').hide();
                        $('.same-as-name-word').hide();
                        $('#same_as_name').val('false');

                        $('.sensitive-word-chk').show();
                        $('.sensitive-word-guidance').prepend(response.data.sensitive_word_desc);
                        $('#is_sensetibe').val('true');
                        $('#is_sensitive_word').text(response.data.is_sensitive_word);
                        $('#c_availablity').val('available');
                    } else {
                        if(sensetive === false) {
                            $('.sensitive-word-chk').hide();
                            $('.same-as-name-word').hide();
                            $('#same_as_name').val('false');

                            $('#srchfld-error').show();
                            $('#c-availablity').text('');
                            $('#c_availablity').val('available');
                            $('.companie-name').text(companyName);
                        }
                    }
                } else {
                    if(companyName === response.data.items[0].title) {
                        // alert('Please select a company');
                        $('.sensitive-word-chk').hide();
                        $('.same-as-name-word').hide();

                        $('.companie-name').text(companyName);
                        $('#srchfld-error').show();
                        $('#c-availablity').text('not');
                        $('#same_as_name').val('false');
                        $('#c_availablity').val('not_available');
                    } else {
                        $('.sensitive-word-chk').hide();

                        $('.same-as-name-word').show();
                        $('#srchfld-error').show();
                        $('#c-availablity').text('');
                        $('#c_availablity').val('available');
                        $('#same_as_name').val('true');
                        $('.companie-name').text(companyName);
                        $('.company-name').text(response.data.items[0].title);
                        $('#paragraph').html(`Name authorisation from <strong> ${response.data.items[0].title} </strong>`);
                    }
                }
            })
            .catch(function (error) {
                // Handle any errors that occurred during the request
                console.error(error);
            })
            .finally(function () {
                // Re-enable the button and change the text back to "Check another name"
                searchButton.prop('disabled', false).text('Check another name');
            });
        }

        $(document).ready(function() {
            // checkCompanieAvailabality(true);
        });

        // @todo Need to check implementession and add view button if file exists
        $(".doc-attach").click(function() {

            const fileInput = document.getElementById("file-upload-sensitive");
            const fileInputSameAs = document.getElementById("file-upload-same-as-name");
            const allowedFileTypes = ['pdf'];

            $('.doc-attach').text('Attaching...');

            if (fileInput.files.length > 0 || fileInputSameAs.files.length > 0) {
                console.log('Uploading...');
                const formData = new FormData();
                let selectedFile = null;

                if (fileInput.files.length > 0) {
                    selectedFile = fileInput.files[0];
                } else if (fileInputSameAs.files.length > 0) {
                    selectedFile = fileInputSameAs.files[0];
                }

                if (selectedFile) {
                    // Check the file type
                    const fileType = selectedFile.name.split('.').pop().toLowerCase();
                    console.log(fileType);
                    // return;
                    if (allowedFileTypes.includes(fileType)) {

                        const maxFileSizeMB = 2;
                        const maxFileSizeBytes = maxFileSizeMB * 1024 * 1024;
                        const fileSizeBytes = selectedFile.size;

                        if (fileSizeBytes <= maxFileSizeBytes) {
                            formData.append("document", selectedFile);
                            formData.append("model_id", $("#order_id").val());
                            formData.append("collection_name", $(this).data('collection'));

                            axios.post($(this).data('url'), formData, {
                                headers: {
                                    "Content-Type": "multipart/form-data"
                                }
                            })
                            .then(function(response) {
                                console.log("File uploaded successfully:", response.data);
                                $('#is_sensetibe').val('');
                                Swal.fire(
                                    'Attached!',
                                    'Your file has been attached.',
                                    'success'
                                )

                                if(fileInput.files[0]) {
                                    $('#sesitive-documents').val('true');
                                }

                                if(fileInputSameAs.files[0]) {
                                    $('#same-as-name-documents').val('true');
                                }
                            })
                            .catch(function(error) {
                                console.error("Error uploading file:", error);
                            })
                            .finally(function() {
                                // Re-enable the button and change the text back to "Attach"
                                $('.doc-attach').prop('disabled', false).text('Attach');
                            });
                        } else {
                            Swal.fire(
                                'File too large',
                                'File size exceeds 2MB.',
                                'error'
                            );
                            $('.doc-attach').prop('disabled', false).text('Attach');
                        }
                    } else {
                        // Alert if the file type is not allowed
                        Swal.fire(
                            'Invalid File Type',
                            'Please select a PDF file.',
                            'error'
                        );
                        $('.doc-attach').prop('disabled', false).text('Attach');
                    }
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a file'
                })
                $('.doc-attach').prop('disabled', false).text('Attach');
            }
        });

        // $(".doc-attach").click(function() {
        //     const fileInput = $(".file-upload")[0];
        //     $('.doc-attach').text('Attaching...');

        //     // Check if a file is selected
        //     if (fileInput && fileInput.files && fileInput.files.length > 0) {
        //         const selectedFile = fileInput.files[0];
        //         const formData = new FormData();
        //         formData.append("document", selectedFile);
        //         formData.append("model_id", $("#order_id").val());
        //         formData.append("collection_name", $(this).data('collection'));

        //         axios.post($(this).data('url'), formData, {
        //             headers: {
        //                 "Content-Type": "multipart/form-data"
        //             }
        //         })
        //         .then(function(response) {
        //             console.log("File uploaded successfully:", response.data);
        //             $('#is_sensetibe').val('');
        //             Swal.fire(
        //                 'Attached!',
        //                 'Your file has been attached.',
        //                 'success'
        //             )
        //         })
        //         .catch(function(error) {
        //             console.error("Error uploading file:", error);
        //         })
        //         .finally(function () {
        //             // Re-enable the button and change the text back to "Attach"
        //             $('.doc-attach').prop('disabled', false).text('Attach');
        //         });
        //     } else {
        //         console.log("No file selected.");
        //     }
        // });

    </script>
@endsection
