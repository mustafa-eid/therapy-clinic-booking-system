<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Success and Error Messages -->
            @include('frontend.sections.messages.content')
            <div class="col-lg-12">
                <div class="mt-3">
                    <!-- Date Picker Input -->
                    <input type="text" class="form-control flatpickr-input" data-provider="flatpickr"
                        data-date-format="d M, Y" data-inline-date="true" readonly="readonly">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Selected Date -->
<div class="modal fade" id="dateModal" tabindex="-1" aria-labelledby="dateModalLabel" aria-hidden="true">
    <form action="{{ route('storeAvailableTiming') }}" method="post">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dateModalLabel">Selected Date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="selectedDateText">You have selected: </p>

                    <!-- Hidden input for selected date -->
                    <input type="hidden" name="date" id="selectedDateField">

                    <!-- Start Time Input -->
                    <div class="mb-3">
                        <label for="startTime" class="form-label">Start Time</label>
                        <input type="time" name="start_time" class="form-control" id="startTime"
                            value="{{ old('start_time') }}">
                        @error('start_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- End Time Input -->
                    <div class="mb-3">
                        <label for="endTime" class="form-label">End Time</label>
                        <input type="time" name="end_time" class="form-control" id="endTime"
                            value="{{ old('end_time') }}">
                        @error('end_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Notes Input -->
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/flatpickr.min.js"></script>

<script>
    // Example available time slots for each date
    const availableTimeSlots = {
        '2024-02-05': ['09:00 AM', '11:00 AM', '02:00 PM', '04:00 PM'],
        '2024-02-06': ['10:00 AM', '01:00 PM', '03:00 PM'],
        '2024-02-07': ['08:00 AM', '12:00 PM', '02:30 PM'],
    };

    document.addEventListener('DOMContentLoaded', function() {
        flatpickr(".flatpickr-input", {
            inline: true,
            dateFormat: "d M, Y",
            defaultDate: new Date(), // Set to current date dynamically
            clickOpens: false,
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                const day = dayElem.dateObj.toISOString().split('T')[0];
                if (availableTimeSlots[day]) {
                    dayElem.classList.add('has-time-slots');
                }
            },
            onChange: function(selectedDates, dateStr, instance) {
                var modal = new bootstrap.Modal(document.getElementById('dateModal'), {});
                document.getElementById('selectedDateText').innerHTML =
                    "<span style='color: blue;'>You have selected: " + dateStr + "</span>";
                document.getElementById('selectedDateField').value = dateStr;
                modal.show();
            }
        });
    });
</script>

<style>
    /* Style dates that have available time slots */
    .has-time-slots {
        background-color: #f0ad4e;
        color: white;
        cursor: pointer;
    }
</style>
