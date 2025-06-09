/**
 * Cal.com API Integration for calendar scheduling
 */

// Configure event type IDs for your appointments
const CAL_CONFIG = {
    eventTypeId: '671523', // Replace with your Cal.com event type ID
    defaultTimeZone: 'America/New_York', // Default timezone
};

// Calendar scheduler class
class CalScheduler {
    constructor(config) {
        this.eventTypeId = config.eventTypeId;
        this.timeZone = config.defaultTimeZone;
        this.selectedDate = new Date();
        this.availableSlots = [];
        this.selectedSlot = null;
        
        // DOM elements
        this.calendarEl = document.querySelector('.calendar-days');
        this.timeSlotsEl = document.querySelector('.time-slots');
        this.monthTitleEl = document.querySelector('.month-title');
        this.prevMonthBtn = document.querySelector('.prev-month');
        this.nextMonthBtn = document.querySelector('.next-month');
        this.timezoneSelectEl = document.getElementById('membership-timezone-select');
        this.bookingFormEl = document.getElementById('booking-form');
        
        // Initialize
        this.init();
    }
    
    async init() {
        // Initialize timezone
        this.initializeTimezone();
        
        // Render initial calendar
        this.renderCalendar();
        
        // Set up event listeners
        this.setupEventListeners();
        
        // Load event types from Cal.com
        await this.loadEventTypes();
    }
    
    initializeTimezone() {
        // Try to detect user's timezone
        try {
            this.timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        } catch(e) {
            console.warn('Could not detect timezone, using default', e);
        }
        
        // Update timezone select if it exists
        if (this.timezoneSelectEl) {
            this.populateTimezoneSelect();
        }
    }
    
    populateTimezoneSelect() {
        // List of common timezones (you can expand this list)
        const timezones = [
            'America/New_York',
            'America/Chicago',
            'America/Denver',
            'America/Los_Angeles',
            'Europe/London',
            'Europe/Paris',
            'Asia/Tokyo',
            'Australia/Sydney',
            'Pacific/Auckland'
        ];
        
        // Clear the select box
        this.timezoneSelectEl.innerHTML = '';
        
        // Add options for each timezone
        timezones.forEach(timezone => {
            const option = document.createElement('option');
            option.value = timezone;
            option.textContent = timezone.replace('_', ' ');
            
            if (timezone === this.timeZone) {
                option.selected = true;
            }
            
            this.timezoneSelectEl.appendChild(option);
        });
    }
    
    setupEventListeners() {
        // Previous month button
        if (this.prevMonthBtn) {
            this.prevMonthBtn.addEventListener('click', () => {
                const date = new Date(this.selectedDate);
                date.setMonth(date.getMonth() - 1);
                this.selectedDate = date;
                this.renderCalendar();
            });
        }
        
        // Next month button
        if (this.nextMonthBtn) {
            this.nextMonthBtn.addEventListener('click', () => {
                const date = new Date(this.selectedDate);
                date.setMonth(date.getMonth() + 1);
                this.selectedDate = date;
                this.renderCalendar();
            });
        }
        
        // Timezone selection change
        if (this.timezoneSelectEl) {
            this.timezoneSelectEl.addEventListener('change', (e) => {
                this.timeZone = e.target.value;
                this.loadAvailability();
            });
        }
        
        // Calendar day click
        if (this.calendarEl) {
            this.calendarEl.addEventListener('click', (e) => {
                if (e.target.classList.contains('calendar-day') && 
                    !e.target.classList.contains('other-month')) {
                    
                    const year = this.selectedDate.getFullYear();
                    const month = this.selectedDate.getMonth();
                    const day = parseInt(e.target.textContent);
                    
                    // Update selected date
                    this.selectedDate = new Date(year, month, day);
                    
                    // Update calendar UI
                    this.renderCalendar();
                    
                    // Load availability for this date
                    this.loadAvailability();
                }
            });
        }
        
        // Booking form submission
        if (this.bookingFormEl) {
            this.bookingFormEl.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                if (!this.selectedSlot) {
                    alert('Please select a time slot first');
                    return;
                }
                
                const formData = new FormData(this.bookingFormEl);
                const bookingData = {
                    eventTypeId: this.eventTypeId,
                    start: this.selectedSlot.start,
                    end: this.selectedSlot.end,
                    timeZone: this.timeZone,
                    name: formData.get('name'),
                    email: formData.get('email'),
                    notes: formData.get('notes') || '',
                };
                
                try {
                    const booking = await this.createBooking(bookingData);
                    // Redirect to confirmation page with booking details
                    window.location.href = `confirmation.php?booking_id=${booking.id}`;
                } catch (error) {
                    alert(`Booking failed: ${error.message}`);
                }
            });
        }
    }
    
    renderCalendar() {
        if (!this.calendarEl) return;
        
        const year = this.selectedDate.getFullYear();
        const month = this.selectedDate.getMonth();
        
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'];
        
        // Update month title
        if (this.monthTitleEl) {
            this.monthTitleEl.innerHTML = `${monthNames[month]} <span>${year}</span>`;
        }
        
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const totalDays = lastDay.getDate();
        const startingDay = firstDay.getDay();
        const prevMonthLastDay = new Date(year, month, 0).getDate();
        
        // Clear existing calendar
        this.calendarEl.innerHTML = '';
        
        // Previous month days
        for (let i = startingDay - 1; i >= 0; i--) {
            const day = document.createElement('div');
            day.className = 'calendar-day other-month';
            day.setAttribute('aria-disabled', 'true');
            day.textContent = prevMonthLastDay - i;
            this.calendarEl.appendChild(day);
        }
        
        // Current month days
        for (let i = 1; i <= totalDays; i++) {
            const day = document.createElement('div');
            day.className = 'calendar-day';
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
            
            this.calendarEl.appendChild(day);
        }
        
        // Calculate if we need a 6th row
        const totalCellsFilled = startingDay + totalDays;
        const rowsNeeded = Math.ceil(totalCellsFilled / 7);
        const cellsToFill = rowsNeeded * 7 - totalCellsFilled;
        
        // Next month days
        if (cellsToFill > 0) {
            for (let i = 1; i <= cellsToFill; i++) {
                const day = document.createElement('div');
                day.className = 'calendar-day other-month';
                day.setAttribute('aria-disabled', 'true');
                day.textContent = i;
                this.calendarEl.appendChild(day);
            }
        }
        
        // Update day title
        this.updateDayTitle();
    }
    
    updateDayTitle() {
        const dayTitleEl = document.querySelector('.day-title');
        if (!dayTitleEl) return;
        
        const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const day = this.selectedDate.getDate().toString().padStart(2, '0');
        const dayName = dayNames[this.selectedDate.getDay()];
        
        dayTitleEl.textContent = `${dayName} ${day}`;
    }
    
    renderTimeSlots() {
        if (!this.timeSlotsEl) return;
        
        // Clear existing time slots
        this.timeSlotsEl.innerHTML = '';
        
        if (this.availableSlots.length === 0) {
            const noSlots = document.createElement('div');
            noSlots.className = 'no-slots-message';
            noSlots.textContent = 'No available time slots for this date.';
            this.timeSlotsEl.appendChild(noSlots);
            return;
        }
        
        // Create time slot elements
        this.availableSlots.forEach(slot => {
            const timeSlot = document.createElement('div');
            timeSlot.className = 'time-slot';
            
            // Format time as 1:30 PM
            const startTime = new Date(slot.start);
            const formattedTime = startTime.toLocaleTimeString('en-US', {
                hour: 'numeric',
                minute: '2-digit',
                hour12: true
            });
            
            timeSlot.textContent = formattedTime;
            
            // Add click handler
            timeSlot.addEventListener('click', () => {
                // Remove selected class from all slots
                document.querySelectorAll('.time-slot').forEach(el => {
                    el.classList.remove('selected');
                });
                
                // Add selected class to this slot
                timeSlot.classList.add('selected');
                
                // Update selected slot
                this.selectedSlot = slot;
            });
            
            this.timeSlotsEl.appendChild(timeSlot);
        });
    }
    
    // API Methods
    async loadEventTypes() {
        try {
            const response = await fetch('cal_api.php?action=event_types');
            const data = await response.json();
            
            if (data.error) {
                console.error('Error loading event types:', data.error);
                return;
            }
            
            // If event type ID is not set yet, use the first one
            if (!this.eventTypeId && data.event_types && data.event_types.length > 0) {
                this.eventTypeId = data.event_types[0].id;
                
                // Load availability for the current date with the new event type
                this.loadAvailability();
            }
        } catch (error) {
            console.error('Failed to load event types:', error);
        }
    }
    
    async loadAvailability() {
        if (!this.eventTypeId) return;
        
        // Format date as YYYY-MM-DD
        const dateString = this.selectedDate.toISOString().split('T')[0];
        
        try {
            const url = `cal_api.php?action=availability&event_type_id=${this.eventTypeId}&date=${dateString}&timezone=${this.timeZone}`;
            const response = await fetch(url);
            const data = await response.json();
            
            if (data.error) {
                console.error('Error loading availability:', data.error);
                this.availableSlots = [];
            } else {
                this.availableSlots = data.slots || [];
            }
            
            // Render the time slots
            this.renderTimeSlots();
        } catch (error) {
            console.error('Failed to load availability:', error);
            this.availableSlots = [];
            this.renderTimeSlots();
        }
    }
    
    async createBooking(bookingData) {
        try {
            const response = await fetch('cal_api.php?action=create_booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(bookingData)
            });
            
            const data = await response.json();
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            return data;
        } catch (error) {
            console.error('Booking creation failed:', error);
            throw error;
        }
    }
}

// Initialize the scheduler when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const calScheduler = new CalScheduler(CAL_CONFIG);
}); 