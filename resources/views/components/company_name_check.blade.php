<style>
    .search-input-modal {
        /* background: #3F4859; */
    border-width: 1px 0px 1px 1px;
    border-style: solid;
    border-color: #87CB28;
    height: 48px;
    border-radius: 24px 24px;
    width: 100%;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    letter-spacing: 0.012em;
    color: #706969;
    padding: 0 116px 0 23px;
    }
    .logo_container {
    /* text-align: center; */
    margin-bottom: 25px;
    }
</style>


<div class="modal fade company-check" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Name Check</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative overflow-hidden main-banner-outer pb-0">
                    <div class="main-banner home-banner-src" style="background:#313C4E;">
                        <div class="custom-container">
                            <div class="caption-box pb-4" style="padding-right: 0px;">

                                <div class="logo_container">
                                    <img src="/frontend/assets/images/logo.svg" class="logo">
                                </div>


                                <div class="col-md-7" id="result_show_modal" style="display: none">
                                    {{-- Available Message --}}
                                    <div class="search-result" id="available-company-modal" style="display: none">
                                        <div class="mb-4 align-items-center">
                                            <div class="col-md-12">
                                                <div class="d-flex align-items-center">
                                                    <span class="icon"><i
                                                            class="fa fa-check-circle-o"></i>&nbsp;</span>
                                                    <h2 class="search-company-name-modal"></h2>
                                                </div>
                                                <h3 style="color:#87CB28;">Congratulations! This company name is
                                                    available.</h3>
                                                <h3 style="color:#87CB28;" id="is_sensitive_word_row_modal"
                                                    style="display: none">Please note: The word(s) <span
                                                        id="is_sensitive_word"></span> is deemed sensitive. You may
                                                    need to supply additional information to use it.</h3>
                                            </div>
                                            <div class="col-md-6 "><a href="" class="btn btn-primary wow zoomIn"
                                                    id="choose_package_modal_btn">Choose Package<i
                                                        class="fa fa-long-arrow-right ms-2"></i></a></div>
                                        </div>
                                        <div class="hhr-text">Search for another name</div>
                                    </div>

                                    {{-- Not Available Message --}}
                                    <div id="not-available-company-modal" style="display: none">
                                        <div class="search-result-error mb-4">
                                            <span class="icon"><i class="fa fa-times-circle-o"></i></span>
                                            <h2 class="search-company-name-modal"></h2>
                                            <h3 style="color:white;">Error! This company name is Not available.</h3>
                                        </div>
                                        <div class="hhr-text">Search for another name</div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
                                    <div class="search-box mt-3 mb-2" data-aos="fade-right" data-aos-delay="150"
                                        data-aos-duration="1000" data-aos-once="true" style="max-width: 100%">
                                        <input type="text" id="company-name-modal" class="search-input-modal"
                                            placeholder="Enter a company name to check if its available">
                                        <input type="hidden" name="package_id" id="package_id">
                                        <button type="button" id="search_company_modal"
                                            class="search-btn theme-btn-primary">Search</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- @section('script') --}}
    <script>
        $(document).ready(function() {
            $(".buy-btn-multiple").click(function() {
                other_package_id = $(this).data('id');
                $("#package_id").val(other_package_id);
                $("#choose_package_modal_btn").attr('href', '/cart/' + other_package_id);
            })

            $('#search_company_modal').click(function() {
                var companyName = $('#company-name-modal').val();
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

                            $('#result_show_modal').hide();
                            $('#not-available-company-modal').hide();
                            $('.search-company-name-modal').text(companyName);

                            if (response.data.is_sensitive == 1) {
                                $('#is_sensitive_word_row_modal').show();
                                $('#is_sensitive_word').text(response.data.is_sensitive_word);
                            } else {
                                $('#is_sensitive_word_row_modal').hide();
                                $('#is_sensitive_word').text('');
                            }

                            $('#result_show_modal').show();
                            $('#available-company-modal').show();
                            $('.image-stamp').hide();
                            $('.search-input-modal').val('');
                        } else {
                            $('#result_show_modal').hide();
                            $('#available-company-modal').hide();


                            // Show data
                            $('.search-company-name-modal').text(companyName);
                            $('#result_show_modal').show();
                            $('#not-available-company-modal').show();
                            $('.image-stamp').hide();
                            $('.search-input-modal').val('');
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
{{-- @endsection --}}
