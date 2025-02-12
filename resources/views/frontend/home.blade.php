<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    @include('frontend.main.home.meta')
</head>

<body>
    <div class="page-wrapper pbmit-bg-color-light">
        @include('frontend.main.home.navbar')
        @include('frontend.sections.home.content')
        @include('frontend.main.home.footer')
    </div>
    @include('frontend.main.home.scripts')
</body>

</html>
