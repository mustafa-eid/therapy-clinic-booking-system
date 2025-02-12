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
                    <div class="card">
                        <div class="card-header">
                            <h1>{{ __('Create New Role') }}</h1>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ URL('cPanel/update-role') }}">
                                @csrf
                                <input type="text" id="id" name="id" value="{{ $role->id }}" readonly
                                    required hidden />
                                <label for="name">{{ __('Role Name') }}</label>
                                <input type="text" required name="name" class="form-control"
                                    value="{{ $role->name }}" />


                                <div class="row">
                                    <div class="col-md-6">
                                        <h1>{{ __('Permissions') }}</h1>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Name') }}</th>
                                                    <th>{{ __('Permission') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($permissions as $permission)
                                                    <tr>
                                                        <td>{{ $permission->name }}</td>
                                                        <td class="styled-checkbox">
                                                            <input type="checkbox" value="{{ $permission->name }}"
                                                                name="permission[]"
                                                                id="permission_{{ $permission->id }}"
                                                                @if ($role->permissions->contains('id', $permission->id)) checked @endif />
                                                            <label class="checkmark"
                                                                for="permission_{{ $permission->id }}"></label>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-6">
                                        <h1>{{ __('Users') }}</h1>
                                        <label for="users">{{ __('Users') }}</label>
                                        <select class="form-control" name="users[]" id="users" multiple>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($role->users->contains('id', $user->id)) selected @endif>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-success" value="{{ __('Save') }}" />
                            </form>
                        </div>
                    </div>
                </div><!-- container-fluid -->
            </div><!-- End Page-content -->
        </div><!-- end main content-->
    </div>
    @include('frontend.main.roles-and-permissions.scripts')
</body>

</html>
