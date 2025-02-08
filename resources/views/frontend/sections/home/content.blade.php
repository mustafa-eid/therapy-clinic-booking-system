<section class="features-section-sixteen">
    <div class="container">
        <!-- Display success or error messages -->
        @include('frontend.sections.messages.content')
        <div class="section-head-twelve">
            <h2>Available Timings</h2>
            <p>You can select and book any time you need.</p>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Display Current Month -->
                <div class="current-month text-center mb-3">
                    <h3 id="currentMonth" style="color: #007bff;"></h3>
                </div>
                <!-- Schedule Widget -->
                <div class="card booking-schedule schedule-widget">
                    <!-- Schedule Header -->
                    <div class="schedule-header">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Day Slot -->
                                <div class="day-slot">
                                    <!-- Horizontal Scrollable Days -->
                                    <div id="daySelectorContainer" class="d-flex overflow-auto">
                                        @php
                                            $groupedSlots = [];
                                            $today = date('Y-m-d');
                                            foreach ($AvailableTimings as $slot) {
                                                $date = date('Y-m-d', strtotime($slot->date));
                                                // Only add the slot if the date is today or in the future
                                                if ($date >= $today) {
                                                    $groupedSlots[$date][] = $slot;
                                                }
                                            }
                                            // Sort the slots by date (ascending order)
                                            ksort($groupedSlots);

                                            $availableDays = array_keys($groupedSlots);
                                        @endphp
                                        @foreach ($availableDays as $date)
                                            <div class="day-card p-2 text-center mx-2" data-date="{{ $date }}"
                                                onclick="selectDay(this)">
                                                <span class="d-block">{{ date('D', strtotime($date)) }}</span>
                                                <span class="d-block">{{ date('d M', strtotime($date)) }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- /Day Slot -->
                            </div>
                        </div>
                    </div>
                    <!-- /Schedule Header -->
                    <!-- Schedule Content -->
                    <div class="schedule-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Display selected day -->
                                <div id="selectedDay" class="row">
                                    <!-- The selected day will be displayed here -->
                                </div>
                                <!-- Time Slot -->
                                @foreach ($groupedSlots as $date => $slots)
                                    <div class="time-slot-group time-slots-{{ $date }}" style="display: none;">
                                        <div class="row">
                                            @foreach ($slots as $slot)
                                                <div class="col-2 mb-3">
                                                    <a class="timing d-block text-center" href="javascript:void(0);"
                                                        onclick="selectTimeSlot(this, {{ $slot->id }}, '{{ date('h:i A', strtotime($slot->start_time)) }}')">
                                                        <span>{{ date('h:i', strtotime($slot->start_time)) }}</span>
                                                        <span>{{ date('A', strtotime($slot->start_time)) }}</span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /Time Slot -->
                            </div>
                        </div>
                    </div>
                    <!-- /Schedule Content -->
                </div>
                <!-- /Schedule Widget -->
                <!-- Submit Section -->
                <div class="submit-section proceed-btn text-end">
                    <a href="javascript:void(0);" id="proceedToPayBtn" class="btn btn-primary submit-btn"
                        onclick="submitBooking()">
                        Proceed to Pay
                    </a>
                    <input type="hidden" id="selectedSlotId" name="selectedSlotId">
                    <input type="hidden" id="selectedSlotTime" name="selectedSlotTime">
                </div>
                <!-- /Submit Section -->
            </div>
        </div>
    </div>
</section>
