@extends('includes.layouts.admin')
@section('page-title')
    Order History
@endsection
@section('content')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cancelBtn {
            background-color: #d03333 !important;
        }
        .selectOrderStatus{
            border: 1px solid #ccc !important
        }
    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order History</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order history</li>
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

                                    <select class="select form-control-sm selectOrderStatus" name="orderStatus" id="orderStatus">
                                        <option value="">Select</option>

                                        @foreach($order_status as $key => $value)

                                        <option value={{ $value }} @if ($orderStatus == $value)selected @endif>{{ $value == 'pending' ? 'Incomplete' : ($value == 'progress' ? 'Inprogress' : 'Complete') }}</option>
                                        @endforeach
                                    </select>

                                    <input type="text" name="dateRange" value="{{ $fullDate }}"
                                        placeholder="Select Date Range" class="form-control form-control-sm" id="dateRange" />

                                    <input type="text" value="{{ $search }}" name="search"
                                        placeholder="Find by order id or company name"
                                        class="form-control form-control-sm" id="search">


                                    {{-- <input type="text" name="agent_id" value="{{ $filter['agent_id'] }}" placeholder="Find by agent id" id="agent_id" class="form-control form-control-sm" required > --}}

                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn_baseColor" type="submit">Search</button>
                                    </div>
                                    &nbsp;
                                    <div class="input-group-append">
                                        {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}

                                        <a href="{{ route('admin.order-history') }}" class="btn btn-sm btn_baseColor"
                                            id="clear-search" type="button">Reset &nbsp;</a>

                                    </div>
                                    &nbsp;
                                    <div class="input-group-append">
                                        {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}

                                        @if ($request->has('dateRange'))
                                        <a href="{{ route('admin.order-history-report',['orderStatus'=>$request->get('orderStatus'),'dateRange' => $request->get('dateRange'),'search' => $request->get('search')]) }}" class="btn btn-sm btn_baseColor"
                                        id="clear-search" type="button"><i class="fa-solid fa-download"></i> Report &nbsp;</a>
                                        @else
                                        <a href="{{ route('admin.order-history-report') }}" class="btn btn-sm btn_baseColor"
                                        id="clear-search" type="button"><i class="fa-solid fa-download"></i> Report &nbsp;</a>
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
                                            <th>Order Id</th>
                                            <th>Created At</th>
                                            <th>Invoiced</th>
                                            <th>Package/Type</th>
                                            <th>Company Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($orders as $index => $order)
                                            <tr>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>

                                                <td> @if (isset($order->transactions[0]->invoice_id))
                                                    {{$order->transactions[0]->invoice_id}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                                @php
                                                    if ($order->cart->package != null) {
                                                        $package_type = $order->cart->package->package_type;
                                                    } else {
                                                        $package_type = $order->getCompanyByOrderId->companie_type;
                                                        // $package_type = '-';
                                                    }
                                                    $full_pkg_type = '-';
                                                    if (stripos($package_type, 'shares') !== false) {
                                                        $full_pkg_type = 'Limited By Shares';
                                                    }
                                                    if (stripos($package_type, 'Guarantee') !== false) {
                                                        $full_pkg_type = 'Limited By Guarantee';
                                                    }
                                                    if (stripos($package_type, 'Residents') !== false) {
                                                        $full_pkg_type = 'Non Residents Package';
                                                    }
                                                    if (stripos($package_type, 'PLC') !== false) {
                                                        $full_pkg_type = 'Public Limited Company';
                                                    }
                                                    if (stripos($package_type, 'Eseller') !== false) {
                                                        $full_pkg_type = 'Eseller Package';
                                                    }
                                                    if (stripos($package_type, 'LLP') !== false) {
                                                        $full_pkg_type = 'LLP Package';
                                                    }
                                                @endphp
                                                <td>{{ $full_pkg_type }}</td>
                                                <td>{{strtoupper( $order->company_name) }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary">
                                                        {{ $order->order_status == 'pending' ? 'Incomplete' : ($order->order_status == 'progress' ? 'Inprogress' : 'Complete') }}
                                                      </button>


                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">No Record Found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>

                        {{-- @if ($customer->hasPages()) --}}
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation" class="pagenation-agent">
                                {{-- {{ $customerlist->appends([
                                    'form' => $filter['search'],
                                ])->links('pagination::bootstrap-5') }} --}}
                                {!! $orders->withQueryString()->links() !!}
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
            <div class="toast" data-type="success" data-title=" Added Successfully "> {{ Session::get('success') }}</div>
        @endif
    </section>
@endsection

@section('scripts')
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
                  $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
         });


        });
        $("#searchForm").submit(function(e){
            var dateRange= $("#dateRange").val();
         var search = $("#search").val();
         var orderStatus = $("#orderStatus").val();
         console.log(orderStatus);
        //  e.preventDefault()
            if(dateRange==''&&search==''&&orderStatus==''){
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
