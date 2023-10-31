@extends('includes.layouts.admin')
@section('page-title')
    Company List
@endsection
@section('content')
<style type="text/css">
    .error {
        color: red;
    }

    .cancelBtn {
        background-color: #d03333 !important;
    }

    .search_company_status {
        border: 1px solid #ccc !important
    }
</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Company List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Company List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card pdb-75">
                    <div class="card-header">

                        <form action="" id="searchForm">
                            <div class="input-group w-50 float-right">
<select class="select form-control-sm search_company_status" name="company_status" id="company_status">
                                        <option value="">Select</option>

                                        @foreach ($statuses as $key => $value)
                                            <option value={{ $key }}
                                                @if ($companyStatus == $key) selected @endif>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>

                                <input type="text" name="dateRange" value="{{ $fullDate }}"
                                placeholder="Select Date Range" class="form-control form-control-sm"
                                        id="dateRange" />

                                <input type="text" value="{{ $search }}" name="search"
                                        placeholder="Find by name" id="search" class="form-control form-control-sm">

                                {{-- <input type="text" name="agent_id" value="{{ $filter['agent_id'] }}" placeholder="Find by agent id" id="agent_id" class="form-control form-control-sm" required > --}}

                                <div class="input-group-append">
                                    <button class="btn btn-sm btn_baseColor" type="submit">Search</button>
                                </div>
                                &nbsp;
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}
                                    <a href="{{ route('admin.company.index') }}" class="btn btn-sm btn_baseColor" id="clear-search" type="button">Reset &nbsp;</a>
                                </div>
                                &nbsp;
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}

                                    @if ($request->has('dateRange'))
                                    <a href="{{ route('admin.company-download-report', ['company_status'=>$request->get('company_status'),'dateRange' => $request->get('dateRange'), 'search' => $request->get('search')]) }}"
                                                class="btn btn-sm btn_baseColor" id="clear-search" type="button"><i
                                                    class="fa-solid fa-download"></i> Report &nbsp;</a>
                                    @else
                                    <a href="{{ route('admin.company-download-report') }}"
                                                class="btn btn-sm btn_baseColor" id="clear-search" type="button"><i
                                                    class="fa-solid fa-download"></i> Report &nbsp;</a>
                                    @endif


                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                        <div class="container-fluid table-responsive">
                            <table class="table table-striped table-bordered table-sm text-center ">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Incorporated</th>
                                        <th>Company Name</th>
                                        <th>View XML</th>
                                        <th>Download Summary</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Comp. No.</th>
                                        <th>Auth. Code</th>
                                        <th>Admin Comment</th>
                                        <th>Approval</th>
                                        {{-- <th>Action</th> --}}
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>




                                    @forelse($companies as $key => $order)
                                        <tr>

                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                                            <td>
                                                {{ strtoupper($order->company_name) ?? '-' }}
                                            </td>
                                            <td><a class="btn btn_baseColor btn-sm mt-2" id="viewXML"
                                                        onClick="viewXML('{{ $order->order_id }}')">
                                                View
                                            </a></td>
                                            <td width="167">
                                                @php
                                                        $summary_step_exist = \App\Models\companyFormStep::where('order', $order->order_id)
                                                            ->where('step', 'review')
                                                            ->first();
                                                @endphp
                                                @if ($summary_step_exist)
                                                <button class=" btn btn_baseColor btn-sm mt-2"
                                                            onclick="window.location.href='/review/create?order={{ $order->order_id }}&section=Review&step=download'"><img
                                                                src="assets/images/download-icon.svg"
                                                                alt="">Download</button>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex">

                                                        @php
                                                            $submitted = \App\Models\companyXmlDetail::where('order_id', $order->order_id)
                                                                ->pluck('submitted')
                                                                ->first();

                                                        @endphp

                                                        <a class="btn btn_baseColor btn-sm mt-2 @if ($submitted == 1) d-none @endif"
                                                            style="margin:6px;" id="submitCompanyHouse"
                                                            onClick="SubmitCompanyHouse('{{ $order->order_id }}')">
                                                            Submit XML
                                                        </a>
                                                </div>

                                            </td>
                                            <td>
                                                <a class="btn btn_baseColor btn-sm mt-2" id="checkStatus"
                                                        onClick="CheckStatus('{{ $order->order_id }}')">
                                                    Check Status
                                                </a>
                                            </td>
                                            @php
                                                $company_number = \App\Models\companyXmlDetail::where('order_id', $order->order_id)
                                                        ->pluck('company_no')
                                                        ->first();

                                            @endphp
                                            <td>
                                                <input type="text" name="company_number_{{ $order->order_id }}"
                                                        id="company_number_{{ $order->order_id }}"
                                                        value="{{ $company_number ?? '' }}">
                                                <span class="error"
                                                        id="error_company_number_{{ $order->order_id }}"></span>
                                            </td>
                                            @php
                                                $auth_code = \App\Models\companyXmlDetail::where('order_id', $order->order_id)
                                                        ->pluck('authentication_code')
                                                        ->first();
                                                $admin_comment = \App\Models\companyXmlDetail::where('order_id', $order->order_id)
                                                        ->pluck('admin_comment')
                                                        ->first();

                                            @endphp
                                            <td>
                                                <input type="text" name="auth_code_{{ $order->order_id }}"
                                                        id="auth_code_{{ $order->order_id }}"
                                                        value="{{ $auth_code ?? '' }}">
                                                <span class="error"
                                                        id="error_auth_code_{{ $order->order_id }}"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="admin_comment_{{ $order->order_id }}"
                                                        id="admin_comment_{{ $order->order_id }}"
                                                        value="{{ $admin_comment ?? '' }}">
                                                <span class="error"
                                                        id="error_admin_comment_{{ $order->order_id }}"></span>
                                            </td>
                                            <td>
                                                {{-- <span class="status {{ ($order->order_status == 'pending') ? 'incomplete' : 'accepted' }}">
                                                    {{ ($order->order_status == 'pending') ? 'INCOMPLETE' : 'ACCEPTED' }}
                                                </span> --}}
                                                @php
                                                    $company_status = \App\Models\Companie::where('order_id', $order->order_id)
                                                            ->pluck('status')
                                                            ->first();

                                                @endphp
                                                    <select class="select form-control @error('title') is-invalid @enderror"
                                                        name="status_{{ $order->order_id }}"
                                                        id="status_{{ $order->order_id }}">
                                                    @foreach ($statuses as $key => $value)
                                                    <option value={{ $key }}
                                                                @if ($key == $company_status) selected @endif>
                                                                {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <a class="btn btn_baseColor btn-sm mt-2" data-toggle="modal"
                                                        id="updateStatus"
                                                        onClick="UpdateStatus('{{ $order->order_id }}')">
                                                    Update
                                                </a>
                                            </td>
                                            {{-- <td>
                                                <a href="{{ route('admin.company.show', $order->order_id) }}"
                                                    class="view-btn"><img
                                                            src="{{ asset('frontend/assets/images/search-icon.png') }}"
                                                            alt="">
                                                </a>
                                            </td> --}}
                                            <td>
                                                <a href="{{ route('admin.company.sendEmail', $order->order_id) }}"
                                                    class="btn btn_baseColor btn-sm mt-2">
                                                    Send Email To User
                                                </a>

                                            </td>
                                            <td>
                                                <a href="{{ route('admin.company.sendEmailAgent', $order->order_id) }}"
                                                    class="btn btn_baseColor btn-sm mt-2">
                                                    Send Email To Bank Agent
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12">No Record Found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>

                    {{-- @if ($users->hasPages()) --}}
                    <!-- Card Footer -->
                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation" class="pagenation-agent">
                                @if ($companies)
                                    {!! $companies->withQueryString()->links('pagination::bootstrap-4') !!}
                                @endif
                            </nav>
                        </div>
                    {{-- @endif --}}
                    <!-- /Card Footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->
    @if (Session::has('success'))
        <div class="toast" data-type="success" data-title=" Added Successfully "> {{ Session::get('success') }}
            </div>
    @endif
</section>

<!-- ====modal====
<div class="modal fade" id="modalSubmitCompanyHouse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal Submit Company Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <h2>Thank you.</h2>
                    <p>Your company form has been submitted to Companies house.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
    </div>
</div> -->

<!-- ====modal==== -->
<div class="modal fade" id="modalCheckStatus" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> Check Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <p>Status Code - <span id="status_code"></span></p>
                <p>Company Number - <span id="company_no"></span></p>
                <p>Auth Code - <span id="auth_code"></span></p>
                <p>Description - <span id="desc"></span></p>
                <p>Date of Incorporation - <span id="date"></span></p>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="modalOff()">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
    </div>
</div>

<!-- ===View XML === -->
<div class="modal fade" id="modalViewXml" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> Check Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="color: black!important" onclick="xmlViewmodalOff()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <p id="xml_data"></p>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="xmlViewmodalOff()">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.4.5.2.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script>
    {{-- $(document).ready(function(){

    }); --}}

    function SubmitCompanyHouse(order_id) {

        $.ajax({
            url: "{{ route('admin.submit_company_house') }}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                order_id: order_id,
            },
            success: function(res) {
                console.log(res);
                if (res.status == 'success') {
                    // console.log('here');
                    // $("#modalSubmitCompanyHouse").modal('show');
                    Swal.fire(
                            'Thank You!',
                            'Your company form has been submitted to Companies House',
                            'success'
                            )
                            .then(function() {
                                location.reload()
                            });
                } else if (res.status == 'error_xml') {
                    Swal.fire(
                            'Opps!',
                            res.data.GovTalkErrors.Error.Text,
                            'error'
                            )
                } else {
                    Swal.fire(
                            'Opps!',
                            'There are some technical issues. Maybe Company form has not been completed.',
                            'error'
                            )
                }
            }
        });
    }

    function modalOff() {
        $("#modalCheckStatus").modal('hide');
    }

    function viewXML(order_id) {
        console.log('order_id', order_id);
        $.ajax({
            url: "{{ route('admin.view_xml') }}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                order_id: order_id,
            },
            success: function(res) {
                console.log(res);
                if (res.status == 'success') {
                    console.log(res.xml);
                    $("#modalViewXml").modal('show');
                    $('#xml_data').text(res.xml);

                } else {
                    Swal.fire(
                            'Opps!',
                            'There are some technical issues. Maybe Company form has not been completed.',
                            'error'
                            )
                }
            }
        });
    }

    function xmlViewmodalOff() {
        $("#modalViewXml").modal('hide');

    }

    function CheckStatus(order_id) {

        $.ajax({
            url: "{{ route('admin.check_status') }}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                order_id: order_id,
            },
            success: function(res) {
                console.log(res);
                if (res.status == 'success') {
                    $("#modalCheckStatus").modal('show');
                    $('#desc').html(res.comment);
                    $('#auth_code').html(res.auth_code);
                    $('#company_no').html(res.company_number);
                    $('#status_code').html(res.xml_status);
                    $('#date').html(res.date);

                } else {
                    Swal.fire(
                            'Opps!',
                            'There are some technical issues. Maybe Company form has not been completed.',
                            'error'
                            )
                }
            }
        });
    }

    function UpdateStatus(order_id) {

        var company_number = $("#company_number_" + order_id).val();
        var auth_code = $("#auth_code_" + order_id).val();
        var status = $("#status_" + order_id).val();
        var admin_comment = $("#admin_comment_" + order_id).val();

        // alert(auth_code);

        if (status == 3) {
            if (company_number == "") {
                $("#error_company_number_" + order_id).html("Company no. is required")
                setTimeout(function() {}, 5000);
                return false
            }

            if (auth_code == "") {
                $("#error_auth_code_" + order_id).html("Auth code. is required")
                setTimeout(function() {}, 5000);
                return false
            }
        }

        if (status == 4) {
            if (admin_comment == "") {
                $("#error_admin_comment_" + order_id).html("Comment is required")
                setTimeout(function() {}, 5000);
                return false
            }

        }

        $.ajax({
            url: "{{ route('admin.update_status') }}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                order_id: order_id,
                company_number: company_number,
                auth_code: auth_code,
                status: status,
                admin_comment: admin_comment
            },
            success: function(res) {
                console.log(res);
                if (res.status == 'success') {
                    location.reload();
                }
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('input[name="dateRange"]').daterangepicker({
            opens: 'left',
            autoUpdateInput: false,
            // endDate: '+0d',
            // autoclose: true
            maxDate: new Date(),

        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                .format('YYYY-MM-DD'));
        });
        $('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
              $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format(
                    'YYYY-MM-DD'));
     });


    });
    $("#searchForm").submit(function(e) {
        var dateRange = $("#dateRange").val();
     var search = $("#search").val();
        var company_status = $("#company_status").val();

            if (dateRange == '' && search == '' && company_status == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Please select at-least one filter',
            })
            e.preventDefault();
        }
    })

</script>

@include('admin.commonScript.script')
@endsection
