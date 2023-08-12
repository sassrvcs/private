<div class="particulars-top-step">
    <div class="top-step-items active">
        <strong>1.Company Formation</strong>
        <span>Details about your company</span>
    </div>
    <div class="top-step-items">
        <strong>2.Company Formation</strong>
        <span>Details about your company</span>
    </div>
    <div class="top-step-items">
        <strong>3.Company Formation</strong>
        <span>Details about your company</span>
    </div>
    <div class="top-step-items">
        <strong>4.Company Formation</strong>
        <span>Details about your company</span>
    </div>
</div>
<div class="particulars-bottom-step">
    <div class="bottom-step-items active">
        <img src="{{ asset('frontend/assets/images/active-tick.svg') }}" alt="">
        <p>
            <a href="{{ route('companie-formation', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" style="color: #ffffff;"> Particulars</a>
        </p>
    </div>
    <div class="bottom-step-items">
        <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
        <p>
            <a href="{{ route('registered-address', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" style="color: #ffffff;"> Registered Address </a>
        </p>
    </div>
    <div class="bottom-step-items">
        <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
        <p>Business Address</p>
    </div>
    <div class="bottom-step-items">
        <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
        <p>Appointment</p>
    </div>
    <div class="bottom-step-items">
        <img src="{{ asset('frontend/assets/images/inactive-tick.svg') }}" alt="">
        <p>
            <a href="{{ route('companyname.document', ['order' => $_GET['order'] ?? '', 'section' => 'Company_formaction', 'step' => 'register-address']) }}" style="color: #ffffff;"> Document </a>
        </p>
    </div>
</div>