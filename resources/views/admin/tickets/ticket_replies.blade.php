@extends('includes.layouts.admin')
@section('page-title')
    Ticket List
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

                        </div>
                    </div>

                    {{-- @if ($users->hasPages()) --}}
                    <!-- Card Footer -->
                    <section class="ticket-view-sec fix-container-width" id="reply-ticket-view">
                        <form action="{{route('add-ticket-replies')}}" method="post">
                            @csrf
                        <div class="container">
                            <div class="ticket-view-wrap">
                                <div class="ticket-view-area">
                                    <!-- <h3 class="no-comment">No Comments</h3> -->
                                    <input type="text" class="form-control" name = "id" value="{{$id}}" hidden>
                                    <div class="ticket-connent-box">
                                        <div class="main-connent">
                                            <h3>Ticket Description</h3>
                                            <p>{{ $ticket_details->description}}</p>
                                        </div>
                                        @foreach ($replies as $replay)
                                        <div class="rply-comment {{$replay->replay_by=='admin' ? 'admin-css' : 'customer-css'}}">
                                            <h3>
                                                @if ($replay->replay_by=='admin')
                                                    {{'Admin'}}
                                                @else
                                                     {{$ticket_details->user->forename}}
                                                @endif
                                            </h3>
                                            <p>{{$replay->replies}}</p>
                                            <p class="date" style="text-align: right">
                                                @if ($replay->replay_by == 'admin')
                                                @if ($replay->read_by == null)
                                                    <i class="fa-solid fa-check"></i>
                                                @else
                                                    <i class="fa-solid fa-check-double"></i>
                                                @endif
                                            @endif
                                                {{$replay->created_at}}
                                            </p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="ticket-view-text-area">
                                    <input type="text" name="customer_name" hidden value="{{$ticket_details->user->forename}}">
                                    <input type="text" name="email" hidden value="{{$ticket_details->email}}">
                                    <input type="text" name="refId" hidden value="{{$ticket_details->refId}}">
                                    <textarea class="form-control" placeholder="Comments" name="replies" required></textarea>
                                    <div class="d-flex justify-content-between pt-3">
                                        <button class="bck-btn" type="button" onclick="window.location.href='{{ route('admin.view-tickets-admin') }}'">Back</button>
                                        <button class="btn"  type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
