@extends('includes.layouts.admin')
@section('page-title')
    Custome List
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Custome List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Custome List</li>
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

                                {{-- <input type="text" name="agent_id" value="{{ $filter['agent_id'] }}" placeholder="Find by agent id" id="agent_id" class="form-control form-control-sm" required > --}}

                                {{-- <div class="input-group-append">
                                    <button class="btn btn-sm btn_baseColor" type="submit">Search</button>
                                </div> --}}
                                {{-- &nbsp; --}}
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}
                                    {{-- <a href="#" class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</a> --}}
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
                                        <th>Email</th>
                                        <th>Phone no.</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Organization</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($customerlist as $index => $customer)
                                        <tr>
                                            <td> {{ $index+1 }}</td>
                                            <td> <?php echo($customer->title.". ".$customer->forename." ".$customer->surname); ?></td>
                                            <td> {{ $customer->email }}</td>
                                            <td> {{ $customer->phone_no }}</td>
                                            <td> <?php echo($customer['address']->house_number." ".$customer['address']->street." ".$customer['address']->town); ?></td>
                                            <td> {{ $customer['address']->post_code }}</td>
                                            <td> {{ $customer->organisation }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <a href="{{ route('admin.customer.edit', $customer->id) }}" class="" style="color: #1c55ad; padding-right: 6px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:{}" class="delete-user" data-id={{ $customer->id }}  data-user="Customer "
                                                            data-route="{{ route('admin.customer.destroy', $customer->id) }}" style="color: #f30031">
                                                        <i class="fa fa-trash"></i>
                                                    </a>

                                                    {{-- <a href="#" class="btn btn_baseColor btn-sm"> View </a> --}}
                                                </div>
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
                               {{-- {{ $users->appends([
                                    'form' => $filter['form'],
                                ])->links('pagination::bootstrap-5') }} --}}
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
