@extends('layouts.app')
@section('content')
 <!-- ================ start: about us banner ================= -->

 <section class="about_banner">
    <div class="bg_layer">
        <img src="{{ asset('frontend/assets/images/about_banner.jpg') }}" alt="">
    </div>
    <div class="text_layer">
        <div class="custom-container h-100">
            <div class="page_name">
                <h1  data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">About <span class="txt_green">Us</span></h1>
            </div>
        </div>
    </div>
</section>

<!-- ================ end: about us banner ================= -->


<!-- ============= start: overview of formation hunt ====================== -->

<section class="overview_block">
    <div class="custom-container">
            <div class="text_block">
                <div class="txt_block_inner">
                    <div class="title_block">
                        <span class="tag" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Introduction</span>
                        <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"><span class="txt_green">Overview of</span> Formations Hunt</h2>
                        <p class="subtitle" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Welcome to Formations Hunt – Your Premier Partner in Company Formation in the UK.</p>
                    </div>
                    <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">At Formations Hunt, we take pride in being at the forefront of company formation services, dedicated to helping entrepreneurs and business owners navigate the intricate process of establishing their companies in the United Kingdom. With a wealth of experience and a commitment to excellence, we have emerged as a trusted name in the industry.

                        Our journey is rooted in a passion for empowering businesses to thrive. Guided by a customer-centric approach, we provide comprehensive solutions that go beyond the ordinary, ensuring a seamless and efficient process for company formation.

                        As a dynamic team, we understand the significance of every business endeavour. From startups to established enterprises, we cater to diverse needs, offering bespoke services that align with the unique requirements of each client.

                        Discover the Formations Hunt advantage – where expertise meets excellence, and your business aspirations find a trusted ally.
                        </p>
                </div>
            </div>
            <div class="img_block">
                <div class="img_box img_box_1"  data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <img src="{{ asset('frontend/assets/images/image_43.jpg') }}" alt="">
                </div>
                <div class="img_box img_box_2"  data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                    <img src="{{ asset('frontend/assets/images/image_42.jpg') }}" alt="">
                </div>
            </div>
        </div>
</section>

<!-- ============= end: overview of formation hunt =================== -->


<!-- ============== start: what we do =============== -->

<section class="what_we_do_block">
    <div class="custom-container">
            <div class="img_block">
                <div class="img_block_inner" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <img src="{{ asset('frontend/assets/images/image_42.jpg') }}" alt="">
                </div>
            </div>
            <div class="text_block">
                <div class="txt_block_inner">
                    <div class="title_block">
                        <span class="tag" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">vision & mission
                        </span>
                        <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"><span class="txt_green">What</span> We do</h2>
                        <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="subtitle">At Formations Hunt, our vision is to be the catalyst for your business success. We envision a landscape where every entrepreneur can embark on their business journey with confidence, supported by a reliable partner committed to their growth.</p>
                    </div>
                    <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our mission is clear – to simplify and streamline the company formation process for our clients. We leverage our expertise and knowledge to provide unparalleled services that empower businesses to thrive in the competitive business environment of the UK.
                    </p>
                </div>
            </div>
    </div>
</section>

<!-- ============== end: what we do =============== -->

<!-- ================== start: expert skill set ================== -->

<section class="skill_set_block">
    <div class="bg_layer">
        <img src="{{ asset('frontend/assets/images/skill_set_bg.jpg') }}" alt="">
    </div>
    <div class="text_layer">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title_block">
                        <span class="tag" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our skill set</span>
                        <h2 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                            Expert in Business
                        </h2>
                    </div>
                    <div class="skill_area">
                        <div class="inner_row">
                            <div class="left_side">
                                <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">12 Years of Experience in
                                    Financial & Business</h3>
                                <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">At vero eos et iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                    eniti
                                    atque. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                    consectetur
                                    adipisci velit. At vero eos et iusto odio due dignissimos ducimus.</p>
                            </div>
                            <div class="right_side">
                                <div class="skill_details">
                                    <div class="skill_item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                        <span class="skill_name">Business</span>
                                        <div class="skill_progress">
                                            <div class="skill_progrss_bar" data-percent="59"></div>
                                        </div>
                                    </div>
                                    <div class="skill_item" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                        <span class="skill_name">Business</span>
                                        <div class="skill_progress">
                                            <div class="skill_progrss_bar" data-percent="60"></div>
                                        </div>
                                    </div>
                                    <div class="skill_item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                                        <span class="skill_name">Business</span>
                                        <div class="skill_progress">
                                            <div class="skill_progrss_bar" data-percent="85"></div>
                                        </div>
                                    </div>
                                    <div class="skill_item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                                        <span class="skill_name">Business</span>
                                        <div class="skill_progress">
                                            <div class="skill_progrss_bar" data-percent="77"></div>
                                        </div>
                                    </div>
                                    <div class="skill_item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                                        <span class="skill_name">Business</span>
                                        <div class="skill_progress">
                                            <div class="skill_progrss_bar" data-percent="45"></div>
                                        </div>
                                    </div>
                                    <div class="skill_item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                                        <span class="skill_name">Business</span>
                                        <div class="skill_progress">
                                            <div class="skill_progrss_bar" data-percent="55"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== end: expert skill set ================== -->

<!-- ================== start: tab_block_area ================== -->

<section class="tab_block_area">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <h3 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Support the needs of financial and insurance <span class="txt_green">service provider
                        businesses</span>, <span class="txt_green">regardless</span> of their size</h3>
                <ul class="tabs">
                    <li data-tab="tab_1" class="active" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">What we do</li>
                    <li data-tab="tab_2" data-aos="fade-up" data-aos-delay="100" data-aos-duration="500" data-aos-once="true">Mission</li>
                    <li data-tab="tab_3" data-aos="fade-up" data-aos-delay="150" data-aos-duration="500" data-aos-once="true">Vision</li>
                    <li data-tab="tab_4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true">award</li>
                    <li data-tab="tab_5" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000" data-aos-once="true">history</li>
                </ul>
                <div class="tab_container">
                    <div class="tab_content" id="tab_1">
                        <div class="img_text_block">
                            <div class="inner_row">
                                <div class="img_block">
                                    <div class="img_block_inner" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                                        <img src="{{ asset('frontend/assets/images/image_43.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="text_block">
                                    <div class="title_block">
                                        <span class="tag" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">What we do
                                        </span>
                                        <h4 data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true"><span class="txt_green">Client’s</span> Satisfaction</h4>
                                    </div>
                                    <div class="text_boxes">
                                        <div class="txt_item">
                                            <p class="small_title" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Best in Business</p>
                                            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. </p>
                                        </div>
                                        <div class="txt_item">
                                            <p class="small_title" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">Our success</p>
                                            <p data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab_2">
                        <div class="img_text_block">
                            <div class="inner_row">
                                <div class="img_block">
                                    <div class="img_block_inner">
                                        <img src="{{ asset('frontend/assets/images/image_42.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="text_block">
                                    <div class="title_block">
                                        <span class="tag">What we do
                                        </span>
                                        <h4><span class="txt_green">Client’s</span> Satisfaction</h4>
                                    </div>
                                    <div class="text_boxes">
                                        <div class="txt_item">
                                            <p class="small_title">Best in Business</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. </p>
                                        </div>
                                        <div class="txt_item">
                                            <p class="small_title">Our success</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab_3">
                        <div class="img_text_block">
                            <div class="inner_row">
                                <div class="img_block">
                                    <div class="img_block_inner">
                                        <img src="{{ asset('frontend/assets/images/blog3.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="text_block">
                                    <div class="title_block">
                                        <span class="tag">What we do
                                        </span>
                                        <h4><span class="txt_green">Client’s</span> Satisfaction</h4>
                                    </div>
                                    <div class="text_boxes">
                                        <div class="txt_item">
                                            <p class="small_title">Best in Business</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. </p>
                                        </div>
                                        <div class="txt_item">
                                            <p class="small_title">Our success</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab_4">
                        <div class="img_text_block">
                            <div class="inner_row">
                                <div class="img_block">
                                    <div class="img_block_inner">
                                        <img src="{{ asset('frontend/assets/images/blog2.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="text_block">
                                    <div class="title_block">
                                        <span class="tag">What we do
                                        </span>
                                        <h4><span class="txt_green">Client’s</span> Satisfaction</h4>
                                    </div>
                                    <div class="text_boxes">
                                        <div class="txt_item">
                                            <p class="small_title">Best in Business</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. </p>
                                        </div>
                                        <div class="txt_item">
                                            <p class="small_title">Our success</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_content" id="tab_5">
                        <div class="img_text_block">
                            <div class="inner_row">
                                <div class="img_block">
                                    <div class="img_block_inner">
                                        <img src="{{ asset('frontend/assets/images/blog1.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="text_block">
                                    <div class="title_block">
                                        <span class="tag">What we do
                                        </span>
                                        <h4><span class="txt_green">Client’s</span> Satisfaction</h4>
                                    </div>
                                    <div class="text_boxes">
                                        <div class="txt_item">
                                            <p class="small_title">Best in Business</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. </p>
                                        </div>
                                        <div class="txt_item">
                                            <p class="small_title">Our success</p>
                                            <p>At vero eos et iusto odio due dignissimos ducimus qui blanditiis
                                                voluptatum del eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. At vero eos et
                                                iusto odio due dignissimos ducimus qui blanditiis voluptatum del
                                                eniti atque. Neque
                                                porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur adipisci velit. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================== end: tab_block_area ================== -->


@endsection
