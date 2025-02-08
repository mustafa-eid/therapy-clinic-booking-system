<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    @include('frontend.main.dashboard-patient.meta')
</head>

<body>

    @include('frontend.main.dashboard-patient.navbar')

    <div class="content">
        <div class="container">
            <div class="row">
                @include('frontend.main.dashboard-patient.sidebar')

                @include('frontend.sections.change-password.content')
            </div>
        </div>
    </div>

    @include('frontend.main.dashboard-patient.scripts')
</body>

</html>
