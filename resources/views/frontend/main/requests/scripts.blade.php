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
