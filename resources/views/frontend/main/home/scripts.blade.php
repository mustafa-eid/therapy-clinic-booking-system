<!-- jQuery -->
<script src="{{ asset('patient-assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('patient-assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

<!-- Daterangepicker JS -->
<script src="{{ asset('patient-assets/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('patient-assets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<!-- Custom JS -->
<script src="{{ asset('patient-assets/js/script.js') }}" type="text/javascript"></script>

<!-- Cloudflare Rocket Loader -->
<script src="{{ asset('patient-assets/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
    data-cf-settings="7b459e1560d0a626dea0d18f-|49" defer></script>


<script>
    // Set the current month dynamically
    document.addEventListener('DOMContentLoaded', function() {
        const currentMonth = new Date().toLocaleString('default', {
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('currentMonth').textContent = currentMonth;

        const today = new Date().toISOString().split('T')[0]; // Today's date in 'YYYY-MM-DD' format

        // Filter out past days
        document.querySelectorAll('.day-card').forEach(function(dayCard) {
            const dayDate = dayCard.getAttribute('data-date');
            if (dayDate < today) {
                dayCard.style.display = 'none'; // Hide past days
            } else if (dayDate === today) {
                dayCard.classList.add('selected'); // Highlight today
                selectDay(dayCard); // Display today's available timeslot
            }
        });
    });

    function selectDay(element) {
        // Deselect all day cards
        document.querySelectorAll('.day-card').forEach(function(dayCard) {
            dayCard.classList.remove('selected');
        });

        // Select the clicked day
        element.classList.add('selected');
        var selectedDate = element.getAttribute('data-date');

        if (selectedDate) {
            var dateObj = new Date(selectedDate);
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = dateObj.toLocaleDateString('en-GB', options);
            var dayName = dateObj.toLocaleString('en-GB', {
                weekday: 'long'
            });

            document.getElementById('selectedDay').innerHTML = ` 
                    <div class="col-12 col-sm-4 col-md-6">
                        <h4 class="mb-1">${formattedDate}</h4>
                        <p class="text-muted">${dayName}</p>
                    </div>
                `;
        }

        // Hide all time slot groups
        document.querySelectorAll('.time-slot-group').forEach(function(slotGroup) {
            slotGroup.style.display = 'none';
        });

        // Show the time slot group for the selected day
        var selectedSlotGroup = document.querySelector('.time-slots-' + selectedDate);
        if (selectedSlotGroup) {
            selectedSlotGroup.style.display = 'block';
        } else {
            alert("No time slots available for the selected day.");
        }
    }

    function selectTimeSlot(element, slotId, slotTime) {
        document.querySelectorAll('.timing').forEach(function(slot) {
            slot.classList.remove('selected');
        });
        element.classList.add('selected');

        document.getElementById('proceedToPayBtn').innerText = 'Proceed to Pay';
        document.getElementById('selectedSlotId').value = slotId;
        document.getElementById('selectedSlotTime').value = slotTime;
    }

    function submitBooking() {
        var slotId = document.getElementById('selectedSlotId').value;
        var selectedDate = document.getElementById('daySelectorContainer').querySelector('.selected')?.getAttribute(
            'data-date');

        if (!selectedDate) {
            alert('Please select a day.');
        } else if (!slotId) {
            alert('Please select a time slot.');
        } else {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('patient.book-tim-slot', '') }}/" + slotId;
            form.innerHTML = '@csrf';
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
