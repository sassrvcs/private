@extends('layouts.master')
@section('content')
{{-- Include Inner Header View --}}
@include('layouts.inner_header')
{{-- Additional CSS for now --}}
<style>
.modal-header {
    background: #000;
}

.modal-title {
    color: #fff;
}

.modal-footer {
    background: #000;
}

.modal-content {
    padding: 15px;
}

ul.ef-16-benefits-list {
    list-style: inside;
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
                                <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'particulars', 'data' => 'previous']) }}" >
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                                </a>
                            </div>
                            <div class="top-step-items active">
                                <strong>2.Business Essentials</strong>
                                <span>Products & Services</span>
                            </div>
                            <div class="top-step-items ">
                                <strong>3.Summary</strong>
                                <span>Details about your order</span>
                            </div>
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
                                <div class="bottom-step-items active">
                                    <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                    <p>
                                        <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-services']) }}" style="color: #ffffff;"> Business Services </a>
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
                                <div class="bottom-step-items">
                                    <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                    <p>Optional Extras</p>
                                </div>
                            @endif

                        </div>

                        <div class="business-ess-sec">
                            <h4 class="form-ttl">Business Banking</h4>
                            <div class="row">
                                <div class="col-md-3 col-ms-12">
                                    <div class="business-sidebar">
                                        <div class="ttl">
                                            <img src="{{ asset('frontend/assets/images/information-button.png') }}" alt="">
                                            <h3>Business account for your company</h3>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec odio fringilla, finibus leo a, elementum neque. Praesent et dapibus neque, et aliquam dolor. Nulla in dolor et lectus accumsan tristique sed nec erat.</p>
                                        <p>Donec dignissim, neque sit amet viverra sollicitudin, enim tellus accumsan sapien, eu vulputate lectus odio non sem. Nam sit amet erat mattis, pharetra sem sit amet, molestie odio. Aenean consectetur velit in nulla pharetra, vitae luctus odio rutrum. Curabitur nec elementum nibh. Nulla a aliquet ligula. Integer ultrices magna eu scelerisque efficitur. Pellentesque laoreet nunc eget nulla dictum, id consequat felis efficitur. Pellentesque scelerisque tortor sed hendrerit egestas.</p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-ms-12">
                                    <div class="business-ess-wrap">
                                        <small>The following banks have expressed an interest to support you and your new company :</small>
                                        {{-- @dd($businessServices) --}}
                                        {{-- @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) style="border:3px solid #01ff7e"  @endif --}}
                                        @foreach($businessServices as $key => $businessService)
                                            <div class="business-ess-panel div-{{ $businessService->id }}
                                                @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) active @endif"
                                                @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) style="border:1px solid #87CB28" @endif >
                                                <input style="display: none"
                                                    type="radio" name="business_service" value="{{ $businessService->id }}" class="radio-{{ $businessService->id }}"
                                                    @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) {{ 'checked' }}  @endif
                                                >
                                                <img class="active-icon checkbox-{{$businessService->id}}"
                                                    @if(!empty($selectedBusinessService) && $selectedBusinessService == $businessService->id) style="display:block"  @endif
                                                    src="{{ asset('frontend/assets/images/td-tick.svg') }}" alt="tick image"
                                                >
                                                <div class="business-ess-panel-top">
                                                    <div class="business-ess-panel-wrap">
                                                        <div class="img-text-box">
                                                            <div class="tham-icon" style="max-width: 50px">
                                                                @if ($businessService->hasMedia('accounting_software_images'))
                                                                    <img src="{{ $businessService->getFirstMedia('accounting_software_images')->getUrl() }}" alt="Image">
                                                                @else
                                                                    <img src="{{ asset('frontend/assets/images/card-one-logo-img.png') }}" alt="">
                                                                @endif
                                                            </div>
                                                            <div class="desc">
                                                                <h3>{{ $businessService->accounting_software_name ?? " " }}</h3>
                                                                <p><span style="color: black;">{{ $businessService->short_desc  ?? ''}}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            {!! $businessService->long_desc !!}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="bottom-panel">
                                                    <div class="text-box">
                                                        {{-- <p><strong>Terms and Conditions</strong></p> --}}
                                                    </div>
                                                    <div class="btn-wrap">
                                                        <button type="submit" data-id={{ $businessService->id }} class="btn select-service">Choose</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="showmore-sec">
                                        <p><strong>Show More Options</strong> Including :</p>
                                        <ul>
                                            <li><img src="{{ asset('frontend/assets/images/barclays-sm-logo.png') }}" alt=""></li>
                                            <li><img src="{{ asset('frontend/assets/images/netwest-logo.png') }}" alt=""></li>
                                        </ul>
                                    </div> --}}
                                    <form action="{{ route('business-essential.store') }}" method="post" id="business-essential-store">
                                        @csrf
                                        @if(!empty($selectedBusinessService))
                                            <input type="hidden" name="business_service_id" id="business_service_id" value="{{$selectedBusinessService}}">
                                        @else
                                            <input type="hidden" name="business_service_id" id="business_service_id" value="0">
                                        @endif
                                        <input type="hidden" name="order" value="{{ $_GET['order'] ?? '' }}">
                                        <input type="hidden" name="step" value="business-service">
                                        <input type="hidden" name="section" value="BusinessEssential">
                                    </form>
                                    <div class="step-btn-wrap mt-4" style="justify-content: space-between">
                                        <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt=""> Previous : Business Banking</a>
                                        <button class="btn save-continue">Save & Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}" alt=""></button>
                                    </div>
                                </div>
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
                $('#business_service_id').val('0');
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

        $(".save-continue").click(function () {
            $('#business-essential-store').submit();
        });
    });
</script>
@endsection
