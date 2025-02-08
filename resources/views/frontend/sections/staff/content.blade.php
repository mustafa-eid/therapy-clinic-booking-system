<!-- Start right Content here -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Success and Error Messages -->
            @include('frontend.sections.messages.content')
            <!-- Invoice List Table -->
            <div class="row" id="invoiceList">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center g-2">
                                <div class="col-lg-3 me-auto">
                                    <h6 class="card-title mb-0">Team Members List</h6>
                                </div><!--end col-->
                                <div class="col-xl-2 col-md-3">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for team members, date, client or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-auto">
                                    <div class="hstack gap-2">
                                        <button class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#addInvoiceModal">
                                            <i class="bi bi-plus-circle align-baseline me-1"></i> Add a team member
                                        </button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                        <div class="card-body mt-3">
                            <div class="table-responsive table-card">
                                <table class="table table-centered align-middle table-custom-effect table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="invoice_id"
                                                onclick="sortTable(0)">ID</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="customer_name"
                                                onclick="sortTable(1)">Name</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="email"
                                                onclick="sortTable(2)">Email</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="email"
                                                onclick="sortTable(2)">Role</th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="create_date"
                                                onclick="sortTable(3)">Joined at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all" id="user-list-data">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child"
                                                            value="{{ $user->id }}">
                                                        <label class="form-check-label"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <ul class="d-flex gap-2 list-unstyled mb-0">
                                                        <li>
                                                            <!-- Delete Button -->
                                                            <form action="{{ route('staff.destroy', $user->id) }}" method="POST" style="display: inline;"
                                                                onsubmit="return confirm('Are you sure you want to delete this ?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                                <button type="submit" class="btn btn-subtle-danger btn-icon btn-sm remove-item-btn">
                                                                    <i class="ph-trash"></i>
                                                                </button>
                                                            </form>
                                                
                                                            <!-- Edit Button -->
                                                            <button type="button" class="btn btn-subtle-secondary btn-icon btn-sm edit-user-btn" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editUserModal"
                                                                data-id="{{ $user->id }}"
                                                                data-name="{{ $user->name }}"
                                                                data-email="{{ $user->email }}"
                                                                data-role="{{ $user->role }}">
                                                                <i class="ph-pencil"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table><!-- end table -->
                                <div class="noresult" style="display: none">
                                    <div class="text-center py-4">
                                        <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 6+ invoice We did not find
                                            any invoice for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination Links -->
                            <div class="row align-items-center mt-4 pt-3" id="pagination-element">
                                <div class="col-sm">
                                    <div class="text-muted text-center text-sm-start">
                                        Showing <span class="fw-semibold">{{ $users->firstItem() }}</span> of <span
                                            class="fw-semibold">{{ $users->total() }}</span> Results
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-auto mt-3 mt-sm-0">
                                    <div class="pagination-wrap hstack justify-content-center gap-2">
                                        <!-- Previous Button -->
                                        <a class="page-item pagination-prev {{ $users->onFirstPage() ? 'disabled' : '' }}"
                                            href="{{ $users->previousPageUrl() }}">
                                            Previous
                                        </a>
                                        <!-- Pagination Links -->
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!-- Next Button -->
                                        <a class="page-item pagination-next {{ $users->hasMorePages() ? '' : 'disabled' }}"
                                            href="{{ $users->nextPageUrl() }}">
                                            Next
                                        </a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
</div><!-- end main content-->

<!-- Add Invoice Modal -->
<div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvoiceModalLabel">Add New users Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('staff.register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Role Selection -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select id="role" name="role" class="form-select" required>
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="assistant">Assistant</option>
                        </select>
                        @error('role')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" required>
                        @error('password_confirmation')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('staff.update') }}">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="edit_user_id" name="id">

                    <!-- Name (Read-Only) -->
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" id="edit_name" name="name" class="form-control" readonly>
                    </div>

                    <!-- Email (Read-Only) -->
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" id="edit_email" name="email" class="form-control" readonly>
                    </div>

                    <!-- Role Selection -->
                    <div class="mb-3">
                        <label for="edit_role" class="form-label">Role</label>
                        <select id="edit_role" name="role" class="form-select" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="assistant">Assistant</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let editButtons = document.querySelectorAll(".edit-user-btn");

        editButtons.forEach(button => {
            button.addEventListener("click", function () {
                let userId = this.getAttribute("data-id");
                let userName = this.getAttribute("data-name");
                let userEmail = this.getAttribute("data-email");
                let userRole = this.getAttribute("data-role");

                document.getElementById("edit_user_id").value = userId;
                document.getElementById("edit_name").value = userName;
                document.getElementById("edit_email").value = userEmail;
                document.getElementById("edit_role").value = userRole;
            });
        });
    });
</script>
