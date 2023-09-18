@extends('layouts.master')
@section('content')
    <section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/digital-package-banner.png') }}">
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
                    <li><a href="/">Home</a></li>
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

    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
            <div class="companies-wrap">
                <div class="row woo-account">
                    @include('layouts.navbar')
                    <div class="col-md-12">
                        <div class="particulars-form-wrap">
                            <div class="particulars-top-step">
                                <div class="top-step-items active">
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
                                    <div class="bottom-step-items active">
                                        <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
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
                                    <div class="bottom-step-items active">
                                        <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
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
                                    <div class="bottom-step-items active">
                                        <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
                                        <p>Document</p>
                                    </div>
                                @endif


                            </div>
                            <div class="form-wrap">
                                <div class="form-info-block">
                                    <h4>Legal Documents</h4>
                                    <div class="docu-info">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis tellus
                                            et augue dignissim, quis elementum lorem imperdiet. Duis eu velit id metus
                                            maximus auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Praesent sagittis tellus et augue dignissim.
                                        </p>
                                    </div>
                                    <form id="company-document" action="{{ route('companyname.document') }}" method="post">
                                        <div class="document-list-wrap">
                                            <div class="document-list">
                                                <div class="box">
                                                    <p>Generic Limited by Share Articles</p>
                                                </div>
                                                <div class="box text-center">
                                                    <p><strong>FREE</strong></p>
                                                </div>
                                                <div class="box text-right">
                                                    <div class="switch-slider-wrap">
                                                        <label class="toggleSwitch large">
                                                            <input type="checkbox" name="generic_article" value="generic_article" id="toggle1" {{ (empty($legalDocument) || $legalDocument == 'generic_article') ? 'checked' : '' }} />
                                                            <span>
                                                                <span>Select</span>
                                                                <span>Select</span>
                                                            </span>
                                                            <a></a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            @csrf
                                            <input type="hidden" name="order_id" id="order_id" value="{{ $orderId }}">
                                            <input type="hidden" name="company_id" id="company_id" value="{{ $companyId }}">
                                            <input type="hidden" name="legal_document" id="legal_document" value="{{ (empty($legalDocument) || $legalDocument == 'generic_article') ? 'generic_article' : 'byspoke_article' }}">
                                            <input type="hidden" name="section_name" value="company_formation">
                                            <input type="hidden" name="step_name" value="document">

                                            <div class="document-list">
                                                <div class="box">
                                                    <p>Byspoke article of association</p>
                                                </div>
                                                <div class="box text-center"></div>
                                                <div class="box text-right">
                                                    <div class="switch-slider-wrap">
                                                        <label class="toggleSwitch large">
                                                            <input type="checkbox" name="byspoke_article" value="byspoke_article" id="toggle2" {{ (!empty($legalDocument) && $legalDocument == 'byspoke_article') ? 'checked' : '' }} />
                                                            <span>
                                                                <span>Select</span>
                                                                <span>Select</span>
                                                            </span>
                                                            <a></a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="byspoke-upload-file" id="file-upload" style="display: {{ (!empty($legalDocument) && $legalDocument == 'byspoke_article') ? 'block' : 'none' }}">
                                        <h3>Byspoke article of association</h3>
                                        <div class="field-wrap">
                                            <input type="file" name="document" id="fileInput" class="fiel">
                                            <button class="btn attach_file">Attach</button>
                                            @if(!empty($mediaDoc['name']))
                                                <a href="{{ $mediaDoc['url'] }}" class="btn view_file" target="_blank">View</a>
                                                <input type="hidden" name="document_type" id="document_type" value="true">
                                            @else
                                                <input type="hidden" name="document_type" id="document_type" value="false">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="step-btn-wrap mt-4" style="justify-content: space-between">
                                        <a href="{{ route('appointments', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'appointments']) }}">
                                        <button class="btn prev-btn"><img src="{{ asset('frontend/assets/images/btn-left-arrow.png') }}" alt=""> Previous: Appointment</button></a>
                                        <button class="btn save-next">Save &amp; Continue <img src="{{ asset('frontend/assets/images/btn-right-arrow.png') }}" alt=""></button>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // When the first toggle is clicked
        $("#toggle1").click(function() {
            // alert($(this).prop("checked"));
            // If it's turned on, turn off the second toggle
            if ($(this).prop("checked") == false) {
                $("#toggle2").prop("checked", true);
                $("#legal_document").val('byspoke_article');
                $("#file-upload").show();
            } else {
                $("#toggle2").prop("checked", false);
                $("#legal_document").val('generic_article');
                $("#file-upload").hide();
            }
        });

        // When the second toggle is clicked
        $("#toggle2").click(function() {
            // If it's turned on, turn off the first toggle
            if ($(this).prop("checked") == false) {
                $("#toggle1").prop("checked", true);
                $("#legal_document").val('generic_article');
                $("#file-upload").hide();
            } else {
                $("#toggle1").prop("checked", false);
                $("#legal_document").val('byspoke_article');
                $("#file-upload").show();
            }
        });

        $(".attach_file").click(function() {
            const fileInput = document.getElementById("fileInput");
            $('.attach_file').prop('disabled', true).text('Attaching...');

            // Validate file type
            const allowedFileTypes = ['pdf', 'doc', 'docx'];

            if(!fileInput.files[0]) {
                $('.attach_file').prop('disabled', false).text('Attach');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a file'
                })
                return false;
            }
            const fileName = fileInput.files[0]?.name.toLowerCase();
            const fileType = fileName.split('.').pop();

            if (fileInput.files.length > 0 && allowedFileTypes.includes(fileType)) {
                const maxFileSizeMB = 2;
                const maxFileSizeBytes = maxFileSizeMB * 1024 * 1024;
                const fileSizeBytes = fileInput.files[0].size;

                if (fileSizeBytes <= maxFileSizeBytes) {
                    const formData = new FormData();
                    formData.append("document", fileInput.files[0]);
                    formData.append("order_id", $('#order_id').val());
                    formData.append("model_id", $('#company_id').val());
                    formData.append("legal_document", $('#legal_document').val());

                    axios.post("/company-document", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    })
                    .then(function(response) {
                        // console.log("File uploaded successfully:", response.data);
                        $('.attach_file').prop('disabled', false).text('Attach');
                        Swal.fire({
                            icon:'success',
                            title: 'File uploaded successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1550);
                    })
                    .catch(function(error) {
                        console.error("Error uploading file:", error);
                    })
                    .finally(function () {
                        // Re-enable the button and change the text back to "Attach"
                        $('.attach_file').prop('disabled', false).text('Attach');
                    });
                } else {
                    Swal.fire(
                        'File too large',
                        'File size exceeds 2MB.',
                        'error'
                    );
                    $('.attach_file').prop('disabled', false).text('Attach');
                }
            } else {
                // Show error message for invalid file type
                Swal.fire(
                    'Invalid File Type',
                    'Please select a PDF, DOC, or DOCX file.',
                    'error'
                );
                $('.attach_file').prop('disabled', false).text('Attach');
            }
        });


        $(".save-next").click(function(e) {
            e.preventDefault();
            if($('#legal_document').val() == 'byspoke_article' && $('#document_type').val() == 'false') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please upload document',
                })
                return false;
            } else {
                console.log('success');

                $("#company-document").submit();
            }
        });
    });
</script>
@endsection
