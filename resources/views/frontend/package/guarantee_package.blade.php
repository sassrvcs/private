@extends('layouts.master')
@section('content')
<style>
     .logo_container {
    /* text-align: center; */
    margin-bottom: 25px;
    }
</style>
    <!-- ================ start: main-header ================ -->

    <!-- ================ end: main-header ================ -->


    <!-- ================ start: common-inner-page-banner ================ -->

    <section class="common-inner-page-banner"
        style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }}">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <span><img src="{{ asset('frontend/assets/images/ic_round-mail.svg') }}"></span>
                    </div>
                    <figcaption>{{ $packages->package_name }} <span>Package</span></figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a>{{ $packages->package_name }} Package</a></li>
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

    <!-- ================ start: digitalPackage-sec ================ -->
    <section class="digitalPackage-sec">
        <div class="custom-container">
            <div class="left-information" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <h2>{{ $packages->package_name }} <span>Package</span></h2>
                {{-- <p>{{$packages->short_description}}</p> --}}
                {!! $packages->description !!}
                <div class="next-package-bar-s1" data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000"
                    data-aos-once="true">
                    <h4>Go to our next package to find what’s missing ➤</h4>
                </div>
            </div>
            <div class="right-information" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                <a href="{{route('package')}}" class="view-all-btn theme-btn-primary ">View all Packages</a>

                <div class="companyFormationPackages-lists">
                    <div class="cfp-list-col mw-100" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
                        data-aos-once="true">
                        <div class="cfp-list-box">
                            <div class="top-icon-box">
                                <div class="inner-box">

                                    @if ($icon != '')
                                        <img src="{{ $icon }}">
                                    @else
                                        <img src="{{ asset('frontend/assets/images/companyFormationPackages1.svg') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="text-info1">
                                <h4>{{ $packages->package_name }}</h4>
                                <h3>£{{ $packages->package_price }}</h3>
                            </div>
                            <ul class="list-info">
                                @foreach ($features as $feature)
                                    <li>
                                        @if ($feature->feature != '')
                                            <div class="icon-container">
                                            </div>
                                            <p>{{ $feature->feature }}</p>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <div class="bottom-actions">
                                {{-- <a href="#" class="theme-btn-primary buy-btn">Buy Now</a> --}}
                                {{-- @if ($package_details['package_id'] != '') --}}
                                @if (isset($_GET['step']) && $_GET['step'] == 'choose-package')
                                    <a href="{{ route('add-cart', ['id' => $packages->id]) }}"
                                        class="theme-btn-primary buy-btn">Buy Now</a>
                                @else
                                <a href="#" class="theme-btn-primary buy-btn buy-btn-multiple" data-toggle="modal"
                                data-target="#exampleModal" data-whatever="@fat" data-id = "{{$packages->id}}" data-name= "{{strtoupper($packages->package_name)}}">Buy Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-company_name_check />
    <!-- ================ end: digitalPackage-sec ================ -->

    <!-- ================ start: whatmakedifferent-sec ================ -->
    <div class="whatmakedifferent-sec-multiple-left-right">
        <section class="whatmakedifferent-sec">
            <div class="image-container" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/whatmakedifferent-pic.png') }}">
            </div>
            <div class="text-container" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                <h2>Take a look at our Full secretary services £159.99</h2>

                <p>At Formationhunt, you can avail of the best full company secretary service that includes a company
                    secretary and a dedicated and efficient account manager who will take care of the entire statutory
                    registers, make changes in the company as per your instructions and prepare and file company’s
                    confirmation statement.</p>
                <p>This service proves extremely helpful for companies as it provides peace of mind that the company’s
                    secretarial aspects are well taken care of as well as ensures the company’s records are up-to-date
                    and compliant. </p>
            </div>

        </section>
        <div class="logo-center-stamp"></div>
        <section class="whatmakedifferent-sec">
            <div class="image-container" data-aos="fade-left" data-aos-delay="150" data-aos-duration="1500"
                data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/whatmakedifferent-pic2.png') }}">
            </div>
            <div class="text-container" data-aos="fade-right" data-aos-delay="200" data-aos-duration="2000"
                data-aos-once="true">
                <h2>Not a UK resident? take a look at our Non-residents package</h2>

                <p>Our idea is to help our non-UK clients set up their businesses effortlessly and without any hassle.
                    Thus, we provide them with a range of services to ensure a streamlined working experience with us.
                </p>
            </div>
        </section>
    </div>
    <!-- ================ end: whatmakedifferent-sec ================ -->

    <!-- ================ start: ourServices-sec ================ -->
    <section class="ourServices-sec top-padding">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Free Toolkits
                    <span>For Your Business</span>
                </h2>
            </div>
            <ul class="toolkit-lists" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                data-aos-once="true">
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit1.svg') }}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit2.svg') }}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit3.svg') }}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit4.svg') }}">
                    </div>
                </li>
                <li>
                    <div class="image-container">
                        <img src="{{ asset('frontend/assets/images/toolkit5.svg') }}">
                    </div>
                </li>
            </ul>

            @if (@$faqs[0]->question != null)
                <div class="faq-sec">

                    <div class="sec-title1 text-center">
                        <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">FAQ’s
                        </h2>
                    </div>
                    <div id="faq-accordion" class="faq-accordion">
                        @foreach ($faqs as $faq)
                            <div class="card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">

                                <div class="card-header" id="faqHeading{{ $faq->id }}">
                                    <button class="btn btn-link" data-toggle="collapse"
                                        data-target="#faq{{ $faq->id }}" aria-expanded="true"
                                        aria-controls="faq{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </div>

                                <div id="faq{{ $faq->id }}" class="collapse show"
                                    aria-labelledby="faqHeading{{ $faq->id }}" data-parent="#faq-accordion">
                                    <div class="card-body">
                                        <p>{{ $faq->answer }}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="need-little-help">
                <div class="left-box" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <h3>Need a little help?</h3>
                    <p>We love talking to you when it comes to creating something new. We want you to remember us
                        always, let’s be good for good and for a good reason. Reach us through your voice or writing.
                    </p>
                </div>
                <div class="right-box" data-aos="fade-right" data-aos-delay="150" data-aos-duration="1500"
                    data-aos-once="true">
                    <ul>
                        <li>
                            <img src="{{ asset('frontend/assets/images/ic_round-phone.svg') }}">
                            <div class="text-box">Call Us: <a href="tel:020 3002 0032">020 3002 0032</a></div>
                        </li>
                        <li>
                            <img src="{{ asset('frontend/assets/images/ic_round-mail.svg') }}">
                            <div class="text-box">
                                mail to: <a href="mailto:contact@formationshunt.co.uk">contact@formationshunt.co.uk</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: ourServices-sec ================ -->

    <!-- ================ start: our-banking-sec ================ -->
    <section class="our-banking-sec">
        <div class="custom-container">
            <div class="sec-title1 text-center">
                <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our Banking
                    <span>Partners</span>
                </h2>
            </div>
            <div class="our-banking-slider aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">

                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/62/Barclays-Logo.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/57/Wise-logo.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/58/Cashplus-logo.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/78/Payoneer-logo.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/60/cardone-Logo.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/61/Anna-logo.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/109/Barclays-Logo.png.png">
                </div>



                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/63/freeagent-blue.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/64/1st-Formations-Order-1.png">
                </div>


                <div class="our-banking-item">
                    <img src="http://formationshunt.technoexponent.net/storage/65/Anna-logo-(1).png">
                </div>



    </div>
        </div>
    </section>
    <!-- ================ end: our-banking-sec ================ -->

    <!--=============Modal For Company Name ====================--->


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#search').click(function() {
                var companyName = $('#company-name').val();
                var package_id = $('#package_id').val();
                var searchButton = $(this);
                searchButton.prop('disabled', true).text('Searching...');

                // Make the GET request using Axios
                axios.get('/search-companie', {
                        params: {
                            'search': companyName,
                            'same_as': 'true',
                            'package_id': package_id,
                        }
                    })
                    .then(function(response) {
                        // Handle the response data here
                        console.log(response.data);

                        if (response.data.message == 'This company name is available.') {
                            $('#response-class').hide();
                            $('#result_show').hide();
                            $('#not-available-company').hide();
                            $('.search-company-name').text(companyName);

                            if (response.data.is_sensitive == 1) {
                                $('#is_sensitive_word_row').show();
                                $('#is_sensitive_word').text(response.data.is_sensitive_word);
                            } else {
                                $('#is_sensitive_word_row').hide();
                                $('#is_sensitive_word').text('');
                            }

                            $('#result_show').show();
                            $('#available-company').show();
                            $('.image-stamp').hide();
                            $('.search-input').val('');
                        } else {
                            $('#result_show').hide();
                            $('#available-company').hide();
                            $('#response-class').hide();

                            // Show data
                            $('.search-company-name').text(companyName);
                            $('#result_show').show();
                            $('#not-available-company').show();
                            $('.image-stamp').hide();
                            $('.search-input').val('');
                        }
                    })
                    .catch(function(error) {
                        // Handle any errors that occurred during the request
                        console.error(error);
                    })
                    .finally(function() {
                        // Re-enable the button and change the text back to "Search"
                        searchButton.prop('disabled', false).text('Search');
                    });
            });
        });
    </script>
@endsection
