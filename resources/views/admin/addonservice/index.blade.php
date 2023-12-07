@extends('includes.layouts.admin')
@section('page-title')
    Add-on Service List
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add-on Service List</h1>
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

                            <input type="text" value="{{ $search }}" name="search" placeholder="Find by email or name" id="search" class="form-control form-control-sm" required>

                                {{-- <input type="text" name="agent_id" value="{{ $filter['agent_id'] }}" placeholder="Find by agent id" id="agent_id" class="form-control form-control-sm" required > --}}

                                <div class="input-group-append">
                                    <button class="btn btn-sm btn_baseColor" type="submit">Search</button>
                                </div>
                                &nbsp;
                                <div class="input-group-append">
                                    {{-- <button class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</button> --}}
                                    <a href="{{ route('admin.addonservice.index') }}" class="btn btn-sm btn_baseColor" id="clear-search" type="button">Clear &nbsp;</a>
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
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Add-On Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($addonservicelist as $index => $service)
                                        <tr>
                                            <td> {{ $index+1 }}</td>
                                            <td> {{ $service->service_name}}</td>
                                            <td> {{ $service->short_desc }}</td>
                                            <td> {{ $service->price }}</td>
                                            @php
                                                if ($service->add_on_type!=null) {
                                                    $addOnArr = json_decode($service->add_on_type);
                                                    $service->add_on_type = implode(', ', $addOnArr);
                                                }
                                            @endphp
                                            <td> {{ $service->add_on_type}}</td>
                                            <td>
                                                <div class="form-group">
                                                    <a href="{{ route('admin.addonservice.edit', $service->id) }}" class="" style="color: #1c55ad; padding-right: 6px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    {{-- <a href="javascript:{}" class="delete-user" data-id={{ $service->id }}  data-user="Addonservice "
                                                            data-route="{{ route('admin.addonservice.destroy', $service->id) }}" style="color: #f30031">
                                                        <i class="fa fa-trash"></i>
                                                    </a> --}}

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
                                {!! $addonservicelist->withQueryString()->links() !!}
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
