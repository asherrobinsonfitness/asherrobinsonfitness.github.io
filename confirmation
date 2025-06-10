<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Appointment Confirmed - Weight Loss Mentorship</title>
    <meta name="description" content="Your appointment for the weight loss mentorship program has been confirmed.">
    <meta name="robots" content="index, follow">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="stylesheet" href="global.css">
    <style>
        /* Simple 8-point spacing system */
        :root {
            --space-1: 8px;
            /* 0.5rem */
            --space-2: 16px;
            /* 1rem */
            --space-3: 24px;
            /* 1.5rem */
            --space-4: 32px;
            /* 2rem */
            --space-5: 40px;
            /* 2.5rem */
            --space-6: 48px;
            /* 3rem */

            /* Light mode colors */
            --primary: #1877F2;
            --background: #f8f9fa;
            --text: #222222;
            --text-secondary: #717171;
            --border: #c1c7cd;
            --card-bg: #fff;
            --error: #ff3b30;
            --success: #4cd964;
            --calendar-day-hover: #F0F9FF;
            --calendar-border: #E5E7EB;
            --divider: #E8EAED;
            --premium-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
            --card-hover-shadow: 0 14px 40px rgba(0, 0, 0, 0.1);
            --gradient-1: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
            --gradient-2: linear-gradient(90deg, #ee0979 0%, #9733ee 100%);
            --gradient-3: linear-gradient(90deg, #9733ee 0%, #00c6ff 100%);
            --progress-inactive: #e0e0e0;
            
            /* Video aspect ratios */
            --mobile-video-ratio: 80%;
            /* 5:4 aspect ratio (4/5 = 0.8 = 80%) */
            --desktop-video-ratio: 54.05%;
            /* 1.85:1 aspect ratio (1/1.85 = 0.5405 = 54.05%) */
            
            /* Premium styling variables */
            --premium-transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);

            /* Base font size */
            font-size: 16px;
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
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes borderReveal {
            from {
                clip-path: inset(5% 5% 5% 5% round 15px);
            }

            to {
                clip-path: inset(0% 0% 0% 0% round 14px);
            }
        }

        @keyframes desktopBorderReveal {
            from {
                clip-path: inset(5% 5% 5% 5% round 11px);
            }

            to {
                clip-path: inset(0% 0% 0% 0% round 10px);
            }
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: var(--space-4) 0 var(--space-6) 0;
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

        .inner-content {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        
        .video-details-wrapper {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: var(--space-3);
        }

        /* Video */
        .video-container {
            position: relative;
            padding-bottom: var(--mobile-video-ratio);
            height: 0;
            overflow: hidden;
            border-radius: 14px;
            box-shadow: var(--premium-shadow);
            background-color: #000;
            background-image: url('video-thumb-optimized.png');
            background-size: cover;
            background-position: center;
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            cursor: pointer;
            transition: var(--premium-transition);
            border: 1px solid var(--border);
            animation: borderReveal 0.5s ease-out forwards;
            transform: none;
        }

        .video-container:hover {
            transform: none;
            box-shadow: var(--card-hover-shadow);
        }

        .video-container video,
        .video-container iframe,
        .video-container wistia-player {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
            object-fit: cover;
            transform: none;
        }

        .video-thumbnail {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            z-index: 2;
        }

        .video-container.playing .video-thumbnail {
            display: none;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 999px;
            z-index: 3;
            display: flex;
            align-items: center;
            padding: 5px 7px 5px 20px;
            color: white;
            font-weight: 500;
            font-size: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            white-space: nowrap;
            width: auto;
            transition: background-color 0.2s;
        }

        .video-container:hover .play-button {
            background-color: rgba(0, 0, 0, 0.75);
        }

        .play-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            background-color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 14px;
            margin-right: 0;
        }

        .play-icon svg {
            width: 22px;
            height: 22px;
            fill: #333;
            margin-left: 0;
            position: relative;
            transform: none;
        }

        .video-container.playing .play-button {
            display: none;
        }

        /* Video styles for proper display */
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
            object-fit: cover;
        }

        /* Initial video states */
        .video-container #mainVideo {
            display: none;
            z-index: 3; /* Ensure main video is above other elements */
        }

        /* Ensure video controls are visible and not obstructed */
        video::-webkit-media-controls-panel {
            display: flex !important;
            opacity: 1 !important;
        }

        video::-webkit-media-controls {
            display: flex !important;
        }

        .video-container.playing #previewVideo {
            display: none;
        }

        .video-container.playing #mainVideo {
            display: block;
        }

        /* Hide play button when playing */
        .video-container.playing .play-button {
            display: none !important;
            z-index: -1;
            opacity: 0;
            pointer-events: none;
        }

        /* Confirmation Section */
        .confirmation-wrapper {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            padding-top: var(--space-2);
        }

        .confirmation-header-text {
            margin-bottom: var(--space-3);
            text-align: center;
        }

        .confirmation-title {
            color: var(--text);
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: var(--space-1);
            text-align: center;
            line-height: 1.2;
        }

        .confirmation-subtitle {
            color: var(--text);
            font-size: 1rem;
            text-align: center;
            line-height: 1.4;
        }

        /* Form header */
        .form-wrapper {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            background-color: transparent;
            padding: var(--space-2) 0;
        }

        .form-title {
            color: var(--text);
            font-weight: 700;
            font-size: 1.125rem;
            line-height: 1.2;
            padding: 0;
            background-color: transparent;
            text-align: left;
            margin-bottom: var(--space-1);
            animation: fadeIn 0.5s ease-out forwards;
        }

        .form-subtitle {
            color: var(--text);
            font-size: 1.125rem;
            margin-bottom: var(--space-3);
            line-height: 1.4;
            text-align: left;
            animation: fadeIn 0.6s ease-out forwards;
        }

        /* Meeting Details - styled like benefits widget */
        .meeting-details {
            background-color: var(--card-bg);
            border-radius: 14px;
            padding: 12px 0;
            max-width: 450px;
            margin: 0 auto;
            border: 1px solid var(--border);
            box-shadow: var(--premium-shadow);
            transition: var(--premium-transition);
            display: flex;
            justify-content: space-between;
        }

        .meeting-details:hover {
            box-shadow: var(--card-hover-shadow);
        }

        .detail-item {
            flex: 1;
            text-align: center;
            padding: 0 12px;
            position: relative;
        }

        .detail-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1px;
            background-color: var(--divider);
        }

        .detail-icon {
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
        }

        .detail-icon i {
            font-size: 28px;
            color: var(--text-secondary);
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            transition: transform 0.2s;
        }

        .detail-item:hover .detail-icon i {
            transform: translateY(-2px);
        }

        .detail-text {
            font-size: 0.75rem;
            line-height: 1.3;
            color: var(--text);
            max-width: 160px;
            margin: 0 auto;
        }

        .detail-title {
            font-weight: 600;
            color: var(--text);
            margin-bottom: 2px;
        }

        /* FAQ Section Styles */
        .faq-section {
            width: 100%;
            max-width: 650px;
            margin: var(--space-4) auto 0;
        }

        .faq-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: var(--space-3);
            text-align: left;
        }

        .faq-grid {
            display: flex;
            flex-direction: column;
        }

        .faq-item {
            border-bottom: 1px solid var(--border);
        }

        .faq-question {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text);
            padding: var(--space-2) 0;
            margin: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            user-select: none;
            text-align: left;
        }

        .faq-question::after {
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            transition: transform 0.3s ease;
            color: var(--text-secondary);
        }

        .faq-item.active .faq-question::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            font-size: 0.9375rem;
            color: var(--text-secondary);
            line-height: 1.5;
            padding: 0 0 var(--space-2);
            margin: 0;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease-out;
            opacity: 0;
            text-align: left;
        }

        .faq-item.active .faq-answer {
            max-height: 1000px;
            opacity: 1;
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

        /* Mobile Styles */
        @media(max-width:768px) {
            .container {
                padding: var(--space-3) 0 var(--space-4) 0;
            }

            .content {
                gap: var(--space-4);
                padding: 0 1.25rem;
            }

            .confirmation-title {
                font-size: 1.125rem;
            }

            .confirmation-subtitle {
                font-size: 0.875rem;
            }

            .disclaimer {
                font-size: 0.7rem;
            }

            .form-title {
                font-size: 1rem;
            }

            .form-subtitle {
                font-size: 0.875rem;
            }

            .faq-section {
                margin: var(--space-3) auto 0;
            }

            .faq-title {
                font-size: 1rem;
            }

            .faq-question {
                font-size: 0.9375rem;
            }

            .faq-answer {
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="inner-content">
                <div class="form-wrapper">
                    <div class="form-title">Your Call Is Confirmed</div>
                    <p class="form-subtitle">Watch the video to fully prepared for our call. Then check your email for the calendar invite so you're able to join.</p>
                </div>

                <div class="video-details-wrapper">
                    <div class="video-container" id="videoContainer">
                        <div class="play-button" id="playButton">
                            Watch the video
                            <div class="play-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z" fill-rule="evenodd" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <video id="previewVideo" class="video-thumbnail" playsinline muted loop autoplay>
                            <source src="video.mp4" type="video/mp4">
                        </video>
                        <video id="mainVideo" controls playsinline>
                            <source src="video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="meeting-details">
                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="detail-text">
                                <div class="detail-title">Strategy Call</div>
                                30 minutes
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div class="detail-text">
                                <div class="detail-title" id="booking-date">Thursday, August 8, 2024</div>
                                <div id="booking-time">3:00pm - 3:30pm</div>
                            </div>
                        </div>

                        <div class="detail-item">
                            <div class="detail-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="detail-text">
                                <div class="detail-title">Timezone</div>
                                <div id="booking-timezone">America/New York</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="faq-section">
                    <h2 class="faq-title">Common Questions</h2>
                    <div class="faq-grid">
                        <div class="faq-item">
                            <h3 class="faq-question">What kind of results can I expect?</h3>
                            <p class="faq-answer">Most people lose 1-2 pounds per week when following the plan. You'll learn how to eat better, exercise properly, and keep the weight off long-term. I've helped hundreds of people do this successfully.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3 class="faq-question">How is this different from other programs?</h3>
                            <p class="faq-answer">Everything is customized for you - your meal plan, workouts, and check-ins. No generic plans or cookie-cutter approaches. I work with you directly to make sure you're getting results and adjust things when needed.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3 class="faq-question">I've failed at diets before - why would this work?</h3>
                            <p class="faq-answer">Most diets fail because they're too strict and don't fit your life. I'll help you create a plan that works with your schedule and food preferences. When things get tough, I'm here to help you adjust and stay on track.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3 class="faq-question">What's included in the 6 weeks?</h3>
                            <p class="faq-answer">You get: 1) A meal plan with foods you like, 2) Workouts that fit your schedule and equipment, 3) Weekly check-ins to track progress, 4) Direct access to me for questions, 5) Form checks for exercises, 6) Tips for eating out and social events.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3 class="faq-question">Can I see client results?</h3>
                            <p class="faq-answer">Yes - during our call, I'll show you real results from people who started where you are. You'll see their exact progress and how long it took them.</p>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">What's the cost?</h3>
                            <p class="faq-answer">It's $599 total - that covers everything with no hidden fees. I don't offer payment plans, but I do offer a 30-day money-back guarantee if you're not happy.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3 class="faq-question">Do I need to decide right after the call?</h3>
                            <p class="faq-answer">No pressure at all. The call is just to see if we're a good fit. Take your time to think about it. If you do join, we can start right away.</p>
                        </div>
                        
                        <div class="faq-item">
                            <h3 class="faq-question">How much time do I need each week?</h3>
                            <p class="faq-answer">Most people spend 3-4 hours on workouts (split into shorter sessions) plus some meal prep time. Weekly check-ins take 15 minutes. The key is being consistent, not spending hours in the gym.</p>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">What if I travel a lot?</h3>
                            <p class="faq-answer">The program adapts to your schedule. I'll give you quick workouts and tips for eating out. Many of my clients travel for work - we make it work.</p>
                        </div>

                        <div class="faq-item">
                            <h3 class="faq-question">What happens after 6 weeks?</h3>
                            <p class="faq-answer">You'll have the tools to keep going on your own. If you want more support, we can do monthly check-ins or extend the coaching. We'll discuss options near the end if you're interested.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" defer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get URL parameters (you would normally get these from your booking system)
            const params = new URLSearchParams(window.location.search);
            const bookingId = params.get('booking_id');
            const date = params.get('date');
            const time = params.get('time');
            const timezone = params.get('timezone');
            
            // Update DOM with booking details
            const bookingDateEl = document.getElementById('booking-date');
            const bookingTimeEl = document.getElementById('booking-time');
            const bookingTzEl = document.getElementById('booking-timezone');
            
            // Function to get booking details from localStorage or URL parameters
            function getBookingDetails() {
                // First try to get from localStorage (from our new booking system)
                const pendingBooking = localStorage.getItem('pendingBooking');
                if (pendingBooking) {
                    try {
                        const bookingData = JSON.parse(pendingBooking);
                        
                        if (bookingDateEl && bookingData.date) {
                            bookingDateEl.textContent = bookingData.date;
                        }
                        
                        if (bookingTimeEl && bookingData.time) {
                            // Format time to show duration (assuming 30-minute slots)
                            const startTime = bookingData.time;
                            const endTime = addMinutesToTime(startTime, 30);
                            bookingTimeEl.textContent = `${startTime} - ${endTime}`;
                        }
                        
                        if (bookingTzEl && bookingData.timezone) {
                            bookingTzEl.textContent = bookingData.timezone.replace('_', ' ');
                        }
                        
                        // Clear the pending booking from localStorage
                        localStorage.removeItem('pendingBooking');
                        return;
                    } catch (error) {
                        console.error('Error parsing booking data from localStorage:', error);
                    }
                }
                
                // Fallback to URL parameters
                if (bookingDateEl && date) {
                    bookingDateEl.textContent = date;
                }
                
                if (bookingTimeEl && time) {
                    // Format time to show duration (assuming 30-minute slots)
                    const endTime = addMinutesToTime(time, 30);
                    bookingTimeEl.textContent = `${time} - ${endTime}`;
                }
                
                if (bookingTzEl && timezone) {
                    bookingTzEl.textContent = timezone.replace('_', ' ');
                }
            }
            
            // Helper function to add minutes to a time string
            function addMinutesToTime(timeStr, minutes) {
                // Parse time string like "3:00pm"
                const match = timeStr.match(/(\d{1,2}):(\d{2})(am|pm)/i);
                if (!match) return timeStr;
                
                let hours = parseInt(match[1]);
                const mins = parseInt(match[2]);
                const period = match[3].toLowerCase();
                
                // Convert to 24-hour format
                if (period === 'pm' && hours !== 12) {
                    hours += 12;
                } else if (period === 'am' && hours === 12) {
                    hours = 0;
                }
                
                // Add minutes
                const totalMinutes = hours * 60 + mins + minutes;
                const newHours = Math.floor(totalMinutes / 60) % 24;
                const newMins = totalMinutes % 60;
                
                // Convert back to 12-hour format
                let displayHours = newHours;
                let newPeriod = 'am';
                
                if (newHours === 0) {
                    displayHours = 12;
                } else if (newHours === 12) {
                    newPeriod = 'pm';
                } else if (newHours > 12) {
                    displayHours = newHours - 12;
                    newPeriod = 'pm';
                }
                
                return `${displayHours}:${newMins.toString().padStart(2, '0')}${newPeriod}`;
            }
            
            // Call the function to get booking details
            getBookingDetails();
            
            // Video playback control - ensure this still works with our changes
            const videoContainer = document.querySelector('.video-container');
            const videoThumbnail = document.querySelector('.video-thumbnail');
            const videoElement = document.querySelector('.video-element');
            
            if (videoContainer && videoElement) {
                videoContainer.addEventListener('click', function() {
                    if (videoThumbnail) {
                        videoThumbnail.style.display = 'none';
                    }
                    
                    if (videoElement.paused) {
                        videoElement.play();
                    } else {
                        videoElement.pause();
                    }
                });
            }
            
            // FAQ functionality
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all other FAQs
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Toggle current FAQ
                    item.classList.toggle('active');
                });
            });
        });
    </script>
</body>

</html>
