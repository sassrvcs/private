<div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menu-account-menu" class="navbar-nav me-auto mb-2 mb-md-0 ">
                {{-- active --}}
                <li id="menu-item-2336" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children dropdown nav-item nav-item-2336">
                    <a class="nav-link {{ request()->routeIs('my-account') || request()->routeIs('my_details') ? ' active' : '' }} dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="_mi _before fa fa-user" aria-hidden="true"></i><span>My Account</span></a>
                    <ul class="dropdown-menu depth_0">
                        <li id="menu-item-2337" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item nav-item nav-item-2337">
                            <a href="{{ route('my-account')}}" class="dropdown-item {{ request()->routeIs('my-account') ? ' active' : '' }}"><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Overview</span></a>
                        </li>
                        <li id="menu-item-2338" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2338"><a href="{{ route('my_details')}}" class="dropdown-item {{ request()->routeIs('my_details') ? ' active' : '' }}"><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>My Details</span></a></li>

                        {{-- <li id="menu-item-2340" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2338"><a href="{{ route('ticket.index')}}" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Raise Ticket</span></a></li> --}}

                        <li id="menu-item-2339" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-2339"><a href="{{ route('clientlogout')}}" class="dropdown-item " onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Logout</span></a></li>
                        <form id="logout-form" action="{{ route('clientlogout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
                <li id="menu-item-2340" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2340">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-book" aria-hidden="true"></i><span>Orders</span></a>
                    <ul class="dropdown-menu depth_0">
                        <li id="menu-item-4625" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4625"><a href="{{ route('order-history') }}" class="dropdown-item ">View All Orders</a></li>
                        <li id="menu-item-4636" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4636"><a href="{{ route('order-history', ['status' => 'pending']) }}" class="dropdown-item ">Incomplete</a></li>
                        <li id="menu-item-4643" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4643"><a href="{{ route('order-history', ['status' => 'progress']) }}" class="dropdown-item ">In Progress</a></li>
                        <li id="menu-item-4639" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4639"><a href="{{ route('order-history', ['status' => 'success']) }}" class="dropdown-item ">Completed</a></li>
                    </ul>
                </li>
                {{-- <!-- active --> --}}
                <li id="menu-item-2341" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2341">
                    <a class="nav-link {{ request()->routeIs('companies-list') ? ' active' : '' }} dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-industry" aria-hidden="true"></i><span>Companies</span></a>
                    <ul class="dropdown-menu depth_0">
                        <li id="menu-item-2371" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-2371"><a href="{{ route('companies-list') }}" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>View All Companies</span></a></li>
                        <li id="menu-item-4655" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-4655"><a href="/" class="dropdown-item ">Incorporate New Company</a></li>
                        <li id="menu-item-4656" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-4656"><a href="{{route('import-companies')}}" class="dropdown-item ">Import Company via Auth. Code</a></li>
                    </ul>
                </li>
                <li id="menu-item-2342" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2342">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fa fa-puzzle-piece" aria-hidden="true"></i><span>Services</span></a>
                    <ul class="dropdown-menu depth_0">
                        <li id="menu-item-3969" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3969"><a href="{{route('purchased-service-list')}}" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Service Purchased</span></a></li>
                        <li id="menu-item-3968" class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-3968"><a href="{{route('expired-service-list')}}" class="dropdown-item "><i class="_mi _before fa fa-angle-right" aria-hidden="true"></i><span>Services Expired</span></a></li>
                    </ul>
                </li>
                <li id="menu-item-2343" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown nav-item nav-item-2343">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="_mi _before fas fa-chart-pie" aria-hidden="true"></i><span>Finances</span></a>
                    <ul class="dropdown-menu depth_0">
                        <li id="menu-item-5096" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5096"><a href="{{ route('invoice-history') }}" class="dropdown-item ">Invoice History</a></li>
                        <li id="menu-item-5099" class="menu-item menu-item-type-post_type menu-item-object-page nav-item nav-item-5099"><a href="{{ route('payment-history') }}" class="dropdown-item ">Payment History</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
