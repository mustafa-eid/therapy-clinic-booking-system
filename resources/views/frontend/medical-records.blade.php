<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-preloader="disable"
    data-theme="minimal" data-topbar="light" data-bs-theme="light" data-layout-width="fluid" data-sidebar-image="none"
    data-layout-position="fixed" data-layout-style="default">

<head>
    @include('frontend.main.my-patients.meta')
</head>

<body>
    <div class="main-wrapper">
        @include('frontend.main.doctor-dashboard.navbar')

        @include('frontend.main.doctor-dashboard.sidebar')

        @include('frontend.sections.medical-records.content')
    </div>
    @include('frontend.main.medical-records.scripts')
</body>

</html>
