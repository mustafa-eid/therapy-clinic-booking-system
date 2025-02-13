<div class="pbmit-progress-wrap">
    <svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 19.2859;">
        </path>
    </svg>
    <i class="fa-solid fa-arrow-up"
        style="font-size: 24px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
</div>

<!-- JS -->
<!-- jQuery JS -->
<script src="https://clinic.kenooz.co/website-assets/js/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://clinic.kenooz.co/website-assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://clinic.kenooz.co/website-assets/js/bootstrap.min.js"></script>
<!-- jquery Waypoints JS -->
<script src="https://clinic.kenooz.co/website-assets/js/jquery.waypoints.min.js"></script>
<!-- jquery Appear JS -->
<script src="https://clinic.kenooz.co/website-assets/js/jquery.appear.js"></script>
<!-- Numinate JS -->
<script src="https://clinic.kenooz.co/website-assets/js/numinate.min.js"></script>
<!-- Slick JS -->
<script src="https://clinic.kenooz.co/website-assets/js/swiper.min.js"></script>
<!-- Magnific JS -->
<script src="https://clinic.kenooz.co/website-assets/js/jquery.magnific-popup.min.js"></script>
<!-- Circle Progress JS -->
<script src="https://clinic.kenooz.co/website-assets/js/circle-progress.js"></script>
<!-- countdown JS -->
<script src="https://clinic.kenooz.co/website-assets/js/jquery.countdown.min.js"></script>
<!-- AOS -->
<script src="https://clinic.kenooz.co/website-assets/js/aos.js"></script>
<!-- GSAP -->
<script src="https://clinic.kenooz.co/website-assets/js/gsap.js"></script>
<!-- Scroll Trigger -->
<script src="https://clinic.kenooz.co/website-assets/js/ScrollTrigger.js"></script>
<!-- Split Text -->
<script src="https://clinic.kenooz.co/website-assets/js/SplitText.js"></script>
<!-- masonry JS -->
<script src="https://clinic.kenooz.co/website-assets/js/masonry.min.js"></script>
<!-- Isotope JS -->
<script src="https://clinic.kenooz.co/website-assets/js/isotope.pkgd.min.js"></script>
<!-- Magnetic -->
<script src="https://clinic.kenooz.co/website-assets/js/magnetic.js"></script>
<!-- GSAP Animation -->
<script src="https://clinic.kenooz.co/website-assets/js/gsap-animation.js"></script>
<!-- Scripts JS -->
<script src="https://clinic.kenooz.co/website-assets/js/scripts.js"></script>

<script>
    'undefined' === typeof _trfq || (window._trfq = []);
    'undefined' === typeof _trfd && (window._trfd = []), _trfd.push({
        'tccl.baseHost': 'secureserver.net'
    }, {
        'ap': 'cpsh-oh'
    }, {
        'server': 'sxb1plzcpnl489831'
    }, {
        'dcenter': 'sxb1'
    }, {
        'cp_id': '9919290'
    }, {
        'cp_cl': '8'
    }) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.
</script>
<script src='https://img1.wsimg.com/traffic-assets/js/tccl.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let savedDate = localStorage.getItem("selectedDate");
        if (savedDate) {
            let savedDayElement = document.querySelector(`[data-date="${savedDate}"]`);
            if (savedDayElement) selectDay(savedDayElement);
        }
    });

    function selectDay(element) {
        document.querySelectorAll('.day-card').forEach(dc => dc.classList.remove('selected-day'));
        element.classList.add('selected-day');

        let selectedDate = element.getAttribute('data-date');
        document.getElementById('selectedDay').textContent = new Date(selectedDate).toLocaleDateString('en-US', {
            weekday: 'long',
            day: 'numeric',
            month: 'long'
        });

        document.querySelectorAll('.time-slot-group').forEach(slotGroup => slotGroup.style.display = 'none');
        let selectedSlotGroup = document.querySelector('.time-slots-' + selectedDate);
        if (selectedSlotGroup) selectedSlotGroup.style.display = 'flex';

        // Reset previously selected time slot when changing day
        document.querySelectorAll('.timing').forEach(slot => slot.classList.remove('selected-slot'));
        document.getElementById('selectedSlotId').value = '';
        document.getElementById('selectedSlotTime').value = '';
    }

    function selectTimeSlot(element, slotId, slotTime) {
        // Check if the clicked time slot is already selected
        if (element.classList.contains('selected-slot')) {
            element.classList.remove('selected-slot');
            document.getElementById('selectedSlotId').value = '';
            document.getElementById('selectedSlotTime').value = '';
        } else {
            // Deselect all other slots
            document.querySelectorAll('.timing').forEach(slot => slot.classList.remove('selected-slot'));

            // Select the clicked slot
            element.classList.add('selected-slot');
            document.getElementById('selectedSlotId').value = slotId;
            document.getElementById('selectedSlotTime').value = slotTime;
        }
    }

    function submitBooking() {
        var slotId = document.getElementById('selectedSlotId').value;
        var selectedDate = document.querySelector('.day-card.selected-day')?.getAttribute('data-date');

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
