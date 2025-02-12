<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg" data-preloader="disable"
    data-theme="minimal" data-topbar="light" data-bs-theme="light" data-layout-width="fluid" data-sidebar-image="none"
    data-layout-position="fixed" data-layout-style="default">

<head>
    @include('frontend.main.roles-and-permissions.meta')
</head>

<body>
    <div class="main-wrapper">
        @include('frontend.main.doctor-dashboard.navbar')

        @include('frontend.main.doctor-dashboard.sidebar')
        <!-- Start right Content here -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="card-body">
                        <a href="{{ URL('cPanel/create-roles') }}"
                            class="text-primary text-decoration-none d-inline-flex align-items-center gap-1"
                            style="white-space: nowrap; font-size: 14px; font-weight: 500;">
                            <i class="ph-plus"></i> {{ __('Create a new role') }}
                        </a>
                        <table class="table" width="100%">
                            <tr>
                                <td width="50%">{{ __('Name') }}</td>
                                <td width="50%" class="text-center">{{ __('Actions') }}</td>
                            </tr>
                            @foreach ($roles as $role)
                                <tr>
                                    <td width="50%">{{ $role->name }}</td>
                                    <td width="50%" class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-1"
                                            style="width: 50%; margin: auto;">
                                            <a href="{{ URL('cPanel/edit-role') }}/{{ $role->id }}"
                                                class="btn btn-subtle-secondary btn-icon btn-sm">
                                                <i class="ph-pencil"></i>
                                            </a>
                                            <form action="{{ URL('cPanel/delete-role') }}/{{ $role->id }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this role?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn">
                                                    <i class="ph-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div><!-- container-fluid -->
            </div><!-- End Page-content -->
        </div><!-- end main content-->
    </div>
    @include('frontend.main.roles-and-permissions.scripts')
</body>

</html>
