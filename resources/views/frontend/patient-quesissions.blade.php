<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="lg" data-preloader="disable"
    data-theme="default" data-topbar="light" data-bs-theme="light">

<head>
    @include('frontend.main.home.meta')
    @livewireStyles
</head>

<body>
    <div class="main-wrapper">

        @include('frontend.main.home.navbar')

        <div>
            @livewire('patient-quesissions')
        </div>

        @include('frontend.main.home.footer')
    </div>
    @include('frontend.main.home.scripts')
    @livewireScripts
</body>

</html>
