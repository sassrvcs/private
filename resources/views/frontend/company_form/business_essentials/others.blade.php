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
                            <div class="top-step-items">
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items">
                                <strong>2.Business Essentials</strong>
                                <span>Products & Services</span>
                            </div>
                            <div class="top-step-items active">
                                <strong>3.Summary</strong>
                                <span>Details about your order</span>
                            </div>
                            <div class="top-step-items">
                                <strong>4.Delivery & Partner Services</strong>
                                <span>Delivery & Partner Details</span>
                            </div>
                        </div>
                        <div class="particulars-bottom-step">
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" style="color: #ffffff;"> Business Banking</a>
                                </p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-services']) }}" style="color: #ffffff;"> Business Services </a>
                                </p>
                            </div>
                            <div class="bottom-step-items active">
                                <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                <p>Optional Extras</p>
                            </div>
                        </div>

                        <div class="optional-sec pt-4">
                            <h4 class="form-ttl">Optional Extras</h4>
                            <div class="optional-wrap">
                                @foreach($addonServices as $key => $service)
                                    <div class="optional-panel">
                                        <div class="optional-top">
                                            <div class="ttl">
                                                <p><strong> {{ $service->service_name }} </strong></p>
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
                                            <p><strong>{{$service->short_desc}}</strong></p>
                                            <p>{!!$service->long_desc!!}</p>
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
                            <div class="step-btn-wrap mt-4">
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
