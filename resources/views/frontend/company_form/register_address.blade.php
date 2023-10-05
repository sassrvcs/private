@extends('layouts.app')
@section('content')
    <!-- ================ start: common-inner-page-banner ================ -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <section class="common-inner-page-banner"
        style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }})">
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
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <li><a href="{{ url('') }}">Home</a></li>
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
    <!-- ================ end: common-inner-page-banner ================ -->

    <!-- ================ start: Particulars sec ================ -->
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="companies-wrap">
                <div class="row woo-account">
                    @include('layouts.navbar')
                    <div class="col-md-12">
                        <div class="particulars-form-wrap">
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
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" > <strong>2.Business Essentials</strong>  </a>
                                    <span>Products & Services</span>
                                </div>

                            @else
                                <div class="top-step-items">
                                    <strong>2.Business Essentials</strong>
                                    <span>Products & Services</span>
                                </div>
                            @endif

                            @if ($summary)
                                <div class="top-step-items ">
                                   <a href="{{route('review.index', ['order' => $_GET['order'] ?? '', 'section' => 'Review', 'step' => 'review'])}}"> <strong>3.Summary</strong></a>
                                    <span>Details about your order</span>
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
                                            <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '','section' => 'Company_formaction','step' => 'particulars', 'data' => 'previous']) }}" style="color: #ffffff;"> Particulars</a>
                                        </p>
                                    </div>
                                @else
                                    <div class="bottom-step-items">
                                        <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                        <p>
                                             Particulars
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
                                    <div class="bottom-step-items active">
                                        <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
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
                                            <a href="{{ route('appointments', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'appointments']) }}" style="color: #ffffff;">Appointment </a>
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


                            {{-- Edit  form div --}}
                            <div class="customer-signup-s1">
                                <div class="form-wrap edit_from d-none">
                                    <div class="form-info-block">
                                        <h4>Registered Address</h4>
                                        <h5 class="edit-add-ttl">Edit Address</h5>

                                        <form class="form-register">
                                            <input type="text" class="user_id" name="user_id"
                                                value="{{ !empty($recent_addr) && $recent_addr['user_id'] !== '' ? $recent_addr['user_id'] : '' }}">
                                            <input type="text" class="address_type" name="address_type"
                                                value="{{ !empty($recent_addr) && $recent_addr['address_type'] !== '' ? $recent_addr['address_type'] : '' }}">
                                            <input type="text" class="recent_addr_id"
                                                value="{{ !empty($recent_addr) && $recent_addr['id'] !== '' ? $recent_addr['id'] : '' }}"
                                                readonly>

                                            <fieldset class="border p-3">
                                                <div class="form-row form-group ">
                                                    <label>Name / Number *:&nbsp;
                                                        </span>
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" id="house_no1" name="house_no"
                                                            class="input-text form-control house_no blankCheck"
                                                            value="{{ !empty($recent_addr) && $recent_addr['house_number'] !== '' ? $recent_addr['house_number'] : '' }}">
                                                            <div class="error d-none" style="color:red;">House number is
                                                                required.</div>
                                                    </span>
                                                </div>
                                                <div class="form-row form-group ">
                                                    <label for="billing_title">Street *:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" name="street" id="street1"
                                                            class="input-text form-control steet_no blankCheck"
                                                            value="{{ !empty($recent_addr) && $recent_addr['street'] !== '' ? $recent_addr['street'] : '' }}">
                                                            <div class="error d-none" style="color:red;">Street is required.
                                                            </div>
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="locality">Locality:
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" name="locality" id="locality1"
                                                            class="input-text form-control locality"
                                                            value="{{ !empty($recent_addr) && $recent_addr['locality'] !== '' ? $recent_addr['locality'] : '' }}">
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="town">Town *:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" name="town" id="town1"
                                                            class="input-text form-control town blankCheck"
                                                            value="{{ !empty($recent_addr) && $recent_addr['town'] !== '' ? $recent_addr['town'] : '' }}">
                                                            <div class="error d-none" style="color:red;">Town is required.
                                                            </div>
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="county">County:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" name="county" id="county1"
                                                            class="input-text form-control county"
                                                            value="{{ !empty($recent_addr) && $recent_addr['county'] !== '' ? $recent_addr['county'] : '' }}">
                                                    </span>

                                                </div>
                                                <div class="form-row form-group">
                                                    <label for="postcode">Post Code *:&nbsp;
                                                    </label>
                                                    <span class="input-wrapper">
                                                        <input type="text" id="post_code" name="post_code"
                                                            class="input-text form-control zip blankCheck"
                                                            value="{{ !empty($recent_addr) && $recent_addr['post_code'] !== '' ? $recent_addr['post_code'] : '' }}">
                                                            <div class="error d-none" style="color:red;">Post Code is
                                                                required.</div>
                                                    </span>
                                                </div>
                                                <div class="form-row update_totals_on_change form-group">
                                                    <label for="billing_country">Country *:&nbsp;</label>
                                                    <span class="input-wrapper">
                                                        <select name="billing_country" id="billing_country"
                                                            name="billing_country"
                                                            class="contry country_to_state cAddressountry_select form-control"
                                                            data-label="Country" autocomplete="country"
                                                            data-placeholder="Select a country / region…">
                                                            <option value="">Select a country / region…</option>

                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}"
                                                                    {{ !empty($recent_addr) && $country->id == $recent_addr->billing_country ? 'selected' : '' }}>
                                                                    {{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>

                                                </div>

                                                <div class="step-btn-wrap mt-4">
                                                    <button type="button" class="btn saveAddress">Save & Continue <img
                                                            src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                                            alt=""></button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Edit  form div --}}
                            <div class="form-wrap hideEdit">
                                <div class="form-info-block">
                                    <h4>Registered Address</h4>
                                    <div class="loader" style="display:none"></div>
                                    <div class="desc mb-3 ">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/assets/images/form-icon.png') }}"
                                                alt="">
                                        </div>
                                        <div class="text">
                                            <h5>Registered Office (required)</h5>
                                            <ul>
                                                <li>All companies require having a registered office address located in the
                                                    same country as they are registered.</li>
                                                <li>It is the address to which all Companies House, HMRC and other official
                                                    letters will be sent and must always be a physical address (e.g. not a
                                                    PO Box or DX).</li>
                                                <li><b>The address of the registered office must appear on all company
                                                        correspondence and publications.</b></li>
                                                <li><b>A company’s registered office address is available to view by the
                                                        public free of charge.</b></li>
                                                <li>If you purchase our registered office address service, we will forward
                                                    all official mail to an address of your choosing.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- {{$package_type}} --}}
                                @if (stripos($package_type, 'Residents') !== false)
                                <div class="error d-none address_selection_cl" style="color:red;">Please Choose a Forwarding Address</div>
                                @endif
                                <div class="own-address @if (stripos($package_type, 'Residents') !== false) d-none @endif">
                                    @if (!empty($recent_addr))
                                        <div class="info">

                                            <h3>Choose to use your own address</h3>
                                            <input type="text" hidden id="recent_address_id"
                                                value="{{ isset($recent_addr->id) ? $recent_addr->id : '' }}" readonly>
                                            <p>{{ isset($recent_addr->house_number) ? $recent_addr->house_number : '' }},
                                                {{ isset($recent_addr->street) ? $recent_addr->street : '' }}, @if (!empty($recent_addr->locality))
                                                    {{ $recent_addr->locality }},
                                                @endif
                                                {{ isset($recent_addr->town) ? $recent_addr->town : '' }},
                                                {{ isset($recent_addr->county) ? $recent_addr->county : '' }},
                                                {{ isset($recent_addr->post_code) ? $recent_addr->post_code : '' }} </p>

                                        </div>
                                        <div class="btn-box">
                                            <a href="javascript:void(0)" type="button"
                                                class="btn edit-btn edit-addr">Edit Address</a>
                                            <a href="{{ route('choose-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'choose_address']) }}" type="button"
                                                class="btn another-btn">Choose Another</a>
                                        </div>
                                    @else
                                        <div class="info">
                                            <h3>Choose to use your own address</h3>
                                            <input type="text" id="recent_address_id" value="" hidden readonly>
                                            <div class="error d-none address_selection_cl" style="color:red;">You have to
                                                select an Address.</div>
                                        </div>
                                        <div class="btn-box">
                                            <a href="{{ route('choose-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'choose_address']) }}" type="button"
                                                class="btn another-btn">Choose One</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="office-address ">
                                    <div class="top-block">
                                        <h3>Registered Office - London</h3>
                                        <div class="price-block">
                                            <strong>$39.00</strong>
                                            <p>Reserved annually at $39.00</p>
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <div class="tham-img">
                                            <img src="{{ asset('frontend/assets/images/address-img.png') }}"
                                                alt="">
                                            <div class="tham-info">
                                                <strong>London:</strong>
                                                <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United
                                                    Kingdom</p>
                                            </div>
                                        </div>
                                        <div class="text-block">
                                            <h3>Protect the privacy of your home address</h3>
                                            <p>Mauris placerat ac lectus et bibendum. Aliquam tincidunt tristique vulputate
                                                quisque tincidunt nisl vel risus imperdiet feugiat.</p>
                                            <div class="location-block">
                                                <div class="addr">
                                                    <strong>London: </strong>
                                                </div>
                                                <div class="info">
                                                    <p>52 Danes Court, North End Road, Wembley, Middlesex, HAQ OAE, United
                                                        Kingdom</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-block">
                                        <button class="btn" onclick="DetailsSection()">Details</button>
                                        @if (stripos($package_type, 'Residents') !== false)
                                        <button class="btn buy-now-btn" onclick="gotoPage()">Choose Forwarding Address</button>
                                        @else
                                        <button class="btn buy-now-btn" onclick="gotoPage()">Buy Now</button>
                                        @endif
                                    </div>
                                    <div class="details-desc d-none" id="DetailsSection_div">
                                        <h3>Why would I use your WC2 London Business Address Services?</h3>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="details-text">
                                                    <h4>Improve your corporate image</h4>
                                                    <p>A professional business address located in the heart of London
                                                        can provide a number of benefits for your business - boosting
                                                        your corporate image and extending your company’s presence.</p>
                                                    <p>You can use our address as your company’s primary correspondence
                                                        address, and we will forward all your business mail to an
                                                        alternative address of your choosing, on a daily basis.</p>
                                                    <p>This service is renewable on a 12 monthly basis at the cost of
                                                        £96.00+vat</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="details-text">
                                                    <h4>Benefits of our Business Address Services</h4>
                                                    <ul>
                                                        <li>Creates a professional, corporate image.</li>
                                                        <li>Gives the impression of a large, established business.</li>
                                                        <li>Provides an alternate contact address from your registered
                                                            office or home address that is exclusively used for
                                                            corresponding with clients, suppliers, investors and other
                                                            third parties.</li>
                                                        <li>Non-statutory general business mail is delivered to our
                                                            London address and forwarded to an alternate address of your
                                                            choice two times per week.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <div class="details-text">
                                                    <p><strong>Please note:</strong> This service does not include a
                                                        registered office service, which should be purchased separately.
                                                        All general business mail will be handled by us and forwarded to
                                                        your UK or overseas address at the cost of Royal Mail postal
                                                        rates plus 15%.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-btn-wrap mt-4" style="justify-content: space-between">
                                    <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '','section' => 'Company_formaction','step' => 'particulars', 'data' => 'previous']) }}">
                                        <button class="btn prev-btn"><img
                                                src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}"
                                                alt=""> Previous: Particulars</button></a>
                                    <button class="btn" onclick="SaveRegisterdAddWithOutBuyNow()">Save & Continue <img
                                            src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}"
                                            alt=""></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: Particulars sec ================ -->
@endsection

@section('script')
    <script>
        function DetailsSection() {
            $('#DetailsSection_div').toggleClass('d-none')
        }

        function SaveRegisterdAddWithOutBuyNow() {
            const recent_address_id = $('#recent_address_id').val()

            if (recent_address_id === '') {
                $('.own-address').addClass('validation')
                $('.address_selection_cl').removeClass('d-none')
            } else {
                $order_id = {{$_GET['order']}};

                console.log('Under Save Success',$order_id);
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ url('registered-address-step') }}",
                data : {
                    'order_id': $order_id
                },
                type : 'POST',
                dataType : 'json',
                success : function(result){

                    window.location.href = "{!! route('choose-address-business', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'business-address']) !!}"


                          }
                 });

            }
        }

        function previousParticulars() {
            window.location.href = "{!! route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'particulars', 'data' => 'previous']) !!}"
        }

        function gotoPage() {
            window.location.href = "{!! route('choose-address-after-buy-now', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) !!}"
        };

        $('.edit-addr').click(function() {
            $(".hideEdit").hide();
            $('.edit_from').removeClass('d-none');
        });

        $('.saveAddress').click(function() {
            var address_id = $('.recent_addr_id').val();
            var number = $('#house_no1').val();
            var steet = $('#street1').val();
            var locality = $('#locality1').val();
            var town = $('#town1').val();
            var county = $('#county1').val();
            var postcode = $('#post_code').val();
            var contry = $('#billing_country').val();
            var address_type = $('.address_type').val();
            var user_id = $('.user_id').val();
            if (county == undefined) {
                county = "";
            }

            const requiredFields = document.querySelectorAll('.blankCheck');
            const requiredFieldsArr = [...requiredFields];

            let validation = 0;
            requiredFieldsArr.forEach(el => {
                if (el.value === '') {
                    el.classList.add('validation');
                    el.nextElementSibling.classList.remove('d-none');
                    return validation++;
                } else {
                    el.classList.remove('validation');
                }
            });


            if (validation === 0) {
                $.ajax({
                    url: "{!! route('primary-address-save') !!}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        address_id,
                        number: number,
                        steet: steet,
                        locality: locality,
                        town: town,
                        county: county,
                        postcode: postcode,
                        contry: contry,
                        address_type: address_type,
                        user_id: user_id
                    },
                    success: function(result) {
                        location.reload(true);
                    }
                });
            }
        })
    </script>
@endsection
