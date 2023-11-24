@extends('layouts.master')
@section('content')
   <!-- ================ start: logo-portfolio-banner ================ -->
   <div class="logo-portfolio-banner" style="background-image: url({{ asset('frontend/assets/images/logo-portfolio-banner-bg.png')}});">
    <div class="custom-container">
        <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">I am
            <span>Jack</span>, a Graphic Designer
            & Creative Director
            based in San Francisco.
        </h1>
        <div class="input-with-rg-btn" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
            data-aos-once="true">
            <input type="text" placeholder="" class="input" readonly>
            <button type="button" class="rg-btn">
                <img src="{{ asset('frontend/assets/images/right-arrowbtn.svg')}}">
            </button>
        </div>
    </div>
</div>
<!-- ================ end: logo-portfolio-banner ================ -->

<!-- ================ start: myPortfolio-sec ================ -->
<div class="myPortfolio-sec">
    <div class="custom-container">
        <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">My <br />
            <span>Portfolio</span>
        </h1>
    </div>
    <div class="myPortfolio-left-right-lists">
        <div class="myPortfolio-left-right-sec">
            <div class="custom-container">
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/myPortfolio-logo1.png')}}" data-aos="fade-right" data-aos-delay="50"
                        data-aos-duration="500" data-aos-once="true">
                </div>
                <div class="text-container" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <h2>Good <span>Design</span></h2>
                    <h4>Naming, Branding, Web Design</h4>
                </div>
            </div>
        </div>
        <div class="myPortfolio-left-right-sec reverse-row" before-text="PB Tube">
            <div class="custom-container">
                <div class="logo-container" before-text="Good Design" data-aos="fade-left" data-aos-delay="50"
                    data-aos-duration="500" data-aos-once="true">
                    <img src="{{ asset('frontend/assets/images/myPortfolio-logo2.png')}}">
                </div>
                <div class="text-container" before-text="Good Design" data-aos="fade-right" data-aos-delay="100"
                    data-aos-duration="1000" data-aos-once="true">
                    <h2>PB <span>Tube</span></h2>
                    <h4>Naming, Branding, Web Design</h4>
                </div>
            </div>
        </div>
        <div class="myPortfolio-left-right-sec">
            <div class="custom-container">
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/myPortfolio-logo3.png')}}" data-aos="fade-right" data-aos-delay="50"
                        data-aos-duration="500" data-aos-once="true">
                </div>
                <div class="text-container" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <h2>OnBank <span>Banking</span></h2>
                    <h4>Branding, Web Design, App</h4>
                </div>
            </div>
        </div>
        <div class="myPortfolio-left-right-sec reverse-row" before-text="Good Design">
            <div class="custom-container">
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/myPortfolio-logo4.png')}}" data-aos="fade-left" data-aos-delay="50"
                        data-aos-duration="500" data-aos-once="true">
                </div>
                <div class="text-container" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <h2>Good <span>Design</span></h2>
                    <h4>Naming, Branding, Web Design</h4>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ================ end: myPortfolio-sec ================ -->

<!-- ================ start: ourWorks-sec ================ -->
<div class="ourWorks-sec">
    <div class="custom-container">
        <h1 before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
            data-aos-once="true">Our <span>Works</span></h1>
        <ul class="ourWorks-lists">
            <li before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="ourWorks-box">
                    <img src="{{ asset('frontend/assets/images/ourWorks-pic1.png')}}">
                </div>
            </li>
            <li before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="ourWorks-box">
                    <img src="{{ asset('frontend/assets/images/ourWorks-pic2.png')}}">
                </div>
            </li>
            <li before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="ourWorks-box">
                    <img src="{{ asset('frontend/assets/images/ourWorks-pic3.png')}}">
                </div>
            </li>
            <li before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="ourWorks-box">
                    <img src="{{ asset('frontend/assets/images/ourWorks-pic1.png')}}">
                </div>
            </li>
            <li before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="ourWorks-box">
                    <img src="{{ asset('frontend/assets/images/ourWorks-pic2.png')}}">
                </div>
            </li>
            <li before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="ourWorks-box">
                    <img src="{{ asset('frontend/assets/images/ourWorks-pic3.png')}}">
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- ================ end: ourWorks-sec ================ -->
<!-- ================ start: ourClients-02-sec ================ -->
<div class="ourClients-02-sec">
    <div class="custom-container">
        <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our
            <br /><span>Clients</span>
        </h1>
        <div class="left-right-text-with-image">
            <div class="text-container">
                <h4 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Pellent esque dignissim eros a sapien
                    tempus.</h4>
                <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">At vero eos
                    et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque.
                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit. At
                    vero eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque
                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.At vero
                    eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque porro
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.At vero eos et
                    iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque porro
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.</p>
                <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Neque porro
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.At
                    vero eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque
                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.At vero
                    eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque porro
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.</p>
            </div>
            <div class="image-container">
                <ul class="logo-lists">
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo1.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo2.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo3.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo4.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo5.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo6.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo7.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo8.png"')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo9.png')}}>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo10.png')}}">
                    </li>
                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo11.png')}}">
                    </li>

                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo12.png')}}">
                    </li>

                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo13.png')}}">
                    </li>

                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo14.png')}}">
                    </li>

                    <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-logo15.png')}}">
                    </li>
                </ul>
            </div>
        </div>
        <div class="logo-with-text-lists">
            <ul>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-pic1.png')}}">
                    </div>
                    <div class="text-container"><span>x</span>9</div>
                </li>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-pic2.png')}}">
                    </div>
                    <div class="text-container"><span>x</span>5</div>
                </li>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-pic3.png')}}">
                    </div>
                    <div class="text-container"><span>x</span>8</div>
                </li>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="icon-container">
                        <img src="{{ asset('frontend/assets/images/ourClients-02-pic4.png')}}">
                    </div>
                    <div class="text-container"><span>x</span>12</div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ================ end: ourClients-02-sec ================ -->

<!-- ================ start: designTogether-02-sec ================ -->
<div class="designTogether-02-sec">
    <div class="custom-container">
        <div class="left-div">
            <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Let’s Design <br>
                together!</h1>
        </div>
        <div class="right-div">
            <div class="icon-container" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <img src="{{ asset('frontend/assets/images/right-arrow-whtie.svg')}}">
            </div>
            <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Get in touch </h2>
            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
</div>
<!-- ================ end: designTogether-02-sec ================ -->

@endsection
