<header class="site-header header-style-13">
    <div class="site-header-menu">
        <div class="pbmit-main-header-area">
            <div class="container-fluid">
                <div class="pbmit-header-content d-flex justify-content-between align-items-center">
                    <div class="pbmit-menu-logoarea d-flex justify-content-between align-items-center">
                        <div class="site-branding ">
                            <h1 class="site-title ">
                                <a href="/">
                                    <img class="logo-img py-2" src="https://clinic.kenooz.co/website-assets/logo.png"
                                        alt="logo" style="max-height: 95px!important;">
                                </a>
                            </h1>
                        </div>
                        <div class="site-navigation">
                            <nav class="main-menu navbar-expand-xl navbar-light">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button">
                                        <i class="pbmit-base-icon-menu-1"></i>
                                    </button>
                                </div>
                                <div class="pbmit-mobile-menu-bg"></div>
                                <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                    <div class="pbmit-menu-wrap">
                                        <span class="closepanel">
                                            <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg"
                                                width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                                                <rect width="36" height="1"
                                                    transform="translate(0.707) rotate(45)"></rect>
                                                <rect width="36" height="1"
                                                    transform="translate(0 25.456) rotate(-45)"></rect>
                                            </svg>
                                        </span>
                                        <ul class="navigation clearfix">
                                            <li class="dropdown active"><a href="/">Home</a></li>
                                            <li class="dropdown"><a href="/">About Us</a></li>
                                            <li class="dropdown"><a href="/">Faq</a></li>
                                            <li class="dropdown"><a href="/">Blog</a></li>
                                            <li class="dropdown"><a href="/">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="pbmit-right-box d-flex align-items-center">
                        <div class="pbmit-button-box-second">
                            <a class="pbmit-btn pbmit-btn-hover-global d-flex align-items-center"
                                href="https://clinic.kenooz.co/choose-clinic">
                                <i class="fas fa-calendar-check me-2"></i>
                                <span class="pbmit-button-text">Make An Appointment</span>
                            </a>
                        </div>
                        <div class="pbmit-button-box-second px-2">
                            @if (auth('patient')->check())
                                <div class="dropdown">
                                    <a class="pbmit-btn pbmit-btn-hover-global d-flex align-items-center "
                                        href="#" role="button" id="patientDropdown" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-user me-2"></i>
                                        <span class="pbmit-button-text">{{ auth('patient')->user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="patientDropdown">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('patient.dashboard') }}">
                                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('patient.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <a class="pbmit-btn pbmit-btn-hover-global d-flex align-items-center"
                                    href="{{ route('patient.login') }}">
                                    <i class="fas fa-sign-in-alt me-2"></i>
                                    <span class="pbmit-button-text">Login</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-slider-area pbmit-slider-four">
        <div class="swiper-slider" data-autoplay="false" data-loop="false" data-dots="false" data-arrows="false"
            data-columns="1" data-margin="0" data-effect="fade">
            <div class="swiper-wrapper">
                <!-- Slide1 -->
                <div class="swiper-slide">
                    <div class="item">
                        <div class="pbmit-slider-item">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class=" col-md-12 col-lg-8">
                                        <div class="pbmit-slider-content" style="padding-top:150px!important;">
                                            <h5 class="pbmit-sub-title transform-center-1 transform-delay-1">
                                                Welcome to Habiby Clinic</h5>
                                            <h2 class="pbmit-title transform-left transform-delay-2"
                                                style="font-size:45px;line-height: 55px;">Dedicated to your
                                                mental well-being through personalized, expert care.</h2>
                                            <p class="pbmit-desc transform-left transform-delay-2 fs-4">Dr.
                                                Mahmoud el Habiby is a board-certified psychiatrist with over 25
                                                years of experience. He combines the latest in psychiatric
                                                research with a compassionate, patient-focused approach. His
                                                commitment to understanding each patient’s unique story makes
                                                him a trusted partner in your mental health journey.</p>
                                            <div class="pbmit-button">
                                                <div class="pbmit-btn-box">
                                                    <a class="pbmit-btn me-3 transform-right transform-delay-4 d-flex align-items-center text-decoration-none"
                                                        href="https://clinic.kenooz.co/choose-clinic">
                                                        <i class="fas fa-calendar-check me-2 fs-6"></i>
                                                        <span class="pbmit-button-text">Book Appointment</span>
                                                    </a>
                                                </div>
                                                <div class="pbmit-btn-box">
                                                    <a href="https://www.youtube.com/watch?v=1YYW8YcTqfE"
                                                        class="pbmin-lightbox-video lightbox-video-btn transform-left transform-delay-3 d-flex align-items-center">
                                                        <span>
                                                            <i class="fas fa-play-circle fs-6 me-2"></i>
                                                        </span>
                                                        <u>Watch our video</u>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-8 col-lg-4 col-xl-3 mx-auto">
                                        <div class="banner-image">
                                            <img src="{{ asset('assets/images/mobile-1.png') }}" alt=""
                                                style=" max-width:100%;">
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
</header>
