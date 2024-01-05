@extends('layouts.master')
@section('content')
{{-- Include Inner Header View --}}
@include('layouts.inner_header')
{{-- Additional CSS for now --}}
<style>
button.btn.btn-danger {
    border: 1px solid #bb0202 !important;
    background: #bb0202 !important;
}
</style>
<section class="sectiongap legal rrr fix-container-width ">
    <div class="container">
        <div class="companies-wrap">
            <div class="row woo-account">
                @include('layouts.navbar')
                <div class="col-md-12">
                    <div class="particulars-form-wrap">
                        <div class="particulars-top-step">
                            @php
                                $company_form = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','company_formation')->first();
                                $buisness_ess = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','BusinessEssential')->first();
                                $summary = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','Review')->first();
                            @endphp
                            <div class="top-step-items">
                                <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}" >
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                                </a>
                            </div>
                            <div class="top-step-items active">
                                <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" > <strong>2.Business Essentials</strong>
                                    <span>Products & Services</span>
                                </a>
                            </div>
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
                                $buisness_bank_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','BusinessEssential')->where('step','business-banking')->first();
                            @endphp
                            @if ($buisness_bank_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" style="color: #ffffff;"> Business Banking</a>
                                    </p>
                                </div>

                            @else
                                <div class="bottom-step-items ">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                        Business Banking
                                    </p>
                                </div>

                            @endif

                            @php
                                $buisness_service_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','BusinessEssential')->where('step','business-service')->first();
                            @endphp

                            @if ($buisness_service_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-services']) }}" style="color: #ffffff;"> Business Services </a>
                                    </p>
                                </div>
                            @else
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>
                                         Business Services
                                    </p>
                                </div>
                            @endif

                            @php
                                $optional_step = App\Models\companyFormStep::where('order',$_GET['order'])->where('section','BusinessEssential')->where('step','other-extras')->first();
                            @endphp

                            @if ($optional_step)
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'optional-extras']) }}" style="color: #ffffff;">Optional Extras </a>
                                    </p>
                                </div>
                            @else
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'optional-extras']) }}" style="color: #ffffff;">Optional Extras </a>
                                    </p>
                                </div>
                            @endif

                        </div>

                        <div class="optional-sec pt-4">
                            <h4 class="form-ttl">Optional Extras</h4>
                            <div class="optional-wrap">
                                @php
                                    $package_name = '';
                                     if(request()->routeIs('business-essential.index'))
                                    {
                                        $orders = App\Models\Order::where('user_id', auth()->id())->where('order_id',@$_GET['order'])->first();
                                        if (@$orders->cart->package != null)
                                        {
                                            $package_name = @$orders->cart->package->package_name;
                                        }
                                    }
                                @endphp
                                @foreach($addonServices as $key => $service)
                                @php
                                     $include_with_packages=[];
                                        if ($service->add_on_type!=null)
                                        {
                                            $include_with_packages = json_decode($service->add_on_type);
                                        }
                                @endphp
                                    <div class="optional-panel">
                                        <div class="optional-top">
                                            <div class="ttl">
                                                <p><strong> {{ $service->service_name }}
                                                </strong></p>
                                            <p>
                                                @if ($package_name!='')
                                                    @if(in_array($package_name, $include_with_packages) )
                                                    <b><span> (Included with this package)</span></b>
                                                     @endif
                                                @endif
                                            </p>
                                            </div>
                                            <div class="price-btn">
                                                <div class="price-block">
                                                    <strong>£{{ $service->price }}</strong>
                                                </div>
                                                <div class="buy-now">
                                                    @if( in_array($service->id, $addOnCart))
                                                        <button type="submit" id="cart-btn" class="btn btn-danger addon-service-btn-{{$service->id}}" data-id="{{$service->id}}" data-action="remove">Remove</button>
                                                    @else
                                                        <button type="submit" id="cart-btn" class="btn addon-service-btn-{{$service->id}}" data-id="{{$service->id}}" data-action="add">Buy Now</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            {{-- <p><strong>{{$service->short_desc}}</strong></p> --}}
                                            {{-- <p>{!!$service->long_desc!!}</p> --}}
                                        </div>
                                        {{-- <input type="hidden" name="order" id="order" value="{{ $_GET['order'] }}"> --}}
                                    </div>
                                @endforeach
                            </div>

                            <form action="{{ route('business-essential.store') }}" method="post" id="others-extras-store">
                                @csrf
                                <input type="hidden" name="order" id="order" value="{{ $_GET['order'] ?? '' }}">
                                <input type="hidden" name="step" value="other-extras">
                                <input type="hidden" name="section" value="BusinessEssential">
                            </form>
                            <div class="step-btn-wrap mt-4" style="justify-content: space-between">
                                <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-services']) }}" class="btn prev-btn">
                                    <img src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt=""> Previous: Business Service
                                </a>
                                <button class="btn save-continue">Save &amp; Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.select-service').click(function () {
            // alert($(this).data('id'));
            $(".business-ess-panel").css("border", "1px solid #D9D9D9");
            $('.active-icon').css("display", "none");

            var businessServiceId = $(this).data('id');
            var divSelector = ".business-ess-panel.div-" + businessServiceId;
            var isRadioChecked = $(`.radio-${businessServiceId}`).is(":checked");

            if (isRadioChecked) {
                $(`.radio-${businessServiceId}`).prop("checked", false);
                $('#business_service_id').val('');
                // Add CSS styles to the selected div
                $(divSelector).css("border", "1px solid #D9D9D9");
                $(`.checkbox-${businessServiceId}`).css("display", "none");
            } else {
                $(`.radio-${businessServiceId}`).prop("checked", true);
                $('#business_service_id').val(businessServiceId);
                // Add CSS styles to the selected div
                $(divSelector).css("border", "1px solid #87CB28");
                $(`.checkbox-${businessServiceId}`).css("display", "block");
            }
        });

        $(document).on('click', '#cart-btn', function() {
            var service_id =  $(this).data("id");
            var action  = $(this).data("action");
            var order = $('#order').val();
            var baseUrl = "{{ route('update-cart-auth') }}";

            axios.defaults.headers.common['X-XSRF-TOKEN'] = "{{ csrf_token() }}";
            axios.post(baseUrl, {
                '_token': "{{ csrf_token() }}",
                'service_id': service_id,
                'action': action,
                'order': order
            })
            .then(function (response) {
                // Handle the response data here
                console.log(response.data);
                if(action == 'remove') {
                    Swal.fire({
                        icon:'success',
                        title: 'Item has been removed to cart',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon:'success',
                        title: 'Item has been added to cart',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
                setTimeout(function() {
                    window.location.reload();
                }, 1550);
            })
            .catch(function (error) {
                // Handle any errors that occurred during the request
                console.error(error);
            })
            .finally(function () {
                // Re-enable the button and change the text back to "Check another name"
                searchButton.prop('disabled', false).text('Check another name');
            });
        });

        $(".save-continue").click(function () {
            $('#others-extras-store').submit();
        });
    });
</script>
@endsection
