<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    @include('frontend.main.my-patients.meta')
</head>

<body>
    <div class="main-wrapper">
        @include('frontend.main.doctor-dashboard.navbar')

        @include('frontend.main.doctor-dashboard.sidebar')

        {{-- @include('frontend.sections.invoices.content') --}}
    </div>
</body>

</html>
