@extends('layouts.app')
@section('content')
<!-- ================ start: common-inner-page-banner ================ -->
<section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/contact-us-innerbanner.jpg')}})">
    <div class="custom-container">
        <div class="left-info">
            <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <!-- <div class="icon-container">
                    <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg')}}"></span>
                </div> -->
                <figcaption>Raise <span>Ticket</span>
                </figcaption>
            </figure>
        </div>
        <div class="center-info">
            <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="{{ url('index')}}">Home</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </div>
        <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
            <div class="icon-container">
                <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg')}}">
            </div>
            <div class="text-box">
                <p>Free Consultations 24/7</p>
                <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
            </div>
        </div>
    </div>
</section>
<!-- ================ end: common-inner-page-banner ================ -->
<!-- ================ start: Contact Page ================ -->
<section class="ticket-list-sec fix-container-width">
    <div class="container">
        <div class="ticket-list-wrap">
            <h2>Ticket <span>List</span></h2>

            <div>
                <button class="btn btn-primary float-right btn-lg mb-3" type="button" onclick="window.location.href='{{ route('ticket.create') }}'">Raise Ticket</button>
            </div>

            <div class="table-trsponsive">
                <table class="table table-bordered">
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
                        <tr>
                            @forelse ($tickets as $index => $ticket)
                            <tr>
                                <td> {{ $index+1 }}</td>
                                <td> {{ $ticket->refId}}</td>
                                <td> {{ $ticket->subject }}</td>
                                <td><div>
                                    Email: {{ $ticket->email}}
                                </div>
                                <div>
                                    Phone: {{ $ticket->phone }}
                                </div></td>
                                <td> {{ $ticket->description}}</td>
                                <td><button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('view-ticket-replies', $ticket->id) }}'">Replay
                                    @if (count($ticket->ticket_replie)>0)
                                    <span class="badge badge-light ml-2"> {{count($ticket->ticket_replie)}} new</span>
                                    @endif
                                </button>
                                    </h1>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Record Found.</td>
                            </tr>
                        @endforelse
                        </tr>

                    </tbody>
                </table>
            </div>
            <ul class="custom-pagination-s1 mt-5">
                <nav aria-label="Contacts Page Navigation" class="pagenation-agent">
                    {{-- {{ $users->appends([
                         'form' => $filter['form'],
                     ])->links('pagination::bootstrap-5') }} --}}
                     {!! $tickets->withQueryString()->links() !!}
                 </nav>
            </ul>
        </div>
    </div>
</section>
<!-- ================ end: ontact Page ================ -->
@endsection
