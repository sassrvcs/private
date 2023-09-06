@extends('includes.layouts.admin')
@section('page-title')
    Company List
@endsection
@section('content')
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

                        <form action="">
                            <div class="input-group w-25 float-right">

                                <input type="text" value="{{ $search }}" name="search" placeholder="Find by name" id="search"
                                    class="form-control form-control-sm">

                                {{-- <input type="text" name="agent_id" value="{{ $filter['agent_id'] }}" placeholder="Find by agent id" id="agent_id" class="form-control form-control-sm" required > --}}

                                <div class="input-group-append">
                                    <button class="btn btn-sm btn_baseColor" type="submit">Search</button>
                                </div>
                                &nbsp;
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}
                                    <a href="{{ route('admin.company.index') }}" class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</a>
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
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Auth. Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php //$companyNames = $companies->companies->pluck('companie_name')->unique(); @endphp
                                    
                                    @php //$companyNames = preg_replace('/\b(?:LTD|LIMITED)\b/i', '', strtoupper($companyNames)); @endphp
                                    

                                    @forelse($companies as $key => $order)                                        
                                        <tr>

                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td> 
                                            <td>
                                                {{ strtoupper($order->company_name) ?? "-" }}
                                            </td>                                            
                                            <td>{{ $order->company_number ?? "-" }}</td>
                                            <td>{{ $order->auth_code ?? "-" }}</td>                                            
                                            <td><span class="status {{ ($order->order_status == 'pending') ? 'incomplete' : 'accepted' }}">{{ ($order->order_status == 'pending') ? 'INCOMPLETE' : 'ACCEPTED' }}</span></td>
                                            <td>
                                                <a href="{{ route('admin.company.show', $order->order_id) }}" 
                                                    class="view-btn"><img src="{{ asset('frontend/assets/images/search-icon.png') }}" alt="">
                                                </a>
                                            </td>
                                        </tr>                                    
                                    @empty
                                        <tr>
                                            <td colspan="5">No Record Found.</td>
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
                                @if($companies)
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
        <div class="toast" data-type="success" data-title=" Added Successfully "> {{ Session::get('success') }}</div>
    @endif
</section>
@endsection

@section('scripts')
<script>
    {{-- $(document).ready(function(){

    }); --}}
</script>
@include('admin.commonScript.script')
@endsection
