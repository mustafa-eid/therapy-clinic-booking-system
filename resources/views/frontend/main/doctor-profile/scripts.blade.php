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

<script>
    var searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        var searchValue = searchInput.value.toLowerCase();
        var rows = document.querySelectorAll("#invoice-list-data tr");
        var found = false;

        rows.forEach(function(row) {
            var columns = row.querySelectorAll("td");
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
        if (found) {
            document.getElementsByClassName("noresult")[0].style.display = 'none';
        } else {
            document.getElementsByClassName("noresult")[0].style.display = 'block';
        }
    });

    function sortTable(columnIndex) {
        var table = document.querySelector("table");
        var rows = Array.from(table.querySelectorAll("tbody tr"));
        var isNumeric = columnIndex === 5 || columnIndex === 4;
        var ascending = true;

        // Toggle sorting order between ascending and descending
        if (table.classList.contains("ascending")) {
            ascending = false;
            table.classList.remove("ascending");
            table.classList.add("descending");
        } else {
            table.classList.remove("descending");
            table.classList.add("ascending");
        }

        // Sort rows based on the column clicked
        rows.sort(function(a, b) {
            var aText = a.cells[columnIndex].textContent.trim();
            var bText = b.cells[columnIndex].textContent.trim();

            // Handle numeric or date sorting
            if (isNumeric) {
                aText = parseFloat(aText.replace('$', '').replace(',', '').trim());
                bText = parseFloat(bText.replace('$', '').replace(',', '').trim());
            } else if (columnIndex === 3 || columnIndex === 4) {
                aText = new Date(aText);
                bText = new Date(bText);
            }

            if (ascending) {
                return aText > bText ? 1 : -1;
            } else {
                return aText < bText ? 1 : -1;
            }
        });

        // Reorder rows in the table
        rows.forEach(function(row) {
            table.querySelector("tbody").appendChild(row);
        });
    }
</script>


<script>
    function EditInvoice(button) {
        var invoiceId = button.getAttribute('data-edit-id');
        var customerName = button.getAttribute('data-customer-name');
        var email = button.getAttribute('data-email');
        var amount = parseFloat(button.getAttribute('data-amount')).toFixed(2);
        var status = button.getAttribute('data-status');
        var createdAt = button.getAttribute('data-created-at');

        // Set form values
        document.getElementById('invoice-id').value = invoiceId;
        document.getElementById('invoice-customer-name').value = customerName;
        document.getElementById('invoice-email').value = email;
        document.getElementById('invoice-amount').value = amount;
        document.getElementById('invoice-status').value = status;
        document.getElementById('invoice-created-at').value = createdAt;

        // Update the form action dynamically
        var formAction = "{{ route('invoices.update', ':invoice_id') }}";
        formAction = formAction.replace(':invoice_id', invoiceId);
        document.getElementById('editInvoiceForm').action = formAction;

        // Show modal
        var modal = new bootstrap.Modal(document.getElementById('editInvoiceModal'));
        modal.show();
    }
</script>
