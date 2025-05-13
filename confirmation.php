<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmed - Weight Loss Mentorship</title>
    <meta name="description" content="Your appointment for the weight loss mentorship program has been confirmed.">
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
            display: flex;
            flex-direction: column;
            gap: var(--space-5);
            max-width: 800px;
            padding: 0 1.5rem;
        }

        /* Video */
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            background-color: var(--card-bg);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
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

        /* Meeting Details */
        .meeting-details {
            margin: var(--space-3) 0;
            display: flex;
            flex-direction: column;
            gap: var(--space-2);
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            text-align: left;
        }

        .detail-icon {
            width: 20px;
            color: var(--text-secondary);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .detail-text {
            color: var(--text);
            font-size: 0.875rem;
        }
        
        .detail-title {
            font-weight: 600;
            color: var(--text);
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
                padding: 0 0var(--space-4) 0; 
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
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="form-wrapper">
                <div class="progress-bar-container">
                    <div class="progress-bar-step active"></div>
                    <div class="progress-bar-step active"></div>
                    <div class="progress-bar-step active"></div>
                </div>
                <div class="form-title">Your Call Is Confirmed</div>
                <p class="form-subtitle">You’ll get a calendar invite by email. Watch the video so you know what to expect.</p>
            </div>
            
            <div class="video-container">
                <script src="https://fast.wistia.com/player.js" async></script><script src="https://fast.wistia.com/embed/qffyp793v0.js" async type="module"></script><style>wistia-player[media-id='qffyp793v0']:not(:defined) { background: center / contain no-repeat url('https://fast.wistia.com/embed/medias/qffyp793v0/swatch'); display: block; filter: blur(5px); padding-top:56.25%; }</style> <wistia-player media-id="qffyp793v0" seo="false" aspect="1.7777777777777777"></wistia-player>
            </div>

            <div class="confirmation-wrapper">
                <div class="meeting-details">
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="detail-text">
                            <div class="detail-title">30-Minute Strategy Call</div>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="far fa-calendar"></i>
                        </div>
                        <div class="detail-text">
                            <div class="detail-title" id="meeting-date">Thursday, August 8, 2024</div>
                            <div id="meeting-time">3:00pm - 3:30pm</div>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="detail-text" id="timezone">America/New York</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="detail-text">
                            <div>Google Meet</div>
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
            // Get URL parameters (you would normally get these from your booking system)
            const urlParams = new URLSearchParams(window.location.search);
            const date = urlParams.get('date') || 'Thursday, August 8, 2024';
            const time = urlParams.get('time') || '3:00pm - 3:30pm';
            const userTimezone = urlParams.get('timezone') || Intl.DateTimeFormat().resolvedOptions().timeZone.replace('_', ' ');
            
            // Update DOM with booking details
            document.getElementById('meeting-date').textContent = date;
            document.getElementById('meeting-time').textContent = time;
            document.getElementById('timezone').textContent = userTimezone;
        });
    </script>
</body>
</html> 