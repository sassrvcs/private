@extends('layouts.master')
@section('content')
{{-- Include Inner Header View --}}
@include('layouts.inner_header')
{{-- Additional CSS for now --}}
<style>
ul.ef-16-benefits-list {
    list-style: inside;
}
.terms-condition {
    cursor: pointer;
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
                                            <div class="business-ess-panel div-{{ $businessBank->id }}
                                                @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) active @endif"
                                                @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) style="border:1px solid #87CB28" @endif>
                                                <input style="display: none"
                                                    type="radio" name="business_banking" value="{{ $businessBank->id }}" class="radio-{{ $businessBank->id }}"
                                                    @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) {{ 'checked' }}  @endif
                                                >
                                                <img class="active-icon checkbox-{{$businessBank->id}}"
                                                    @if(!empty($selectedBusinessBanking) && $selectedBusinessBanking == $businessBank->id) style="display:block"  @endif
                                                    src="{{ asset('frontend/assets/images/td-tick.svg') }}" alt="tick image"
                                                >
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
                                                                <h3>{{ $businessBank->title ?? "" }}</h3>
                                                                <p><span style="color: black;">{{ $businessBank->short_description }}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="info">
                                                            <p>{{ $businessBank->long_description }}</p>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="main-img">
                                                        <img src="{{ asset('frontend/assets/images/card-one-img.png') }}" alt="">
                                                    </div> --}}
                                                </div>
                                                <div class="bottom-panel">
                                                    <div class="text-box">
                                                        <p class="terms-condition" data-url="{{ route('business-bank-terms-conditions', ['id' => $businessBank->id]) }}">
                                                            <strong>Terms and Conditions</strong>
                                                        </p>
                                                    </div>
                                                    <div class="btn-wrap">
                                                        <button type="submit" data-id={{ $businessBank->id }} class="btn select-service">Choose</button>
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
                                        @if(!empty($selectedBusinessBanking))
                                            <input type="hidden" name="business_bank_id" id="business_bank_id" value="{{$selectedBusinessBanking}}">
                                        @else
                                            <input type="hidden" name="business_bank_id" id="business_bank_id" value="0">
                                        @endif
                                        <input type="hidden" name="order" id="business_bank_id" value="{{ $_GET['order'] ?? '' }}">
                                        <input type="hidden" name="step" value="business-banking">
                                        <input type="hidden" name="section" value="BusinessEssential">
                                    </form>
                                    <div class="step-btn-wrap mt-4" style="justify-content: space-between">
                                        <a href="{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'company_formation', 'step' => 'document']) }}" class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt=""> Previous : Documents</a>
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
<div class="modal bank-not-select fade business-banking-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choosing a Business Bank account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                <button type="button" class="btn btn-primary btn-don-need submit-frm">I don't need a bank account</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Let's take a look</button>
            </div>
        </div>
    </div>
</div>

{{-- Terms condition popup --}}
<div class="modal fade business-banking-modal" id="termsCondition" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Terms Condition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body terms-condition-body">

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-primary btn-don-need submit-frm">I don't need a bank account</button> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dontNeedButton = document.querySelector('.btn-don-need');
        if (dontNeedButton) {
            dontNeedButton.addEventListener('click', function() {
                // alert("You have indicated that you don't need a bank account.");
                $('#business-essential-store').submit();
            });
        }
    });

    $(document).ready(function () {
        $('.select-service').click(function () {
            // alert($(this).data('id'));
            $(".business-ess-panel").css("border", "1px solid #D9D9D9");
            $('.active-icon').css("display", "none");

            var businessBankId = $(this).data('id');
            var divSelector = ".business-ess-panel.div-" + businessBankId;
            // $('#business_bank_id').val(businessBankId);

            // Add CSS styles to the selected div
            // $(divSelector).css("border", "3px solid #01ff7e");

            var isRadioChecked = $(`.radio-${businessBankId}`).is(":checked");
            if (isRadioChecked) {
                $(`.radio-${businessBankId}`).prop("checked", false);
                $('#business_bank_id').val('0');
                // Add CSS styles to the selected div
                $(divSelector).css("border", "1px solid #D9D9D9");
                $(`.checkbox-${businessBankId}`).css("display", "none");
            } else {
                $(`.radio-${businessBankId}`).prop("checked", true);
                $('#business_bank_id').val(businessBankId);
                // Add CSS styles to the selected div
                $(divSelector).css("border", "1px solid #87CB28");
                $(`.checkbox-${businessBankId}`).css("display", "block");
            }
        });

        $(".save-continue").click(function () {
            var businessBankId = $('#business_bank_id').val();
            if (businessBankId == '' || businessBankId == 0) {
                $('.bank-not-select').modal('show');
                // return false;
            } else {
                $('#business-essential-store').submit();
            }
        });

        $('.terms-condition').click( function () {
            var baseUrl = $(this).data('url');
            // terms-condition-body
            // axios.get();
            axios.get(baseUrl, {
                '_token': "{{ csrf_token() }}",
            })
            .then(function (response) {
                // Handle the response data here
                console.log(response.data);
                $('.terms-condition-body').html(response.data);
                $('#termsCondition').modal('show');
            })
            .catch(function (error) {
                // Handle any errors that occurred during the request
                console.error(error);
            });
        });
    });
</script>
@endsection
