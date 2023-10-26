@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ================ start: common-inner-page-banner ================ -->
    <section class="common-inner-page-banner"
        style="background-image: url({{ asset('frontend/assets/images/contact-us-innerbanner.jpg') }})">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <!-- <div class="icon-container">
                        <span><img src="{{ asset('frontend/assets/images/internet-3-svgrepo-com.svg') }}"></span>
                    </div> -->
                    <figcaption>Raise <span>Ticket</span>
                    </figcaption>
                </figure>
            </div>
            <div class="center-info">
                <ul class="prev-nav-menu" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <li><a href="{{ url('index') }}">Home</a></li>
                    <li><a>Contact Us</a></li>
                </ul>
            </div>
            <div class="call-info" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <div class="icon-container">
                    <img src="{{ asset('frontend/assets/images/ic_baseline-phone.svg') }}">
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
    <section class="ticket-view-sec fix-container-width">
        <form action="{{ route('add-ticket-replies') }}" method="post">
            @csrf
            <div class="container">
                <div class="ticket-view-wrap">
                    <div class="ticket-view-area">
                        <!-- <h3 class="no-comment">No Comments</h3> -->
                        <input type="text" class="form-control" name = "id" value="{{ $id }}" hidden>
                        <div class="ticket-connent-box">
                            <div class="main-connent">
                                <h3>Ticket Description</h3>
                                <p>{{ $ticket_details->description }}</p>
                            </div>
                            @foreach ($replies as $replay)
                                <div class="rply-comment {{ $replay->replay_by == 'admin' ? 'admin-css' : 'customer-css' }}">
                                    <h3>
                                        @if ($replay->replay_by == 'admin')
                                            {{ 'Admin' }}
                                        @else
                                            {{ $ticket_details->user->forename }}
                                        @endif
                                    </h3>
                                    <p>{{ $replay->replies }}</p>
                                    <p class="date" style="text-align: right">
                                        @if ($replay->replay_by != 'admin')
                                            @if ($replay->read_by == null)
                                                <i class="fa-solid fa-check"></i>
                                            @else
                                                <i class="fa-solid fa-check-double"></i>
                                            @endif
                                        @endif
                                        {{ $replay->created_at }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ticket-view-text-area">
                        <textarea class="form-control" placeholder="Comments" name="replies" required></textarea>
                        <div class="d-flex justify-content-between pt-3">
                            <button class="btn" type="submit">Submit</button>
                            <button class="bck-btn" type="button"
                                onclick="window.location.href='{{ route('ticket.index') }}'">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
    <!-- ================ end: ontact Page ================ -->
@endsection
