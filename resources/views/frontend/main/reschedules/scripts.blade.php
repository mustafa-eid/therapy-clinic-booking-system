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
    // Search functionality
    var searchInput = document.querySelector('.search');
    searchInput.addEventListener('input', function() {
        var searchValue = searchInput.value.toLowerCase();
        var rows = document.querySelectorAll("#invoice-list-data tr");
        var found = false;

        rows.forEach(function(row) {
            var columns = row.querySelectorAll("td");
            var match = false;

            // Check if any column in the row contains the search value
            columns.forEach(function(col, index) {
                var colText = col.textContent.trim().toLowerCase();

                // Handle date columns (like Reschedule Date)
                if (index ===
                    4) { // Adjust this index if necessary (Reschedule Date column index is 4)
                    var formattedDate = colText.replace(/[a-zA-Z]/g, '').trim();
                    if (formattedDate.toLowerCase().includes(searchValue)) {
                        match = true;
                    }
                } else if (colText.includes(searchValue)) {
                    match = true;
                }
            });

            // Show or hide the row based on whether it matched the search
            if (match) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });

        // Show or hide 'No result found' message based on search results
        if (found) {
            document.getElementsByClassName("noresult")[0].style.display = 'none';
        } else {
            document.getElementsByClassName("noresult")[0].style.display = 'block';
        }
    });

    // Sorting functionality
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
