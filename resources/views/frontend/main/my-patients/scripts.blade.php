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
            columns.forEach(function(col, index) {
                var colText = col.textContent.trim().toLowerCase();
                if (index ===
                    4) {
                    var formattedDate = colText.replace(/[a-zA-Z]/g, '').trim();
                    if (formattedDate.toLowerCase().includes(searchValue)) {
                        match = true;
                    }
                } else if (colText.includes(searchValue)) {
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

        if (table.classList.contains("ascending")) {
            ascending = false;
            table.classList.remove("ascending");
            table.classList.add("descending");
        } else {
            table.classList.remove("descending");
            table.classList.add("ascending");
        }

        rows.sort(function(a, b) {
            var aText = a.cells[columnIndex].textContent.trim();
            var bText = b.cells[columnIndex].textContent.trim();
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
        rows.forEach(function(row) {
            table.querySelector("tbody").appendChild(row);
        });
    }
</script>

<script>
    let selectedPatientId = null;

    function loadPatientData(patient) {
        selectedPatientId = patient.id;
        document.getElementById("offcanvasRightLabel").textContent = patient.name || "Patient Name";
        document.getElementById("patientIdDisplay").textContent = `Patient ID: ${selectedPatientId}`;
        document.getElementById("patientIdContainer").style.display = "block";
        document.getElementById("modalPatientId").value = selectedPatientId;
        loadPatientNotes(selectedPatientId);
    }

    function loadPatientNotes(patientId) {
        const savedNotes = JSON.parse(localStorage.getItem(`notes_${patientId}`)) || [];
        const notesList = document.getElementById('notesList');
        notesList.innerHTML = ''; // Clear existing notes

        savedNotes.forEach(note => {
            addNoteToList(note);
        });
    }

    function addNoteToList(noteText) {
        const li = document.createElement('li');
        li.classList.add('list-group-item');
        li.textContent = noteText;

        const deleteBtn = document.createElement('button');
        deleteBtn.classList.add('btn', 'btn-sm', 'rounded-pill', 'btn-danger', 'ms-2');
        deleteBtn.textContent = 'Delete';

        deleteBtn.addEventListener('click', function() {
            const isConfirmed = confirm('Are you sure you want to delete this note?');
            if (isConfirmed) {
                li.remove();
                saveNotesToLocalStorage(selectedPatientId);
            }
        });

        li.appendChild(deleteBtn);
        document.getElementById('notesList').appendChild(li);
    }

    function saveNotesToLocalStorage(patientId) {
        const notes = Array.from(document.getElementById('notesList').children).map(li => li.textContent.replace(
            'Delete', '').trim());
        localStorage.setItem(`notes_${patientId}`, JSON.stringify(notes));
    }

    document.getElementById('showNoteInputBtn').addEventListener('click', function() {
        document.getElementById('noteInputContainer').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('addNoteBtn').addEventListener('click', function() {
        const noteText = document.getElementById('noteInput').value.trim();
        if (noteText) {
            addNoteToList(noteText);
            saveNotesToLocalStorage(selectedPatientId);
            document.getElementById('noteInput').value = '';
            document.getElementById('noteInputContainer').style.display = 'none';
            document.getElementById('showNoteInputBtn').style.display = 'block';
        } else {
            alert("Please enter a note.");
        }
    });

    document.getElementById('cancelNoteBtn').addEventListener('click', function() {
        document.getElementById('noteInput').value = '';
        document.getElementById('noteInputContainer').style.display = 'none';
        document.getElementById('showNoteInputBtn').style.display = 'block';
    });

    $('#offcanvasRight').on('show.bs.offcanvas', function() {
        if (selectedPatientId) {
            loadPatientNotes(selectedPatientId);
        }
    });

    function openMedicationsModal() {
        const modalBody = document.querySelector("#medicationsModal .modal-body");
        modalBody.innerHTML = `<p>Medication details for Patient ID: ${selectedPatientId}</p>`;
    }

    document.getElementById("addMedicationsBtn").addEventListener("click", function() {
        openMedicationsModal();
    });

    function addMedicationToList(medicationText) {
        const medicationList = document.getElementById("medicationsList");
        const li = document.createElement("li");
        li.classList.add("list-group-item");
        li.textContent = medicationText;

        const deleteBtn = document.createElement("button");
        deleteBtn.classList.add("btn", "btn-sm", "rounded-pill", "btn-danger", "ms-2");
        deleteBtn.textContent = "Delete";
        deleteBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this medication?')) {
                li.remove();
                saveMedicationsToLocalStorage(selectedPatientId);
            }
        });

        li.appendChild(deleteBtn);
        medicationList.appendChild(li);
    }

    function saveMedicationsToLocalStorage(patientId) {
        const medications = Array.from(document.getElementById('medicationsList').children).map(li => li.textContent
            .replace('Delete', '').trim());
        localStorage.setItem(`medications_${patientId}`, JSON.stringify(medications));
    }

    function loadMedicationsFromLocalStorage(patientId) {
        const savedMedications = JSON.parse(localStorage.getItem(`medications_${patientId}`)) || [];
        const medicationsList = document.getElementById('medicationsList');
        medicationsList.innerHTML = '';

        savedMedications.forEach(medication => {
            addMedicationToList(medication);
        });
    }

    $('#medicationsModal').on('hidden.bs.modal', function() {
        loadMedicationsFromLocalStorage(selectedPatientId);
    });

    function filterMedications() {
        const searchInput = document.getElementById("medicationSearch").value.toLowerCase();
        const medicationSelect = document.getElementById("medicationSelect");
        const noMedicationsMessage = document.getElementById("noMedicationsMessage");
        let hasVisibleOptions = false;

        Array.from(medicationSelect.options).forEach(option => {
            const medicationText = option.text.toLowerCase();
            if (medicationText.includes(searchInput)) {
                option.style.display = "block";
                hasVisibleOptions = true;
            } else {
                option.style.display = "none";
            }
        });

        noMedicationsMessage.style.display = hasVisibleOptions ? "none" : "block";
    }
</script>
