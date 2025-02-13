<section class="full-width-section bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-4 bg-white" style="border-radius: 20px;">
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="day-slot mb-4">
                            <div id="daySelectorContainer"
                                class="d-flex overflow-auto px-3 py-3 border rounded bg-white shadow-sm">
                                @foreach (array_keys($groupedSlots) as $date)
                                    <div class="day-card mx-2" data-date="{{ $date }}"
                                        onclick="selectDay(this)">
                                        <span class="fw-bold">{{ \Carbon\Carbon::parse($date)->format('D') }}</span>
                                        <span class="d-block">{{ \Carbon\Carbon::parse($date)->format('d M') }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="selectedDay" class="mb-3 text-center fw-semibold fs-5"></div>
                        @foreach ($groupedSlots as $date => $slots)
                            <div class="time-slot-group time-slots-{{ $date }}" style="display: none;">
                                @foreach ($slots as $slot)
                                    <div>
                                        <a class="timing border rounded-3 shadow-sm fs-6 fw-bold text-dark"
                                            href="javascript:void(0);"
                                            onclick="selectTimeSlot(this, {{ $slot->id }}, '{{ date('h:i A', strtotime($slot->start_time)) }}')">
                                            <span>{{ date('h:i A', strtotime($slot->start_time)) }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" id="proceedToPayBtn" class="confirm-button"
                            onclick="submitBooking()">Confirm Booking</button>
                        <input type="hidden" id="selectedSlotId">
                        <input type="hidden" id="selectedSlotTime">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
