<!-- Profile Sidebar -->
<div class="col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar patient-sidebar profile-sidebar-new">
        <!-- Profile Info and Navigation -->
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="{{ route('patient.profile-settings') }}" class="booking-doc-img">
                    <img src="{{ asset('patient-assets\img\download.png') }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3><a href="{{ route('patient.profile-settings') }}">{{ Auth::guard('patient')->user()->name }}</a>
                    </h3>
                    <span>
                        {{ ucfirst(Auth::guard('patient')->user()->gender) }}
                        <i class="fa-solid fa-circle"></i>
                        {{ \Carbon\Carbon::parse(Auth::guard('patient')->user()->birthday)->format('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="{{ request()->is('patient/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fa-solid fa-shapes"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('patient/my-appointments') ? 'active' : '' }}">
                        <a href="{{ route('patient.my-appointments') }}">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('patient/my-invoices') ? 'active' : '' }}">
                        <a href="{{ route('patient.my-invoices') }}">
                            <i class="fa-solid fa-file-lines"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('patient/medical-records') ? 'active' : '' }}">
                        <a href="{{ route('patient.medical-records') }}">
                            <i class="fa-solid fa-money-bill-1"></i>
                            <span>Medications Details</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('profile-settings') ? 'active' : '' }}">
                        <a href="{{ route('patient.profile-settings') }}">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('change/password') ? 'active' : '' }}">
                        <a href="{{ route('patient.change-password') }}">
                            <i class="fa-solid fa-key"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- / Profile Sidebar -->
