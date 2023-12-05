@extends('includes.layouts.admin')
@section('page-title')
Address List
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Address list</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">AddressList</li>
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

                        
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                        <div class="container-fluid table-responsive">
                            <table class="table table-striped table-bordered table-sm text-center ">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Title</th>
                                        <th>Address Type</th>
                                        <th>Full Address</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($address as $index => $data)
                                        <tr>

                                            <td> {{ $index+1 }}</td>
                                            <td>{{$data->title}}</td>
                                            <td> {{ $data->address_type }}</td>
                                            <td>{{construct_address($data->toArray())}}
                                            </td>


                                            <td>
                                                <div class="form-group">
                                                    <a href="{{ route('admin.manage-address.edit', $data->id) }}" class="" style="color: #1c55ad; padding-right: 6px;">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    {{-- <a href="javascript:{}" class="delete-user" data-id={{ $data->id }}  data-user="Business banking "
                                                            data-route="{{ route('admin.business-banking.destroy', $data->id) }}" style="color: #f30031">
                                                        <i class="fa fa-trash"></i> --}}
                                                    </a>

                                                    {{-- <a href="#" class="btn btn_baseColor btn-sm"> View </a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Record Found.</td>
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

                                {{-- @if($address)
                                    {!! $address->withQueryString()->links('pagination::bootstrap-4') !!}
                                @endif --}}
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
