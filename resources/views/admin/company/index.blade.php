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
                                        <th>Title</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Comp. No.</th>
                                        <th>Auth. Code</th>
                                        <th>Approval</th>
                                        <th>Action</th>
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
                                            <td>
                                                <a class="btn btn_baseColor btn-sm mt-2" data-toggle="modal" data-target="#modalSubmitCompanyHouse" id="submitCompanyHouse" onClick="SubmitCompanyHouse('{{ $order->order_id }}')"> 
                                                    Submit to companies house
                                                </a>
                                            </td> 
                                            <td>
                                                <a class="btn btn_baseColor btn-sm mt-2" data-toggle="modal" data-target="#modalCheckStatus" id="checkStatus" onClick="CheckStatus('{{ $order->order_id }}')"> 
                                                    Check Status
                                                </a>
                                            </td>                                           
                                            <td>
                                                <input type="text" name="company_number_{{ $order->order_id }}" id="company_number_{{ $order->order_id }}" value="{{ $order->company_number ?? '' }}">
                                                <span class="error" id="error_company_number_{{ $order->order_id }}"></span>
                                            </td>
                                            <td>
                                                <input type="text" name="auth_code_{{ $order->order_id }}" id="auth_code_{{ $order->order_id }}" value="{{ $order->auth_code ?? '' }}">
                                                <span class="error" id="error_auth_code_{{ $order->order_id }}"></span>
                                            </td>                                            
                                            <td>
                                                {{--<span class="status {{ ($order->order_status == 'pending') ? 'incomplete' : 'accepted' }}">
                                                    {{ ($order->order_status == 'pending') ? 'INCOMPLETE' : 'ACCEPTED' }}
                                                </span>--}}                                                

                                                <select class="select form-control @error('title') is-invalid @enderror" name="status_{{ $order->order_id }}" id="status_{{ $order->order_id }}">
                                                    @foreach($statuses as $key => $value)
                                                    <option value={{ $key }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <a class="btn btn_baseColor btn-sm mt-2" data-toggle="modal" id="updateStatus" onClick="UpdateStatus('{{ $order->order_id }}')"> 
                                                    Update
                                                </a>
                                            </td>  
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

<!-- ====modal==== -->
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
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
    </div>
</div>

<!-- ====modal==== -->
<div class="modal fade" id="modalCheckStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal Check Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.4.5.2.js')}}"></script>
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
                if(res.status == 'success'){
                    $("#modalSubmitCompanyHouse").show();  
                }  
            }
        });
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
                if(res.status == 'success'){
                    $("#modalCheckStatus").show();  
                }  
            }
        });
    }  

    function UpdateStatus(order_id) {       

        var company_number = $("#company_number_" + order_id).val();
        var auth_code = $("#auth_code_" + order_id).val();
        var status = $("#status_" + order_id).val();

        // alert(auth_code);

        if(status == 2){
            if(company_number==""){            
                $("#error_company_number_" + order_id).html("Company no. is required")
                setTimeout(function(){            
                }, 5000); 
                return false
            }

            if(auth_code==""){            
                $("#error_auth_code_" + order_id).html("Auth code. is required")
                setTimeout(function(){            
                }, 5000); 
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
                status: status
            },
            success: function(res) {
                console.log(res);
                if(res.status == 'success'){
                    location.reload();    
                }  
            }
        });
    }        
</script>
<style type="text/css">
    .error{
        color: red;
    }
</style>
@include('admin.commonScript.script')
@endsection
