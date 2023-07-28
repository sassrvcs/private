@extends('layouts.master')
@section('content')
    <div class="mid">
        <div class="container search_result">
            <div class="package-steps text-center">
                <ol class="list-inline">
                    <li class="list-inline-item active">1. Name Check</li>
                    <li class="list-inline-item active">2. Select Package</li>
                    <li class="list-inline-item">3. Additional Services</li>
                    <li class="list-inline-item">4. Checkout</li>
                    <li class="list-inline-item">5. Company Details</li>
                </ol>
            </div>
            @dump($sessionCart)
            <div class="col-md-8 offset-md-2">
                <div class="search_area mb-5">
                    <div class="container">
                        <div id="contdiv">
                            <div class="search-result mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <span class="icon"><i class="fa fa-check-circle-o"></i></span>
                                        <h2>{{ end($sessionCart)['company_name'] ?? '' }}</h2>
                                        <h3>Congratulations! This company name is available.</h3>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p class="h5">You have chosen the <span style="color:#87CB28;">{{ end($sessionCart)['package_name'] ?? '' }}</span></p>
                                        <form method="post" action="{{ route('addon-services') }}" id="buyForm">
                                            @csrf
                                            <input type="hidden" name="checkout_step" value="3">
                                            <input type="hidden" name="company_name" value="{{ end($sessionCart)['company_name'] ?? '' }}">
                                            <input type="hidden" name="pack_price" value="{{ end($sessionCart)['price'] ?? '' }}">
                                            <button type="submit" name="buyForm" class="btn btn-primary wow zoomIn">Proceed to register<i class="fa fa-long-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-text"><span>Search for another name</span></div>
                        </div>
                        <div class="search mb-4">
                            <form id="homeSrchFrm-three" method="post" name="homeSrchFrm-three">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#homeSrchFrm-three').submit(e) {

                console.log(e);
                e.preventDefault();
            }

        });
    </script>
@endsection