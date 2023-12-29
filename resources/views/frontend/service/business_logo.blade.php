@extends('layouts.master')
@section('content')
   <!-- ================ start: logo-portfolio-banner ================ -->
   <div class="logo-portfolio-banner" style="background-image: url({{ asset('frontend/assets/images/logo-portfolio-banner-bg.png')}});">
    <div class="custom-container">
        <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">I am
            {{-- <span>Jack</span>, a Graphic Designer
            & Creative Director
            based in San Francisco. --}}
            Distinct logos fortify success, embodying brand identity, and nurturing steadfast customer allegiance.
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
    <!-- <div class="custom-container">
        <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">My <br />
            <span>Portfolio</span>
        </h1>
    </div> -->
    <div class="myPortfolio-left-right-lists">
        <div class="myPortfolio-left-right-sec">
            <div class="custom-container">
                <div class="logo-container">
                    <img src="{{ asset('frontend/assets/images/myPortfolio-logo1.png')}}" data-aos="fade-right" data-aos-delay="50"
                        data-aos-duration="500" data-aos-once="true">
                </div>
                <div class="text-container" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000"
                    data-aos-once="true">
                    <h2>What is a <span>logo?</span></h2>
                    <h4>A logo is the first identification of any organization and is designed uniquely for easy recognition. It’s basically a name, mark, or symbol to identify any organization’s idea, publication as well as its products, services, etc. A logo is a sign that also represents the brand message, type, and character of your business and the different entities of your organization.</h4>
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
                    <h2>Why is a logo <span>important for your business?</span></h2>
                    <h4>A logo is something far more than it usually seems. It's the company's first introduction to the audience. Nowadays it’s very challenging to get the attention of consumers as they don’t have time for anything more than 2 seconds, but with a good logo, you can grab the attention of the consumers very quickly and interestingly deliver your core values. Also, one logo holds many entities of your brand, it helps to make a strong first impression of your brand in front of the audience, it reflects the brand identity and it serves as the foundation for the entire narrative on which the brand is built. It also makes your brand memorable to the viewers and it also separates your brand from your competitors. </h4>
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
                    <h2>Do you need a <span>Logo?</span></h2>
                    <h4>We live in a chromatic world and people are drawn to beautiful designs and colors. That's Why logos are important for every kind of business. A logo is the first thing people notice in your business and it leads the audience to your company. It is the symbol that people recognize and connect with your brand and even if they forget the name, they can easily recall the logo. That's why a logo is very important for any business and if you choose the wrong logo for your business then it can affect your brand value and its reputation. Because good logos are aesthetically pleasing visual elements that trigger positive recall about your company. And that’s why you need a logo. </h4>
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
                    <h2>Do you need <span>something more?</span></h2>
                    <h4>If you want to create something more than just a logo to make your identity global then you should go with the other marketing materials and services that will help you to do so.</h4>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ================ end: myPortfolio-sec ================ -->

<!-- ================ start: ourWorks-sec ================ -->
<div class="ourWorks-sec">
    <div class="custom-container">
        <div class="title_head">
            <h1 before-text="Good Design" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">Our <span>Works</span></h1>
            </div>
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
        <div class="title_head">
            <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our
                <br /><span>Clients</span>
            </h1>
        </div>
        <div class="left-right-text-with-image">
            <div class="text-container">
                <h4 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Pellent esque dignissim eros a sapien
                    tempus.</h4>
                <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Distinguished by trust, our clients epitomize the success of our bespoke logo designs. Each collaboration reflects our commitment to precision and uniqueness. From startups to industry leaders, our diverse clientele attests to our ability to capture brand essence and resonate with target audiences. With a tailored approach, we've crafted logos that transcend visual aesthetics, translating into tangible business growth and customer engagement. Join our esteemed roster of clients who have experienced the transformative power of our logo design services. Elevate your brand identity with us and become a testament to the impact of strategic logo creation.</p>
                {{-- <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Neque porro
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.At
                    vero eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque
                    porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.At vero
                    eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del eniti atque. Neque porro
                    quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit.</p> --}}
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
            <div class="title_head">
                <h1 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Let’s Design
                    <br>
                    <span>together!</span>
                </h1>
            </div>
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
