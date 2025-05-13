<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Call - Weight Loss Mentorship</title>
    <meta name="description" content="Book a call for our weight loss mentorship program.">
    <meta name="robots" content="index, follow">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <style>
        /* Simple 8-point spacing system */
        :root {
            --space-1: 8px;   /* 0.5rem */
            --space-2: 16px;  /* 1rem */
            --space-3: 24px;  /* 1.5rem */
            --space-4: 32px;  /* 2rem */
            --space-5: 40px;  /* 2.5rem */
            --space-6: 48px;  /* 3rem */
            
            /* Primary colors */
            --primary: #1877F2;
            --background: #f8f9fa;
            --text: #202124;
            --text-secondary: #5f6368;
            --border: #c1c7cd;
            --card-bg: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
            line-height: 1.5;
            font-size: 16px;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 0 0 var(--space-6) 0;
        }

        .content {
            margin: 0 auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: var(--space-5);
            max-width: 800px;
            padding: 0 1.5rem;
        }

        /* Calendar */
        .calendar-wrapper {
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
            background-color: var(--background);
            padding-bottom: var(--space-3);
        }
        
        .calendar-header-text {
            margin-bottom: var(--space-3);
            text-align: left;
        }
        
        .calendar-title {
            color: var(--text);
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: var(--space-1);
            text-align: left;
            line-height: 1.2;
        }

        .calendar-subtitle {
            color: var(--text);
            font-size: 1.125rem;
            text-align: left;
            line-height: 1.4;
        }

        .calendar-container {
            width: 100%;
            background: transparent;
            border-radius: 12px;
            overflow: hidden;
        }

        /* Coach Profile */
        .coach-profile {
            display: flex;
            align-items: center;
            margin-bottom: var(--space-2);
            padding-bottom: var(--space-2);
            justify-content: center;
        }

        .coach-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: var(--space-2);
            background-color: #E8EAED;
        }

        .coach-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .coach-info {
            text-align: left;
        }

        .coach-label {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: 2px;
        }

        .coach-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            line-height: 1.2;
        }

        /* Subheader */
        .calendar-subheader {
            font-size: 1rem;
            color: var(--text);
            margin-bottom: var(--space-3);
            text-align: center;
            line-height: 1.4;
        }

        /* Event details */
        .event-details {
            margin-bottom: var(--space-6);
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .event-detail {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text);
            font-size: 0.875rem;
        }

        .event-detail i {
            color: #6B7280;
            width: 20px;
            text-align: center;
        }

        .event-timezone {
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
        }

        .event-timezone i.fa-chevron-down {
            font-size: 0.75rem;
            color: #6B7280;
            margin-left: 2px;
        }

        select.timezone-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: transparent;
            border: none;
            padding: 0;
            margin: 0;
            font-size: 0.875rem;
            color: var(--text);
            cursor: pointer;
            font-family: inherit;
            width: auto;
        }

        select.timezone-select:focus {
            outline: none;
        }

        .month-calendar {
            padding: 0 0 16px;
        }

        .calendar-header {
            padding-bottom: 16px;
        }

        .month-nav {
            display: flex;
            align-items: center;
            gap: 1.25rem;
            color: var(--text);
            width: 100%;
            justify-content: space-between;
        }

        .month-title {
            font-size: 1rem;
            font-weight: 700;
            text-align: left;
            color: var(--text);
            display: flex;
            align-items: center;
        }

        .month-title span {
            color: #6B7280;
            font-weight: normal;
            margin-left: 8px;
            font-size: 0.9375rem;
        }

        .nav-button {
            background: transparent;
            border: none;
            color: #6B7280;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .nav-button:hover {
            background: #F9FAFB;
            color: var(--text);
        }

        .nav-buttons {
            display: flex;
            gap: 8px;
        }

        .weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
            font-weight: 500;
            color: #6B7280;
            font-size: 0.75rem;
            padding: 8px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            margin: 0 0 8px;
        }

        .weekday {
            padding: 8px 0;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
            padding: 8px 0;
        }

        .calendar-day {
            height: 56px;
            width: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            color: var(--text);
            margin: 0 auto;
            transition: all 0.2s ease;
        }

        .calendar-day:hover {
            background-color: #F0F9FF;
            color: var(--primary);
        }

        .calendar-day.selected {
            background-color: var(--primary);
            color: #fff;
            font-weight: 500;
            border-radius: 8px;
        }

        .calendar-day.today {
            font-weight: 700;
            position: relative;
        }
        
        .calendar-day.today::after {
            content: "";
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 4px;
            background-color: var(--primary);
            border-radius: 50%;
        }

        .calendar-day.other-month {
            visibility: hidden;
            pointer-events: none;
        }

        .day-view {
            padding: 8px 0 0;
            margin-top: 8px;
            background-color: transparent;
            position: relative;
        }

        .time-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .day-title {
            font-size: 0.9375rem;
            font-weight: 600;
        }

        .time-slots-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .time-slot {
            padding: 16px;
            background: white;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            color: var(--text);
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .time-slot:hover {
            background: #F0F9FF;
            border-color: #BFDBFE;
            color: var(--primary);
        }

        /* Disclaimer */
        .disclaimer {
            max-width: 650px;
            margin: var(--space-4) auto 0;
            padding-top: var(--space-4);
            line-height: 1.5;
            font-size: 0.75rem;
            color: var(--text-secondary);
            text-align: center;
        }

        /* Form header */
        .form-wrapper {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            position: sticky;
            top: 0;
            background-color: var(--background);
            z-index: 100;
            padding: var(--space-2) 0;
        }
        
        /* Progress Bar Styles */
        .progress-bar-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto var(--space-4);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-bar-step {
            flex: 1;
            height: 5px;
            border-radius: 3px;
            background: #e0e0e0;
            transition: background 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .progress-bar-step.active:nth-child(1) {
            background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
        }
        
        .progress-bar-step.active:nth-child(2) {
            background: linear-gradient(90deg, #ee0979 0%, #9733ee 100%);
        }
        
        .progress-bar-step.active:nth-child(3) {
            background: linear-gradient(90deg, #9733ee 0%, #00c6ff 100%);
        }

        .form-title {
            color: var(--text);
            font-weight: 700;
            font-size: 1.125rem;
            line-height: 1.2;
            padding: 0;
            background-color: var(--background);
            text-align: left;
            margin-bottom: var(--space-1);
        }
        
        .form-subtitle {
            color: var(--text);
            font-size: 1.125rem;
            margin-bottom: var(--space-3);
            line-height: 1.4;
            text-align: left;
        }

        /* Accessibility */
        a:focus, button:focus, input:focus, select:focus, textarea:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Mobile Styles */
        @media(max-width:768px) {
            .container { 
                padding: 0 0 var(--space-4) 0; 
            }
            
            .content { 
                gap: var(--space-4); 
                padding: 0 1.25rem; 
            }
            
            .calendar-days {
                gap: 2px;
            }
            
            .calendar-day {
                height: 44px;
                width: 44px;
                font-size: 0.9375rem;
            }
            
            .event-details {
                margin-bottom: var(--space-5);
                gap: 6px;
            }
            
            .event-detail {
                font-size: 0.875rem;
            }

            .day-view {
                padding: 8px 0 0; 
            }
            
            .time-slot { 
                padding: 14px; 
                font-size: 0.9375rem; 
            }
            
            .month-title { 
                font-size: 1.5rem; 
            }
            
            .calendar-title {
                font-size: 1.125rem;
            }
            
            .calendar-subtitle {
                font-size: 0.875rem;
            }
            
            .day-title {
                font-size: 1rem;
            }
            
            .nav-button { 
                width: 36px; 
                height: 36px; 
            }

            .disclaimer {
                font-size: 0.7rem;
            }

            select.timezone-select {
                font-size: 0.9375rem;
            }

            .form-title {
                font-size: 1rem;
            }
            
            .form-subtitle {
            font-size: 0.875rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="calendar-wrapper">
                <div class="form-wrapper">
                    <div class="progress-bar-container">
                        <div class="progress-bar-step active"></div>
                        <div class="progress-bar-step active"></div>
                        <div class="progress-bar-step active"></div>
                        </div>
                    <div class="form-title">Book Your Call</div>
                    <p class="form-subtitle">Choose a time for an honest conversation about whether this is right for you.</p>
                </div>
                
                <div class="event-details">
                    <div class="event-detail">
                        <i class="far fa-clock"></i>
                        <span>30m</span>
                    </div>
                    <div class="event-detail">
                        <i class="fab fa-google"></i>
                        <span>Google Meet</span>
                    </div>
                    <div class="event-detail">
                        <i class="fas fa-globe"></i>
                        <div class="event-timezone">
                            <select id="membership-timezone-select" class="timezone-select">
                                <!-- Will be populated by JavaScript -->
                        </select>
                            <i class="fas fa-chevron-down"></i>
                    </div>
                    </div>
                </div>
                
                <div class="calendar-container">
                    <div class="month-calendar">
                        <div class="calendar-header">
                            <div class="month-nav">
                                <div class="month-title">May <span>2025</span></div>
                                <div class="nav-buttons">
                                    <button class="nav-button prev-month" aria-label="Previous month">
                                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                                    </button>
                                    <button class="nav-button next-month" aria-label="Next month">
                                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                    </button>
                    </div>
                        </div>
                        </div>
                        <div class="weekdays" role="row">
                            <div class="weekday" role="columnheader">SUN</div>
                            <div class="weekday" role="columnheader">MON</div>
                            <div class="weekday" role="columnheader">TUE</div>
                            <div class="weekday" role="columnheader">WED</div>
                            <div class="weekday" role="columnheader">THU</div>
                            <div class="weekday" role="columnheader">FRI</div>
                            <div class="weekday" role="columnheader">SAT</div>
                        </div>
                        <div class="calendar-days" role="grid">
                            <!-- Days will be populated by JavaScript -->
                        </div>
                        </div>
                    <div class="day-view">
                        <div class="time-header">
                            <div class="day-title">Thu 08</div>
                        </div>
                        <div class="time-slots-grid" role="list">
                            <!-- Time slots will be populated by JavaScript -->
                    </div>
                    </div>
                </div>
            </div>

            <div class="disclaimer">
                This site is not part of the Facebook website or Facebook Inc. Additionally, this site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize timezone selector
            const timezoneSelector = {
                init() {
                    this.selectedTimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                    this.timezones = [
                        "Pacific/Midway", "Pacific/Pago_Pago", "Pacific/Honolulu", "America/Juneau", "America/Los_Angeles", 
                        "America/Tijuana", "America/Denver", "America/Phoenix", "America/Chihuahua", "America/Mazatlan", 
                        "America/Chicago", "America/Regina", "America/Mexico_City", "America/Monterrey", "America/Guatemala", 
                        "America/New_York", "America/Indiana/Indianapolis", "America/Bogota", "America/Lima", "America/Halifax", 
                        "America/Caracas", "America/La_Paz", "America/Santiago", "America/St_Johns", "America/Sao_Paulo", 
                        "America/Argentina/Buenos_Aires", "America/Montevideo", "Atlantic/South_Georgia", "Atlantic/Azores", 
                        "Atlantic/Cape_Verde", "Europe/Dublin", "Europe/London", "Europe/Lisbon", "Africa/Casablanca", 
                        "Africa/Monrovia", "Etc/UTC", "Europe/Belgrade", "Europe/Bratislava", "Europe/Budapest", "Europe/Ljubljana", 
                        "Europe/Prague", "Europe/Sarajevo", "Europe/Skopje", "Europe/Warsaw", "Europe/Zagreb", "Europe/Brussels", 
                        "Europe/Copenhagen", "Europe/Madrid", "Europe/Paris", "Europe/Amsterdam", "Europe/Berlin", "Europe/Rome", 
                        "Europe/Stockholm", "Europe/Vienna", "Europe/Zurich", "Africa/Cairo", "Africa/Johannesburg", "Europe/Istanbul", 
                        "Europe/Kiev", "Europe/Helsinki", "Europe/Riga", "Europe/Sofia", "Europe/Tallinn", "Europe/Vilnius", 
                        "Asia/Jerusalem", "Asia/Baghdad", "Asia/Kuwait", "Asia/Riyadh", "Asia/Tehran", "Asia/Baku", 
                        "Asia/Muscat", "Asia/Tbilisi", "Asia/Yerevan", "Asia/Kabul", "Asia/Karachi", "Asia/Tashkent", 
                        "Asia/Kolkata", "Asia/Colombo", "Asia/Kathmandu", "Asia/Dhaka", "Asia/Almaty", "Asia/Yangon", 
                        "Asia/Bangkok", "Asia/Jakarta", "Asia/Singapore", "Asia/Kuala_Lumpur", "Asia/Urumqi", 
                        "Asia/Ho_Chi_Minh", "Asia/Hong_Kong", "Asia/Shanghai", "Asia/Taipei", "Asia/Manila", 
                        "Asia/Seoul", "Asia/Tokyo", "Australia/Perth", "Australia/Darwin", "Australia/Brisbane", 
                        "Australia/Adelaide", "Australia/Sydney", "Australia/Hobart", "Pacific/Guam", "Pacific/Port_Moresby", 
                        "Pacific/Auckland", "Pacific/Fiji"
                    ];
                    
                    this.populateTimezoneSelect();
                    this.setupEventListeners();
                },
                
                formatTimezone(timezone) {
                    // Format timezones to be more readable (e.g., "America/New_York" -> "America/New York")
                    return timezone.replace('_', ' ');
                },
                
                populateTimezoneSelect() {
                    const select = document.getElementById('membership-timezone-select');
                    select.innerHTML = '';
                    
                    this.timezones.forEach(timezone => {
                        const option = document.createElement('option');
                        option.value = timezone;
                        option.textContent = this.formatTimezone(timezone);
                        
                        if (timezone === this.selectedTimezone) {
                            option.selected = true;
                        }
                        
                        select.appendChild(option);
                    });
                },
                
                setupEventListeners() {
                    // Timezone selection change
                    document.getElementById('membership-timezone-select').addEventListener('change', (e) => {
                        this.selectedTimezone = e.target.value;
                        
                        // You would typically update your calendar here based on the new timezone
                        calendar.renderCalendar();
                        calendar.renderTimeSlots();
                    });
                }
            };

            const calendar = {
                currentDate: new Date(),
                selectedDate: new Date(),
                timeSlots: [
                    '3:00pm', '3:15pm', '3:30pm', '3:45pm',
                    '4:00pm', '4:15pm', '4:30pm', '4:45pm'
                ],
                
                init() {
                    this.renderCalendar();
                    this.setupEventListeners();
                    this.renderTimeSlots();
                },

                renderCalendar() {
                    const year = this.currentDate.getFullYear();
                    const month = this.currentDate.getMonth();
                    
                    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'];
                    
                    // Update month title with separate year span
                    const monthTitleEl = document.querySelector('.month-title');
                    monthTitleEl.innerHTML = `${monthNames[month]} <span>${year}</span>`;

                    const firstDay = new Date(year, month, 1);
                    const lastDay = new Date(year, month + 1, 0);
                    const totalDays = lastDay.getDate();
                    const startingDay = firstDay.getDay();
                    const prevMonthLastDay = new Date(year, month, 0).getDate();
                    
                    const calendarDays = document.querySelector('.calendar-days');
                    calendarDays.innerHTML = '';

                    // Previous month days
                    for (let i = startingDay - 1; i >= 0; i--) {
                        const day = document.createElement('div');
                        day.className = 'calendar-day other-month';
                        day.setAttribute('role', 'gridcell');
                        day.setAttribute('tabindex', '-1');
                        day.setAttribute('aria-disabled', 'true');
                        day.textContent = prevMonthLastDay - i;
                        calendarDays.appendChild(day);
                    }

                    // Current month days
                    for (let i = 1; i <= totalDays; i++) {
                        const day = document.createElement('div');
                        day.className = 'calendar-day';
                        day.setAttribute('role', 'gridcell');
                        day.setAttribute('tabindex', '0');
                        day.textContent = i;
                        
                        const dayDate = new Date(year, month, i);
                        
                        // Check if this is today
                        const today = new Date();
                        if (i === today.getDate() && 
                            month === today.getMonth() && 
                            year === today.getFullYear()) {
                            day.classList.add('today');
                        }
                        
                        // Check if this is the selected date
                        if (i === this.selectedDate.getDate() && 
                            month === this.selectedDate.getMonth() && 
                            year === this.selectedDate.getFullYear()) {
                            day.classList.add('selected');
                            day.setAttribute('aria-selected', 'true');
                        }
                        
                        calendarDays.appendChild(day);
                    }

                    // Next month days
                    const remainingDays = 42 - (startingDay + totalDays);
                    for (let i = 1; i <= remainingDays; i++) {
                        const day = document.createElement('div');
                        day.className = 'calendar-day other-month';
                        day.setAttribute('role', 'gridcell');
                        day.setAttribute('tabindex', '-1');
                        day.setAttribute('aria-disabled', 'true');
                        day.textContent = i;
                        calendarDays.appendChild(day);
                    }
                    
                    // Update day title
                    this.updateDayTitle();
                },
                
                updateDayTitle() {
                    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    const day = this.selectedDate.getDate().toString().padStart(2, '0');
                    const dayName = dayNames[this.selectedDate.getDay()];
                    
                    document.querySelector('.day-title').textContent = `${dayName} ${day}`;
                },

                setupEventListeners() {
                    document.querySelector('.prev-month').addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() - 1);
                        this.renderCalendar();
                    });

                    document.querySelector('.next-month').addEventListener('click', () => {
                        this.currentDate.setMonth(this.currentDate.getMonth() + 1);
                        this.renderCalendar();
                    });

                    document.querySelector('.calendar-days').addEventListener('click', (e) => {
                        if (e.target.classList.contains('calendar-day') && 
                            !e.target.classList.contains('other-month')) {
                            
                            document.querySelectorAll('.calendar-day').forEach(day => {
                                day.classList.remove('selected');
                                day.setAttribute('aria-selected', 'false');
                            });
                            
                            e.target.classList.add('selected');
                            e.target.setAttribute('aria-selected', 'true');
                            
                            this.selectedDate = new Date(
                                this.currentDate.getFullYear(),
                                this.currentDate.getMonth(),
                                parseInt(e.target.textContent)
                            );
                            
                            this.updateDayTitle();
                            this.renderTimeSlots();
                        }
                    });
                    
                    // Keyboard navigation for calendar
                    document.querySelector('.calendar-days').addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' || e.key === ' ') {
                            if (e.target.classList.contains('calendar-day') && 
                                !e.target.classList.contains('other-month')) {
                                e.preventDefault();
                                e.target.click();
                            }
                        }
                    });
                },

                renderTimeSlots() {
                    const timeSlotsGrid = document.querySelector('.time-slots-grid');
                    timeSlotsGrid.innerHTML = '';

                    this.timeSlots.forEach(time => {
                        const slot = document.createElement('div');
                        slot.className = 'time-slot';
                        slot.setAttribute('role', 'listitem');
                        slot.setAttribute('tabindex', '0');
                        slot.textContent = time;
                        
                        // Add booking functionality
                        slot.addEventListener('click', () => {
                            const dateStr = this.selectedDate.toLocaleDateString('en-US', { 
                                weekday: 'long', 
                                month: 'long', 
                                day: 'numeric',
                                year: 'numeric'
                            });
                            
                            // Redirect to confirmation page with booking details
                            window.location.href = `confirmation.php?date=${encodeURIComponent(dateStr)}&time=${encodeURIComponent(time)}&timezone=${encodeURIComponent(timezoneSelector.selectedTimezone)}`;
                        });
                        
                        // Add aria label with date and time
                        const dateStr = this.selectedDate.toLocaleDateString('en-US', { 
                            weekday: 'long', 
                            month: 'long', 
                            day: 'numeric',
                            year: 'numeric'
                        });
                        slot.setAttribute('aria-label', `Book appointment for ${dateStr} at ${time}`);
                        
                        timeSlotsGrid.appendChild(slot);
                    });
                }
            };

            // Initialize the calendar
            calendar.init();
            
            // Initialize the timezone selector
            timezoneSelector.init();
        });
    </script>
</body>
</html> 