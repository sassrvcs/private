<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

    <li class="nav-item">

        <a class="nav-link {{ request()->routeIs('accepted-company') ? 'active' : '' }}" id="pills-home-tab"  href="{{ route('accepted-company', ['order' => $_GET['order'],'c_id'=>$_GET['c_id']]) }}"

            role="tab" aria-controls="pills-home" aria-selected="false">Overview</a>

    </li>

    <li class="nav-item">
        
        <a class="nav-link {{ request()->routeIs('document-companies') ? 'active' : '' }}" id="pills-profile-tab" href="{{ route('document-companies', ['order' => $order_id, 'c_id' => $_GET['c_id']]) }}"

            role="tab" aria-controls="pills-profile" aria-selected="false">Documents</a>

    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('services-companies') ? 'active' : '' }}" id="pills-contact-tab" href="{{ route('services-companies', ['order' => $order_id, 'c_id' => $_GET['c_id']]) }}"

            role="tab" aria-controls="pills-contact" aria-selected="false">Company

            Services</a>

    </li>

    <li class="nav-item">

        <a class="nav-link {{ request()->routeIs('shop-companies') ? 'active' : '' }}" id="Shop-contact-tab" href="{{ route('shop-companies', ['order' => $order_id, 'c_id' => $_GET['c_id']]) }}"

            role="tab" aria-controls="Shop-contact" aria-selected="false">Shop</a>

    </li>

    <li class="nav-item">

        <a class="nav-link" id="getting-started-tab" data-toggle="pill"

            href="#getting-started" role="tab" aria-controls="getting-started"

            aria-selected="false">Getting Started</a>

    </li>

</ul>