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
                <li><a href="#">Home</a></li>
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
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="menu-account-menu" class="navbar-nav me-auto mb-2 mb-md-0 ">
                                <li id="menu-item-2336" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown nav-item nav-item-2336">
                                    <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="_mi _before fa fa-user" aria-hidden="true"></i><span>My Account</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-2337" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item nav-item nav-item-2337">
                                            <a href="#" class="dropdown-item active"><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Overview</span></a>
                                        </li>
                                        <li id="menu-item-2338" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2338"><a href="my-details.html" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>My Details</span></a></li>
                                        <li id="menu-item-2339" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-2339"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Logout</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2340" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2340">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-book" aria-hidden="true"></i><span>Orders</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-4625" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4625"><a href="#" class="dropdown-item ">View All Orders</a></li>
                                        <li id="menu-item-4636" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4636"><a href="#" class="dropdown-item ">Incomplete</a></li>
                                        <li id="menu-item-4643" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4643"><a href="#" class="dropdown-item ">In Progress</a></li>
                                        <li id="menu-item-4639" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4639"><a href="#" class="dropdown-item ">Completed</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2341" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2341">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-industry" aria-hidden="true"></i><span>Companies</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-2371" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2371"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>View All Companies</span></a></li>
                                        <li id="menu-item-4655" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-4655"><a href="#" class="dropdown-item ">Incorporate New Company</a></li>
                                        <li id="menu-item-4656" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4656"><a href="#" class="dropdown-item ">Import Company via Auth. Code</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2342" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2342">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-puzzle-piece" aria-hidden="true"></i><span>Services</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-3969" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3969"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>All Services</span></a></li>
                                        <li id="menu-item-3968" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3968"><a href="#" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Services Expired</span></a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-2343" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2343">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fas fa-chart-pie" aria-hidden="true"></i><span>Finances</span></a>
                                    <ul class="dropdown-menu depth_0">
                                        <li id="menu-item-5096" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5096"><a href="#" class="dropdown-item ">Invoive History</a></li>
                                        <li id="menu-item-5099" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5099"><a href="#" class="dropdown-item ">Payment History</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-12">
                    <div class="particulars-form-wrap">
                        <div class="particulars-top-step">
                            <div class="top-step-items active">
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>2.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>3.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>4.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                        </div>
                        <div class="particulars-bottom-step">
                            <div class="bottom-step-items active">
                                <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                <p>Particulars</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>Registered Address</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>Business Address</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>Appointment</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>Document</p>
                            </div>
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
                                                <label>Company Name <span><img src="{{ asset('frontend/assets/images/in-icon.png') }}" alt=""></span></label>
                                                <span class="nb-text">Your requested company name is displayed below. If you wish to change this, insert another name and click.</span>
                                                <div class="check-another-name">
                                                    <input type="text" class="form-control" name="companie_name" id="companie_name" value="{{ (isset($companyFormationStep->companie_name) && !empty($companyFormationStep->companie_name)) ? strtoupper($companyFormationStep->companie_name) : strtoupper($orders->company_name ?? '' ) }}" oninput="this.value = this.value.toUpperCase();">
                                                    <button type="submit" class="btn check-company">Check another name</button>
                                                </div>
                                            </div>

                                            @if(session('error'))
                                                <div class="text-danger alert-custom-highlight-s1 bg-free">
                                                    <em class="text-danger">
                                                        <h4 id="message-cls"> <i class="fa fa-times-circle-o"></i> Error, company already redisterd.</h4>
                                                    </em>
                                                </div>
                                            @endif

                                            <div class="text-danger alert-custom-highlight-s1" id="srchfld-error" style="display: none">
                                                <em id="srchfld-error" class="text-danger">
                                                    <h4 id="message-cls">Warning, <span id="companie-name"> </span> is <span id="c-availablity"></span> available for registration.</h4>
                                                    <p> You need to put a valid Company ending: LTD, LIMITED, CYF, CYFYNGEDIG, LTD. etc. to proceed further.</p>
                                                </em>
                                            </div>

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
                                                            <button type="button" id="sensitive-doc-attach" class="button">Attach</button>
                                                            @if(!empty($mediaDoc['name']))
                                                                <div class="w-col w-col-12 sensitive-col ef-upload-result">
                                                                    <span class="attached-label-sensitive">Document Attached
                                                                        <a class="button" href="{{ $mediaDoc['url'] }}" target="_blank">View</a>
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="w-col w-col-12 sensitive-col ef-upload-result"> </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="companie_type">Type of Company</label>
                                                <select class="form-control" name="companie_type">
                                                    <option value="Limited By Shares">Limited By Shares</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="jurisdiction_id">Jurisdiction <span><img src="assets/images/in-icon.png" alt=""></span></label>
                                                <select class="form-control" name="jurisdiction_id">
                                                    <option value="">Select one</option>
                                                    @foreach ($jurisdictions as $jurisdiction)
                                                        @if( isset($companyFormationStep->jurisdiction_id) && $companyFormationStep->jurisdiction_id == $jurisdiction->id)
                                                            <option selected value="{{ $jurisdiction->id }}">{{ $jurisdiction->name }}</option>
                                                        @else
                                                            <option value="{{ $jurisdiction->id }}">{{ $jurisdiction->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
                                                <label for="sic_name">What are yur business activities (SIC Codes) <span><img src="assets/images/in-icon.png" alt=""></span></label>
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
                                                <select class="form-select selected_sic" name="sic_code[]" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                                    @if( isset($companyFormationStep->sicCodes) )
                                                        @foreach($companyFormationStep->sicCodes as $key => $value)
                                                            <option selected value="{{ $value->id }}">{{ $value->id }} - {{ $value->name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="">None Selected</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="btn-wrap">
                                                <button type="submit" class="btn btn-success save-continue">Save & Continue <img src="assets/images/btn-right-arrow.png" alt=""></button>
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
            // var companyType = $('#company_type').val();

            var companyName = $('#companie_name').val();
            if (companyName.indexOf('LTD') !== -1 || companyName.indexOf('LIMITED') !== -1) {
                // if($('#is_sensetibe').val() == 'true') {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Oops...',
                //         text: 'Please upload document',
                //     })
                //     return false;
                // }

                $('#srchfld-error').hide();
                $("#perticulars").submit();
            } else {
                $('#srchfld-error').show();
                $('#companie-name').text(companyName);
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

        const checkCompanieAvailabality = () => {

            var companyName = $('#companie_name').val();
            var orderId = $('#order_id').val();
            $('.save-continue').prop('disabled', true);

            var searchButton = $(this);
            searchButton.prop('disabled', true).text('Searching...');

            // Make the GET request using Axios
            axios.get('/search-companie', {
                params: {
                    'search': companyName
                }
            })
            .then(function (response) {
                // Handle the response data here
                console.log(response.data);

                if(response.data.message == 'This company name is available.') {

                    if(response.data.is_sensitive == 1) {
                        $('.sensitive-word-chk').show();
                        $('.sensitive-word-guidance').prepend(response.data.sensitive_word_desc);
                        $('#is_sensetibe').val('true');
                        $('#is_sensitive_word').text(response.data.is_sensitive_word);
                        $('#c_availablity').val('available');
                        $('.save-continue').prop('disabled', false);
                    } else {
                        $('.sensitive-word-chk').hide();
                        $('#srchfld-error').show();
                        $('#c-availablity').text('');
                        $('#c_availablity').val('available');
                        $('.save-continue').prop('disabled', false);

                        // $("#message-cls").text('');
                        // $("#message-cls").text('Congratulation!');
                        $('#companie-name').text(companyName);
                    }
                } else {
                    $('.sensitive-word-chk').hide();
                    $('#srchfld-error').show();
                    // $("#message-cls").text('');
                    // $("#message-cls").text('Error!');
                    $('#companie-name').text(companyName);
                    $('#c-availablity').text('not');
                    $('#c_availablity').val('not_available');
                    $('.save-continue').prop('disabled', true);
                }
            })
            .catch(function (error) {
                // Handle any errors that occurred during the request
                console.error(error);
            })
            .finally(function () {
                // Re-enable the button and change the text back to "Search"
                searchButton.prop('disabled', false).text('Search');
            });
        }

        $(document).ready(function() {
            checkCompanieAvailabality();
        });

        $("#sensitive-doc-attach").click(function() {

            const fileInput = document.getElementById("file-upload-sensitive");
            $('#sensitive-doc-attach').text('Attaching...');
            
            if (fileInput.files.length > 0) {
                const formData = new FormData();
                formData.append("document", fileInput.files[0]);
                formData.append("model_id", $("#order_id").val());

                axios.post("/upload-sensetive-doc", formData, {
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
                })
                .catch(function(error) {
                    console.error("Error uploading file:", error);
                })
                .finally(function () {
                    // Re-enable the button and change the text back to "Attach"
                    $('#sensitive-doc-attach').prop('disabled', false).text('Attach');
                });
            } else {
                console.log("No file selected.");
            }
        });

    </script>
@endsection
