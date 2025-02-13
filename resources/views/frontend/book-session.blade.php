<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    @include('frontend.main.book-session.meta')
</head>

<body>
    <div class="page-wrapper pbmit-bg-color-light">
        @include('frontend.main.home.navbar')
        @include('frontend.sections.book-session.content')
        @include('frontend.main.home.footer')
    </div>
    @include('frontend.main.book-session.scripts')
</body>

</html>
