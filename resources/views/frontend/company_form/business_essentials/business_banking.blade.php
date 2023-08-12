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
                                <strong>1.Company Formation</strong>
                                <span>Details about your company</span>
                            </div>
                            <div class="top-step-items active">
                                <strong>2.Business Essentials</strong>
                                <span>Products & services</span>
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
                                <p>
                                    <a href="{{ route('business-essential.index', ['order' => $_GET['order'] ?? '', 'section' => 'BusinessEssential', 'step' => 'business-banking']) }}" style="color: #ffffff;"> Business Banking</a>
                                </p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>Business Services</p>
                            </div>
                            <div class="bottom-step-items">
                                <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
                                <p>Optional Extras</p>
                            </div>
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
                                        @foreach($businessBanks as $key => $businessBank)
                                            <div class="business-ess-panel with-img div-{{ $businessBank->id }}">
                                                <div class="business-ess-panel-top">
                                                    <div class="business-ess-panel-wrap">
                                                        <div class="img-text-box">
                                                            <div class="tham-icon" style="max-width: 50px">
                                                                @if ($businessBank->hasMedia('business_banking_images'))
                                                                    <img src="{{ $businessBank->getFirstMedia('business_banking_images')->getUrl() }}" alt="Image">
                                                                @else
                                                                    <!-- Default image or placeholder if no media found -->
                                                                    <img src="{{ asset('frontend/assets/images/card-one-logo-img.png') }}" alt="">
                                                                @endif
                                                            </div>
                                                            <div class="desc">
                                                                <h3>{{ $businessBank->title ?? " Lorem Ipsam" }}</h3>
                                                                <p><span>{{ $businessBank->short_description }}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec odio fringilla, finibus leo a, elementum neque. Praesent et dapibus neque, et aliquam dolor. Nulla in dolor et lectus accumsan tristique sed nec erat. Donec dignissim, neque sit amet viverra sollicitudin, enim tellus accumsan sapien, eu vulputate lectus odio non sem. Nam sit amet erat mattis, pharetra sem sit amet, molestie odio.</p>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="main-img">
                                                        <img src="{{ asset('frontend/assets/images/card-one-img.png') }}" alt="">
                                                    </div> --}}
                                                </div>
                                                <div class="bottom-panel">
                                                    <div class="text-box">
                                                        <p><strong>Terms and Conditions</strong></p>
                                                    </div>
                                                    <div class="btn-wrap">
                                                        <button type="submit" data-id={{ $businessBank->id }} class="btn select-service">Choose CardOneMoney</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="showmore-sec">
                                        <p><strong>Show More Options</strong> Including :</p>
                                        <ul>
                                            <li><img src="{{ asset('frontend/assets/images/barclays-sm-logo.png') }}" alt=""></li>
                                            <li><img src="{{ asset('frontend/assets/images/netwest-logo.png') }}" alt=""></li>
                                        </ul>
                                    </div>
                                    <form action="{{ route('business-essential.store') }}" method="post" id="business-essential-store">
                                        @csrf
                                        <input type="hidden" name="business_bank_id" id="business_bank_id" value="">
                                        <input type="hidden" name="order" id="business_bank_id" value="{{ $_GET['order'] ?? '' }}">
                                        <input type="hidden" name="step" value="business-banking">
                                        <input type="hidden" name="section" value="BusinessEssential">
                                    </form>
                                    <div class="step-btn-wrap mt-4">
                                        <button class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt=""> Previous : Documents</button>
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

{{-- Open modal if bank is not select --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Choosing a Business Bank account</h5>
            <button type="button" class="btn-close"  data-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-content">
            <p>
                Before you proceed, have you considered the <strong>Additional Benefits</strong>.
            </p>
            <ul class="ef-16-benefits-list">
                <li><strong>Separate</strong> and track your personal and company finances</li>
                <li><strong>Simplify</strong> your HMRC tax returns (including VAT registration)</li>
                <li><strong>Apply</strong> for company loans and credit cards with greater ease</li>
                <li><strong>Build</strong> your company’s credit history</li>
                <li><strong>Gain</strong> professional representation when receiving and processing payments.</li>
                <li><strong>Benefit</strong> from introductory offers and support to grow your business</li>
            </ul>
        </div>

        <div class="modal-footer">
            <div class="btn-group">
                <button type="button" onclick="redirectToURL();" class="btn btn-danger">I don't need a bank account</button>
            </div>
            <div class="btn-group ml-auto">
                <button type="button" class="btn btn-success" data-dismiss="modal">Let's take a look</button>
            </div>
        </div>        
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
    $(document).ready(function () {
        $('.select-service').click(function () {
            // alert($(this).data('id'));
            $(".business-ess-panel.with-img").css("border", "1px solid #D9D9D9");

            var businessBankId = $(this).data('id');
            var divSelector = ".business-ess-panel.with-img.div-" + businessBankId;
            $('#business_bank_id').val(businessBankId);

            // Add CSS styles to the selected div
            $(divSelector).css("border", "3px solid #01ff7e");
        });

        $(".save-continue").click(function () {
            var businessBankId = $('#business_bank_id').val();
            if (businessBankId == '') {
                $('.modal').modal('show');
                return false;
            } else {
                $('#business-essential-store').submit();
            }
        });

        const redirectToURL = () => {
            var orderParam = encodeURIComponent(getQueryParameter('order'));
            var redirectURL = '/business-essential/?order=' + orderParam + '&section=BusinessEssentials&step=business-services';
            window.location.href = redirectURL;
        }

        const getQueryParameter = (name) => {
            var url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
            var results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    });
</script>
@endsection