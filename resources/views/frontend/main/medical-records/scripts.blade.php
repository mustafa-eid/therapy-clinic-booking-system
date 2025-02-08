<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>
<script src="{{ asset('assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/invoice-list.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- Prism.js plugin -->
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>

<!-- Grid.js plugin -->
<script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>
<!-- Grid.js init -->
<script src="{{ asset('assets/js/pages/gridjs.init.js') }}"></script>

<!-- ApexCharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map -->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- Swiper slider -->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- List.js -->
<script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- Calendar min js -->
<script src="{{ asset('assets/libs/fullcalendar/index.global.min.js') }}"></script>

<!-- Calendar init -->
<script src="{{ asset('assets/js/pages/calendar.init.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- Prism.js plugin -->
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>

<!-- Grid.js plugin -->
<script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>
<!-- Grid.js init -->
<script src="{{ asset('assets/js/pages/gridjs.init.js') }}"></script>

<!-- ApexCharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map -->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- Swiper slider -->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- List.js -->
<script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Echarts -->
<script src="{{ asset('assets/libs/echarts/echarts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<script src="{{ asset('assets/libs/list.js/list.min.js') }}"></script>

<!-- dashboard-analytics init js -->
<script src="{{ asset('assets/js/pages/dashboard-analytics.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>


<script>
    function confirmDelete(recordId) {
        if (confirm("Are you sure you want to delete this medical record?")) {
            // Create a form to send the id as a POST request
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('medical_records.delete') }}";

            // Add the CSRF token and the record ID to the form
            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = '{{ csrf_token() }}';
            form.appendChild(tokenInput);

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = recordId;
            form.appendChild(idInput);

            // Append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Edit button click event listener
        const editButtons = document.querySelectorAll(
            '[data-bs-toggle="modal"][data-bs-target="#edit_medical_record"]');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.getElementById(
                    'edit_medical_record'));
                // Get data attributes
                const recordId = this.getAttribute('data-id');
                const medicationName = this.getAttribute('data-medication-name');
                const startDate = this.getAttribute('data-start-date');
                const endDate = this.getAttribute('data-end-date');
                const quantity = this.getAttribute('data-quantity');
                const frequency = this.getAttribute('data-frequency');
                const repetitionOfDay = this.getAttribute('data-repetition-of-day');
                const notes = this.getAttribute('data-notes');
                const dose = this.getAttribute('data-dose');
                // Set the modal form values
                document.getElementById('edit-id').value = recordId;
                document.getElementById('edit-medication-name').value = medicationName;
                document.getElementById('edit-start-date').value = startDate;
                document.getElementById('edit-end-date').value = endDate;
                document.getElementById('edit-quantity').value = quantity;
                document.getElementById('edit-frequency').value = frequency;
                document.getElementById('edit-repetitionOfDay').value = repetitionOfDay;
                document.getElementById('edit-notes').value = notes;
                document.getElementById('edit-dose').value = dose;

                // Show the modal
                modal.show();
            });
        });
    });

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll('#medical-record-list-data tr');
        var found = false;

        rows.forEach(function(row) {
            var columns = row.querySelectorAll('td');
            var match = false;

            columns.forEach(function(col) {
                if (col.textContent.toLowerCase().includes(searchValue)) {
                    match = true;
                }
            });

            if (match) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });

        // Show or hide 'No results found' message based on search results
        var noResultsMessage = document.getElementById('no-results-message');
        if (found) {
            if (noResultsMessage) {
                noResultsMessage.style.display = 'none';
            }
        } else {
            if (!noResultsMessage) {
                var alertDiv = document.createElement('div');
                alertDiv.id = 'no-results-message';
                alertDiv.className = 'alert alert-info text-center';
                alertDiv.textContent = 'No records found.';
                document.querySelector('.table-responsive').appendChild(alertDiv);
            }
        }
    });

    function sortTable(columnIndex) {
        const table = document.querySelector('table');
        const rows = Array.from(table.querySelectorAll('tr:nth-child(n+2)')); // Skip the header row
        const isAscending = table.querySelector(`th:nth-child(${columnIndex + 1})`).classList.contains('ascending');

        // Sort rows
        rows.sort((rowA, rowB) => {
            const cellA = rowA.cells[columnIndex].textContent.trim();
            const cellB = rowB.cells[columnIndex].textContent.trim();

            // Convert values to numbers if possible
            const numA = parseFloat(cellA);
            const numB = parseFloat(cellB);

            // Handle numeric and string sorting
            if (!isNaN(numA) && !isNaN(numB)) {
                return isAscending ? numA - numB : numB - numA;
            } else {
                return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
            }
        });

        // Append the sorted rows back to the table body
        const tbody = table.querySelector('tbody');
        rows.forEach(row => tbody.appendChild(row));

        // Toggle sort direction class
        const headerCell = table.querySelector(`th:nth-child(${columnIndex + 1})`);
        headerCell.classList.toggle('ascending', !isAscending);
        headerCell.classList.toggle('descending', isAscending);

        // Remove sort classes from all other header cells
        Array.from(table.querySelectorAll('th')).forEach((th, index) => {
            if (index !== columnIndex) {
                th.classList.remove('ascending', 'descending');
            }
        });
    }
</script>
