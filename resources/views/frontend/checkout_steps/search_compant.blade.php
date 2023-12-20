@extends('layouts.master')
@section('content')
    {{-- url({{ asset('frontend/assets/images/main-banner.png')}}); --}}
   <!-- ================ start: main-banner ================ -->
   <input type="hidden" name="indx" id="indx" value="{{ $indx ?? '' }}">
   <section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-packages-banner.png') }})">
        <div class="custom-container">
            <div class="package_top_wrap checkout_package_wrap">
               <div class="namecheck-steps top">
                   <div class="w-layout-grid image-link-box-grid steps">
                     <div class="container-small step selected">
                       <img src="{{ asset('frontend/assets/images/checklist.svg') }}" loading="lazy" width="54" alt="" class="step-icon">
                       <div class="step-title">Name Check</div>
                     </div>
                     <div class="container-small step selected">
                       <img src="{{ asset('frontend/assets/images/select-pack.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">Select Pack</div>
                     </div>
                     <div class="container-small step">
                       <img src="{{ asset('frontend/assets/images/check-out.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">Additional Services</div>
                     </div>
                     <div class="container-small step">
                       <img src="{{ asset('frontend/assets/images/check-out.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">Checkout</div>
                     </div>
                     <div class="container-small step">
                       <img src="{{ asset('frontend/assets/images/file-details.svg') }}" loading="lazy" alt="" class="step-icon">
                       <div class="step-title">File Details</div>
                     </div>
                   </div>
                   <div class="steps-line">
                       <img src="{{ asset('frontend/assets/images/company-formation-icon-step-line-2.png') }}" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 945px) 98vw, 927px" srcset="{{ asset('frontend/assets/images/company-formation-icon-step-line-2.png') }} 500w, {{ asset('frontend/assets/images/company-formation-icon-step-line-2.png') }} 927w" alt="">
                   </div>
               </div>
           </div>
        </div>
   </section>
    <div class="mid">
        <div class="container search_result">
            <!-- <div class="package-steps text-center">
                <ol class="list-inline">
                    <li class="list-inline-item active">1. Name Check</li>
                    <li class="list-inline-item active">2. Select Package</li>
                    <li class="list-inline-item">3. Additional Services</li>
                    <li class="list-inline-item">4. Checkout</li>
                    <li class="list-inline-item">5. Company Details</li>
                </ol>
            </div> -->
            {{-- @dump($sessionCart) --}}
            <div class="">
                <div class="search_area mb-5">
                    <div class="">
                        <div id="contdiv">
                            <div class="search-result mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        @if(count($sessionCart) > 1)
                                            <table class="efTable srccomTb" width="100%">
                                                <tr class="ui-widget-header">
                                                    <td>Company Name</td>
                                                    <td>Status</td>
                                                    <td>Package Price</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                @php $cnt = 0; @endphp
                                                @foreach($sessionCart as $key => $sessionC)
                                                    @if($cnt < (count($sessionCart) - 1) )
                                                        <tr>
                                                            <td>{{ $sessionC['company_name'] ?? '' }}</td>
                                                            <td>Incomplete</td>
                                                            <td>&pound;{{ $sessionC['price'] ?? '' }}</td>

                                                            <td style="">
                                                                <a onclick="return deleteCartSessionItem();" href="{{route('delete-cart-item', $key)}}">
                                                                    <!-- <i class="fa fa-trash"></i> -->
                                                                    <button id="" type="submit" class="efButton deleteButton ui-button ui-widget" name="pa" value="deleteo">Delete &#10007;</button>
                                                                </a>
                                                            </td>

                                                            <td style="width:122px;" >
                                                            <!-- proceed to payment -->
                                                                <form method="post" action="{{ route('addon-services',["indx" => $key]) }}" id="buyForm">
                                                                    @csrf
                                                                    <input type="hidden" name="checkout_step" value="3">
                                                                    <input type="hidden" name="company_name" value="{{ $sessionC['company_name'] ?? '' }}">
                                                                    <input type="hidden" name="pack_price" value="{{ $sessionC['price'] ?? '' }}">
                                                                    <button type="submit" name="buyForm" class="btn btn-primary wow zoomIn">
                                                                        <!-- Proceed to register -->
                                                                        Pay Now
                                                                        <i class="fa fa-long-arrow-right"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    @php $cnt++; @endphp
                                                @endforeach
                                            </table>
                                        @endif
                                    </div>
                                    {{--<div class="col-md-8">
                                        <div class="search-result" id="available-company">
                                            <span class="icon"><i class="fa fa-check-circle-o"></i></span>
                                            <h2 class="search-company-name">{{ end($sessionCart)['company_name'] ?? '' }}</h2>
                                            <h3>Congratulations! This company name is available.</h3>
                                        </div>

                                        <div id="not-available-company" style="display: none">
                                            <span class="icon"><i class="fa fa-times-circle-o"></i></span>
                                            <h2 class="search-company-name"></h2>
                                            <h3 style="color:white;">Error! This company name is Not available.</h3>
                                            <!-- <div class="hhr-text">Search for another name</div> -->
                                        </div>
                                    </div>--}}

                                    <div class="col-md-12 text-end mt-4">
                                        {{--<p class="h5">You have chosen the <span style="color:#87CB28;">{{ end($sessionCart)['package_name'] ?? '' }}</span></p>--}}
                                        <form method="post" action="{{ route('addon-services',["indx" => count($sessionCart)-1]) }}" id="buyForm">
                                            @csrf
                                            <input type="hidden" name="checkout_step" value="3">
                                            <input type="hidden" name="company_name" value="{{ end($sessionCart)['company_name'] ?? '' }}">
                                            <input type="hidden" name="pack_price" value="{{ end($sessionCart)['price'] ?? '' }}">
                                            <button type="submit" name="buyForm" class="btn btn-primary wow zoomIn">
                                                Start New Order
                                                <i class="fa fa-long-arrow-right"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="hr-text"><span>Search for another name</span></div> -->
                        </div>
                        <div class="particulars-form-wrap p-0 m-0">.
                            <div class="form-wrap p-0 m-0">
                                <div class="form-info-block">
                                    <div class="desc mb-0">
                                        <div class="icon">
                                            <span class="excl-icon" style="font-size: 30px; color:#3B566F;"><i class="fa fa-exclamation"></i></span>
                                        </div>
                                        <div class="text">
                                            <h5>What happens next?</h5>
                                            <ul>
                                                <li>After checkout, you will be asked to enter your new company details and you can select a business bank account (optional).</li>
                                                <li>Our staff will then send your new company application to Companies House for approval.</li>
                                                <li>Most companies are registered within 3 to 6 working hours.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="search mb-4">
                            <form id="homeSrchFrm-three" name="homeSrchFrm-three" onsubmit="submitForm(event)">
                                <input type="hidden" name="action" value="search_comp">
                                <input type="hidden" name="hidsrch" value="">
                                <div class="input-group ">
                                    <input type="search" placeholder="Enter a company name to check if its available" aria-describedby="button-addon5" class="form-control" name="srchfld" id="srchfld-three">
                                    <div class="input-group-append">
                                        <input type="submit" id="searchBtn" name="submit" value="Search" class="btn btn-primary">
                                    </div>
                                    <div class="srch-loader srch-three" style="display: none;"><img src="https://formationshunt.co.uk/wp-content/themes/formationshunt/images/loader.gif"></div>
                                </div>
                            </form>
                            <h3>14+years of experience in helping thousands of people to start their business in UK</h3>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function submitForm(event) {
            event.preventDefault(); // Prevent default form submission

            const form = event.target; // Get the form element
            const searchField = form.elements.srchfld; // Get the search field input element
            const searchValue = searchField.value.trim(); // Get the value and trim whitespace

            if (!searchValue) {
                alert("Please enter a company name to search.");
                return; // Stop the function if search field is empty
            }

            console.log(form.elements);
            // Display loader
            const loader = form.querySelector('.srch-loader');
            loader.style.display = 'block';

            // Prepare the data to be sent
            const formData = new FormData(form);

            // Make the GET request using Axios
            axios.get("{{ route('cart.index') }}", {
                params: {
                    'company_name': searchValue
                }
            })
            .then(function (response) {
                // Handle the response data here
                console.log(response.data);
                // Do something with the response data
                if(response.data.message == 'This company name is available.') {
                    // $('#response-class').hide();
                    // $('#result_show').hide();
                    $('#not-available-company').hide();
                    $('.search-company-name').text(searchValue);
		            $('#srchfld-three').val('');

                    // if(response.data.is_sensitive == 1) {
                    //     $('#is_sensitive_word_row').show();
                    //     $('#is_sensitive_word').text(response.data.is_sensitive_word);
                    // } else {
                    //     $('#is_sensitive_word_row').hide();
                    //     $('#is_sensitive_word').text('');
                    // }

                    // $('#result_show').show();
                    // $('#available-company').show();
                    // $('.image-stamp').hide();
                    // $('.search-input').val('');

                    // location.reload();
                } else {
                    // $('#result_show').hide();
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
            .catch(function (error) {
                // Handle any errors that occurred during the request
                console.error(error);
            })
            .finally(function () {
                // Hide loader
                loader.style.display = 'none';
            });
        }

        function deleteCartSessionItem($key) {
            if(!confirm("Are You Sure to delete?"))
            event.preventDefault();
            axios.get("/delete-cart-item/"+$key, {

            })
            .then(function (response) {
                // Handle the response data here
                console.log(response.data);
                window.location.reload();
                // Do something with the response data
            })

        }
    </script>
@endsection
