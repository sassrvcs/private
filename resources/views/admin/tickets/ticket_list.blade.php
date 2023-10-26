@extends('includes.layouts.admin')
@section('page-title')
    Ticket List
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tickets</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Ticket List</li>
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
                                        <th>SL.</th>
                                        <th>Ref Id</th>
                                        <th>Subject</th>
                                        <th>Email/Phone</th>

                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tickets as $index => $ticket)
                                        <tr>
                                            <td> {{ $index+1 }}</td>
                                            <td> {{ $ticket->refId}}</td>
                                            <td> {{ $ticket->subject }}</td>
                                            <td>
                                                <div>
                                                    Email: {{ $ticket->email}}
                                                </div>
                                                <div>
                                                    Phone: {{ $ticket->phone }}
                                                </div>
                                            </td>
                                            <td> {{ $ticket->description}}</td>
                                            <td><button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('view-ticket-replies', $ticket->id) }}'">Reply
                                                @if (count($ticket->ticket_replie)>0)
                                                <span class="badge badge-light ml-2"> {{count($ticket->ticket_replie)}} new</span>
                                                @endif
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

                    {{-- @if ($users->hasPages()) --}}
                    <!-- Card Footer -->
                        <div class="card-footer">
                            <nav aria-label="Contacts Page Navigation" class="pagenation-agent">
                               {{-- {{ $users->appends([
                                    'form' => $filter['form'],
                                ])->links('pagination::bootstrap-5') }} --}}
                                {!! $tickets->withQueryString()->links() !!}
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
