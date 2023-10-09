@extends('layouts.master')
@section('content')

<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/compare-packages-banner.png') }}">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <figcaption class="lg">Compare Company <span>Formation Packages</span></figcaption>
            </figure>
            <div class="d-flex">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a>Compare Package</a></li>
                </ul>
           </div>
        </div>

        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500"
            data-aos-once="true">
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

<!-- ================ start: comparePackages-sec ================ -->
@php
    $choose_pkg_step=false;
     if (isset($_GET['step']) && $_GET['step'] == 'choose-package')
    $choose_pkg_step = true;

@endphp
<section class="companyFormationPackages-sec">
    <div class="custom-container">
        <div class="sec-title1 text-center">
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Compare Packages Starting at <span>£12.99</span></h2>
        </div>
        <div class="companyFormationPackages-content">
            <div class="tab-menus">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">
                        <a href="#" class="active">Limited Company</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-once="true">

                        @if ($choose_pkg_step)

                        <a href="{{route('non_residents_package',['step'=>'choose-package'])}}">Non-Residents</a>
                        @else
                        <a href="{{route('non_residents_package')}}">Non-Residents</a>

                        @endif
                    </li>
                    <li data-aos="fade-up" data-aos-delay="200" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('llp_package')}}">LLP</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="250" data-aos-duration="500" data-aos-once="true">
                        @if ($choose_pkg_step)

                        <a href="{{route('guarantee_package',['step'=>'choose-package'])}}">Guarantee</a>
                        @else
                        <a href="{{route('guarantee_package')}}">Guarantee</a>

                        @endif
                    </li>
                    <li data-aos="fade-up" data-aos-delay="300" data-aos-duration="500" data-aos-once="true">
                        <a href="{{route('e_seller_package')}}">eSeller</a>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="350" data-aos-duration="500" data-aos-once="true">
                        @if ($choose_pkg_step)

                        <a href="{{route('plc_package',['step'=>'choose-package'])}}">PLC</a>
                        @else
                        <a href="{{route('plc_package')}}">PLC</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>

        <div class="comparePackages-content"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
            <table>
                <thead>
                    <tr>
                        <th>
                            <div class="left-contents">
                                <div class="top-info">
                                    <img src="{{ asset('frontend/assets/images/fabicon.svg') }}">
                                    <h3>Form a Private <span>Limited Company</span></h3>
                                </div>
                            </div>
                        </th>
                        @foreach($packages as $key => $package)
                            <th>
                                <div class="items-th-info">
                                    <div class="icon-container">
                                        <div class="inner-box">
                                            {{-- <img src="{{ asset('frontend/assets/images/companyFormationPackages1.svg') }}"> --}}
                                            @if ($package->getMedia('package_icon')->isNotEmpty())
                                                <img src="{{ $package->getFirstMedia('package_icon')->getUrl() }}" alt="{{ $package->name }}">
                                            @else
                                                {{-- Default image if no media in the "package_icon" collection --}}
                                                <img src="{{ asset('frontend/assets/images/companyFormationPackages1.svg')}}" alt="Default Image">
                                            @endif
                                        </div>
                                    </div>
                                    <h4>{{ $package->package_name }}</h4>
                                    <h2>£{{ $package->package_price }}</h2>
                                    <div class="bottom-actions">
                                        <a href="{{ route('add-cart', ['id' => $package->id] ) }}" class="theme-btn-primary buy-btn">Buy Now</a>
                                        <a href="#" class="read-more-btn">Read More</a>
                                    </div>
                                </div>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="text-with-tick-icon"><img src="{{ asset('frontend/assets/images/td-tick.svg') }}">
                                <p>Online formation within</p>
                            </div>
                        </td>
                        @foreach($packages as $key => $package)
                            <td>{{ $package->online_formation_within }}</td>
                        @endforeach
                    </tr>

                    @foreach($facilitys as $key => $facility)
                        <tr>
                            <td>
                                <div class="text-with-tick-icon"><img src="{{ asset('frontend/assets/images/td-tick.svg') }}">
                                    <p>{{ $facility->name }}</p>
                                </div>
                            </td>

                            @foreach($facilityList as $key => $assignFacilitys)
                                @if(in_array($facility->id, $assignFacilitys))
                                    <td>
                                        <div class="charm_tick"><img src="{{ asset('frontend/assets/images/charm_tick.svg') }}" alt=""></div>
                                    </td>
                                @else
                                    <td>
                                        <div class="charm_tick"><img src="{{ asset('frontend/assets/images/charm_tick2.svg') }}" alt=""></div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <div class="left-contents">
                                <div class="top-info">
                                    <h3>Form a Private <span>Limited Company</span></h3>
                                </div>
                            </div>
                        </th>
                        @foreach($packages as $key => $package)
                            <th>
                                <div class="items-th-info">
                                    <h4>{{ $package->package_name }}</h4>
                                    <h2>£{{ $package->package_price }}</h2>
                                    <div class="bottom-actions">
                                        <a href="{{ route('add-cart', ['id' => $package->id] ) }}" class="theme-btn-primary buy-btn">Buy Now</a>
                                    </div>
                                </div>
                            </th>
                        @endforeach
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- ================ end: comparePackages-sec ================ -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#search').click(function() {
                var companyName = $('#company-name').val();

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
                        $('#response-class').hide();
                        $('#result_show').hide();
                        $('#not-available-company').hide();
                        $('.search-company-name').text(companyName);

                        if(response.data.is_sensitive == 1) {
                            $('#is_sensitive_word_row').show(110);
                            $('#is_sensitive_word').text(response.data.is_sensitive_word);
                        } else {
                            $('#is_sensitive_word_row').hide();
                            $('#is_sensitive_word').text('');
                        }

                        $('#result_show').show(100);
                        $('#available-company').show(115);
                        $('.image-stamp').hide();
                        $('.search-input').val('');
                    } else {
                        $('#result_show').hide();
                        $('#available-company').hide();
                        $('#response-class').hide();

                        // Show data
                        $('.search-company-name').text(companyName);
                        $('#result_show').show(100);
                        $('#not-available-company').show(120);
                        $('.image-stamp').hide();
                        $('.search-input').val('');
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
            });
        });
    </script>
@endsection
