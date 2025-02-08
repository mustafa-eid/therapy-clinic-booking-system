<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" height="40">
            </span>
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar" data-simplebar="init" class="h-100 simplebar-scrollable-y">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <div class="container-fluid">
                                <div id="two-column-menu">
                                </div>
                                <ul class="navbar-nav" id="navbar-nav" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="{{ route('dashboard') }}">
                                                                <i class="ph-gauge"></i>
                                                                <span>Dashboard</span>
                                                            </a>
                                                        </li>

                                                        @can('Profile')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                                                    <i class="ph-user"></i>
                                                                    <span>Profile</span>
                                                                </a>
                                                            </li>
                                                        @endcan

                                                        @can('My Patients')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('my-patients') }}">
                                                                    <i class="ph-users"></i>
                                                                    <span>My Patients</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Available Timings')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('available-timings') }}">
                                                                    <i class="ph-clock"></i>
                                                                    <span>Available Timings</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Bookings')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('requests') }}">
                                                                    <i class="ph-list"></i>
                                                                    <span>Bookings</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Invoices')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('invoices') }}">
                                                                    <i class="ph-file-text"></i>
                                                                    <span>Invoices</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Medications')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('medical-records') }}">
                                                                    <i class="ph-folder"></i>
                                                                    <span>Medications</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Reschedules')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('reschedules') }}">
                                                                    <i class="ph-calendar"></i>
                                                                    <span>Reschedules</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Payments')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('payments') }}">
                                                                    <i class="ph-credit-card"></i>
                                                                    <span>Payments</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Staff Show')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ route('staff') }}">
                                                                    <i class="ph-users"></i>
                                                                    <span>Team Members</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('Show Roles And Permmonsins')
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="{{ URL('show-roles') }}">
                                                                    <i class="ph-shield-check"></i>
                                                                    <span>{{ __('Roles And Permissions') }}</span>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 249px; height: 1498px;">
                                        </div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar"
                                            style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);">
                                        </div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal">
                                        <div class="simplebar-scrollbar"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical">
                                        <div class="simplebar-scrollbar"></div>
                                    </div>
                                </ul>
                            </div>
                            <!-- Sidebar -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 249px; height: 1498px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar"
                style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 175px; transform: translate3d(0px, 168px, 0px); display: block;"></div>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
