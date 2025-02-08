<!-- Header -->
<header class="header header-trans header-three header-eight">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('home') }}" class="navbar-brand logo">
                    <img src="{{ asset('patient-assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home') }}" class="menu-logo">
                        <img src="{{ asset('patient-assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>

                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="active">
                        <p><a class="link-offset-2 link-underline link-underline-opacity-0"
                                href="{{ route('home') }}">Home</a>
                        </p>
                    </li>
                    <li>
                        <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="#about-us">About
                                Us</a></p>
                    </li>
                    <li>
                        <p><a class="link-offset-2 link-underline link-underline-opacity-0" href="#contact-us">Contact
                                Us</a></p>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                @if (Auth::guard('patient')->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link header-login dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('patient-assets/img/icons/user-circle.svg') }}" alt="img">
                            {{ Auth::guard('patient')->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form action="{{ route('patient.dashboard') }}" method="post">
                                @csrf
                                @method('GET')
                                <button type="submit" class="dropdown-item"
                                    style="background: none; border: none; padding: 0;">
                                    Dashboard
                                </button>
                            </form>
                            <form action="{{ route('patient.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"
                                    style="background: none; border: none; padding: 0;">
                                    Logout
                                </button>
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{ route('patient.login') }}">
                            <img src="{{ asset('patient-assets/img/icons/user-circle.svg') }}" alt="img"> Login
                            <a class="nav-link header-login" href="{{ route('patient.register') }}">
                                <img src="{{ asset('patient-assets/img/icons/user-circle.svg') }}" alt="img"> Sign
                                up
                            </a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
<!-- /Header -->
