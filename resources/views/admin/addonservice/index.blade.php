@extends('includes.layouts.admin')
@section('page-title')
    Add-on Services List
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add-on Services List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add-on Service List</li>
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

                                {{-- <input type="text" value="" name="email" placeholder="Find by email" id="email"
                                    class="form-control form-control-sm" pattern="^(0|[1-9][0-9]*)$"
                                    oninvalid="setCustomValidity('Please enter valid email')"
                                    onchange="try{setCustomValidity('')} catch(e){}" required> --}}

                                <input type="text" name="agent_id" value="" placeholder="Find by agent id" id="agent_id" class="form-control form-control-sm" required >

                                <div class="input-group-append">
                                    <button class="btn btn-sm btn_baseColor" type="submit">Search</button>
                                </div>
                                {{-- &nbsp; --}}
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}
                                    <a href="" class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</a>
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
                                        <th>Serial No</th>
                                        <th>Name</th>
                                        <th>Agent Id</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Joining Date</th>
                                        <th>Status</th>
                                        <th>Activate/Deactivate</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>gfhfg </td>
                                        <td>vbnbv </td>
                                        <td>bnbvn</td>
                                        <td>gfcg</td>
                                        <td> gfg</td>
                                        <td> fgfdg</td>
                                        <td> 1</td>
                                        
                                        
                                        <td>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" data-id="" class="custom-control-input">
                                                    <label class="custom-control-label" for="customSwitch"></label>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="form-group">
                                                <a href="" class="" style="color: #1c55ad; padding-right: 6px;">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            
                                                <a href="javascript:{}" class="delete-user" data-id="">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                               
                                                {{-- <a href="#" class="btn btn_baseColor btn-sm"> View </a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td colspan="8">No Record Found.</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                   
                    <!-- Card Footer -->
                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation" class="pagenation-agent">
                               
                            </nav>
                        </div>
                    
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