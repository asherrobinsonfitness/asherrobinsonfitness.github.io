<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>6-Week Online Weight Loss Mentorship</title>
    <meta name="description" content="Join our 6-week online weight loss mentorship program. We'll fix your diet, training, and supplementation without making it suck.">
    <meta name="robots" content="index, follow">
    <meta name="format-detection" content="telephone=yes">
    <meta name="instagram:lead" content="true">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preload" as="image" href="video-thumb-optimized.png" fetchpriority="high">
    <link rel="stylesheet" href="global.css">
    <style>
        /* Simple 8-point spacing system */
        :root {
            --space-1: 0.5rem;
            /* 8px */
            --space-2: 1rem;
            /* 16px */
            --space-3: 1.5rem;
            /* 24px */
            --space-4: 2rem;
            /* 32px */
            --space-5: 2.5rem;
            /* 40px */
            --space-6: 3rem;
            /* 48px */
            --form-gap: 1rem;
            /* Consistent form spacing */

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
            --progress-inactive: #e0e0e0;
            
            /* Gradients for progress bars */
            --gradient-1: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
            --gradient-2: linear-gradient(90deg, #ee0979 0%, #9733ee 100%);
            --gradient-3: linear-gradient(90deg, #9733ee 0%, #00c6ff 100%);
            
            /* Calendar specific colors */
            --nav-hover: #F0F9FF;
            --weekday-text: #6B7280;
            --time-dot: #4cd964;
            
            /* Base font size */
            font-size: 16px;
            
            /* Video aspect ratios */
            --mobile-video-ratio: 80%;
            /* 5:4 aspect ratio (4/5 = 0.8 = 80%) */
            --desktop-video-ratio: 54.05%;
            /* 1.85:1 aspect ratio (1/1.85 = 0.5405 = 54.05%) */
            
            /* Premium styling variables */
            --premium-transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
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
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: var(--space-6) 0 var(--space-6);
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

        .content {
            margin: 0 auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: var(--space-5);
            max-width: 800px;
            padding: 0 1.5rem;
        }

        .header-group {
            animation: fadeIn 0.5s ease-out forwards;
            margin-bottom: var(--space-2);
        }

        /* Hide desktop elements by default (mobile-first) */
        .desktop-layout {
            display: none;
        }

        /* Header */
        .headline {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: var(--space-2);
            letter-spacing: -0.015em;
            color: var(--text);
        }

        .subheadline {
            font-size: 1.25rem;
            color: var(--text-secondary);
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.5;
            font-weight: 500;
            letter-spacing: -0.005em;
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

        /* Pricing Info */
        .pricing-card {
            background-color: var(--card-bg);
            border-radius: 14px;
            padding: 12px 0;
            max-width: 650px;
            margin: 0 auto var(--space-1);
            border: 1px solid var(--border);
            box-shadow: var(--premium-shadow);
            transition: var(--premium-transition);
        }

        .pricing-card:hover {
            box-shadow: var(--card-hover-shadow);
        }

        .price-tag {
            background-color: #FFEC3D;
            color: #202124;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 4px;
            font-size: 0.75rem;
            margin: 0 auto;
            display: table;
        }

        .price-container {
            text-align: center;
            margin: 12px 0 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .old-price {
            color: #9AA0A6;
            font-size: 1.5rem;
            font-weight: 500;
            text-decoration: line-through;
            margin-right: 8px;
        }

        .price-wrapper {
            display: flex;
            align-items: baseline;
        }

        .current-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: #202124;
            line-height: 1;
        }

        .price-period {
            font-size: 0.875rem;
            font-weight: 700;
            color: #202124;
            margin-left: 2px;
        }

        .price-divider {
            height: 1px;
            background-color: var(--divider);
            margin: 8px 0 12px;
        }

        .benefits-container {
            display: flex;
            justify-content: space-between;
            padding: 0;
        }

        .benefit-item {
            flex: 1;
            text-align: center;
            padding: 0 12px;
            position: relative;
        }

        .benefit-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 15%;
            height: 70%;
            width: 1px;
            background-color: var(--divider);
        }

        .benefit-icon {
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
        }

        .benefit-icon img {
            height: 28px;
            width: auto;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            transition: transform 0.2s;
        }

        .benefit-item:hover .benefit-icon img {
            transform: translateY(-2px);
        }

        .benefit-text {
            font-size: 0.75rem;
            line-height: 1.3;
            color: var(--text);
            max-width: 160px;
            margin: 0 auto;
        }

        /* Contact Form Styles */
        .form-wrapper {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            position: relative;
            padding-top: var(--space-4);
        }

        .form-divider {
            width: 100%;
            height: 1px;
            background-color: #000;
            margin-bottom: var(--space-4);
            position: relative;
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

        .contact-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: var(--form-gap);
        }

        /* Form with floating labels */
        .form-group,
        .name-field {
            position: relative;
        }

        .name-row {
            display: flex;
            gap: var(--form-gap);
            width: 100%;
        }

        .name-field {
            flex: 1;
        }

        .form-input {
            width: 100%;
            padding: 24px 14px 8px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 1.125rem;
            color: var(--text);
            background-color: var(--card-bg);
            height: 56px;
            transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
            appearance: none;
            /* Remove browser styling */
            -webkit-appearance: none;
        }

        .form-input::placeholder {
            color: transparent;
        }

        .form-label {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-size: 16px;
            pointer-events: none;
            transition: transform 0.2s, top 0.2s;
            transform-origin: 0 0;
            background-color: transparent;
            line-height: 1;
            padding: 0 2px;
        }

        /* When input is focused or has content */
        .form-input:focus~.form-label,
        .form-input:not(:placeholder-shown)~.form-label,
        .form-input:-webkit-autofill~.form-label {
            top: 8px;
            transform: translateY(0) scale(0.75);
            color: var(--text-secondary);
            background-color: var(--card-bg);
            padding: 0 4px;
            margin-left: -2px;
        }

        /* Instagram autofill styling support */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px var(--card-bg) inset !important;
            -webkit-text-fill-color: var(--text) !important;
            caret-color: var(--text);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.15);
            transform: translateY(-1px);
        }

        .submit-button {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: var(--space-2) 0;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.25s ease;
            margin-top: var(--space-1);
            position: relative;
            overflow: hidden;
        }

        .submit-button:hover {
            background-color: #166FE5;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(24, 119, 242, 0.25);
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

        /* Validation and error states */
        .validation-mark {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            background-color: var(--success);
            font-size: 10px;
            font-weight: bold;
            opacity: 0;
            transition: opacity 0.2s;
            z-index: 1;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-input.valid:not(:focus)~.validation-mark {
            opacity: 1;
        }

        .form-input.error {
            border-color: var(--error);
        }

        .form-input.error~.form-label {
            color: var(--error);
        }

        .error-message {
            color: var(--error);
            font-size: 0.75rem;
            display: none;
            text-align: left;
            padding-left: 2px;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            line-height: 1.2;
        }

        .form-input.error~.error-message {
            display: block;
        }

        /* Mobile Styles (specific adjustments for small screens) */
        @media(max-width:768px) {
            .container {
                padding: var(--space-4) 0 var(--space-6);
            }

            .content {
                gap: var(--space-4);
                padding: 0 1.25rem;
            }

            /* Ensure desktop layout is hidden */
            .desktop-layout {
                display: none;
            }

            /* Show mobile layout */
            .mobile-layout {
                display: block;
            }

            .headline {
                font-size: 1.875rem;
            }

            .subheadline {
                font-size: 1rem;
            }

            .price-container {
                margin: 10px 0 6px;
            }

            .old-price {
                font-size: 1.25rem;
                margin-right: 6px;
            }

            .current-price {
                font-size: 1.5rem;
            }

            .price-period {
                font-size: 0.75rem;
            }

            .price-tag {
                padding: 2px 10px;
                font-size: 0.6875rem;
            }

            .price-divider {
                margin: 6px 0 10px;
            }

            .benefit-icon {
                font-size: 0.875rem;
                margin-bottom: 4px;
            }

            .benefit-text {
                font-size: 0.6875rem;
                line-height: 1.2;
                max-width: 100%;
            }

            .form-title {
                font-size: 1rem;
            }

            .form-subtitle {
                font-size: 0.875rem;
            }

            .name-row {
                flex-direction: row;
                gap: var(--form-gap);
            }

            .form-input {
                padding: 24px 12px 8px;
                font-size: 1rem;
                height: 52px;
            }

            .form-label {
                font-size: 1rem;
                top: 50%;
                left: 12px;
                line-height: 1;
                transform: translateY(-50%);
            }

            .form-input:focus~.form-label,
            .form-input:not(:placeholder-shown)~.form-label {
                top: 8px;
                transform: translateY(0) scale(0.75);
                background-color: var(--card-bg);
                padding: 0 4px;
                margin-left: -2px;
            }

            .error-message {
                top: 56px;
            }

            .disclaimer {
                font-size: 0.7rem;
            }
        }

        /* Desktop split layout (Qoves-style) */
        @media(min-width:769px) {

            /* Base font size adjustment for desktop */
            :root {
                font-size: 16px;
            }

            /* Hide mobile layout */
            .mobile-layout {
                display: none;
            }

            /* Show desktop layout */
            .desktop-layout {
                display: flex;
                flex-direction: column;
                width: 100%;
                min-height: 100vh;
                overflow-x: hidden;
                background-color: var(--background);
            }
            
            /* New centered header section */
            .desktop-header-section {
                width: 100%;
                padding: 6rem 2rem 4rem;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            
            .desktop-header {
                max-width: 960px;
                margin: 0 auto;
                text-align: center;
                animation: fadeIn 0.5s ease-out forwards;
            }

            .desktop-headline {
                font-size: 2.375rem;
                font-weight: 700;
                line-height: 1.2;
                margin-bottom: 1rem;
                text-align: center;
                color: var(--text);
                letter-spacing: -0.015em;
            }

            .desktop-subheadline {
                font-size: 1.25rem;
                line-height: 1.5;
                color: var(--text-secondary);
                text-align: center;
                max-width: 820px;
                margin: 0 auto;
                letter-spacing: -0.005em;
                font-weight: 500;
            }
            
            /* Content section with video on left and form on right */
            .desktop-content-section {
                display: flex;
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem 6rem;
            }
            
            .left-column {
                width: 62%;
                padding: 0 2rem 0 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
            }

            .right-column {
                width: 38%;
                padding: 0 0 0 2rem;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
            }

            .desktop-content {
                width: 100%;
                max-width: 560px;
            }
            
            /* Container for the form with fixed height matching video */
            .form-container {
                width: 100%;
                height: 0;
                padding-bottom: calc(var(--desktop-video-ratio) + 9.2%); /* Match video height plus benefits row */
                position: relative;
                background-color: var(--card-bg);
                border-radius: 10px;
                border: 1px solid #e1e4e8;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                overflow: hidden;
            }
            
            .desktop-layout .form-wrapper {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                padding: 1.25rem;
                margin: 0;
                border: none;
                box-shadow: none;
                transform-origin: top center;
                transform: scale(0.85);
                background-color: transparent;
                border-radius: 0;
                height: 100%;
                overflow: hidden;
                display: flex;
                flex-direction: column;
            }
            
            .desktop-layout .contact-form {
                flex: 1;
                display: flex;
                flex-direction: column;
            }
            
            .desktop-layout .fine-print {
                font-size: 0.65rem;
                line-height: 1.25;
                margin-top: 0.5rem;
            }
            
            .desktop-layout .fine-print p {
                margin-bottom: 0.25rem;
            }
            
            .desktop-layout .submit-button {
                padding: 0.75rem 0;
                margin-top: 0.375rem;
            }
            
            .desktop-layout .play-button {
                padding: 6px 10px 6px 22px;
                font-size: 1rem;
                background-color: rgba(0, 0, 0, 0.7);
                box-shadow: 0 3px 12px rgba(0, 0, 0, 0.25);
                border-radius: 999px;
                font-weight: 500;
                transition: background-color 0.2s;
            }
            
            .desktop-layout .video-container:hover .play-button,
            .desktop-layout .desktop-video-container:hover .play-button {
                background-color: rgba(0, 0, 0, 0.75);
            }
            
            .desktop-layout .play-icon {
                width: 36px;
                height: 36px;
                min-width: 36px;
                margin-left: 14px;
                background-color: white;
                border-radius: 50%;
            }
            
            .desktop-layout .play-icon svg {
                width: 22px;
                height: 22px;
                fill: #333;
            }

            .desktop-video-container {
                position: relative;
                padding-bottom: var(--desktop-video-ratio);
                height: 0;
                overflow: hidden;
                border-radius: 10px;
                box-shadow: var(--premium-shadow);
                background-color: #000;
                background-image: url('video-thumb-optimized.png');
                background-size: cover;
                background-position: center;
                width: 100%;
                cursor: pointer;
                z-index: 1;
                transition: var(--premium-transition);
                border: 1px solid var(--border);
                animation: desktopBorderReveal 0.5s ease-out forwards;
                transform: none;
            }

            .desktop-video-container:hover {
                transform: none;
                box-shadow: var(--card-hover-shadow);
            }

            .desktop-video-container video,
            .desktop-video-container iframe,
            .desktop-video-container wistia-player {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: none;
                border-radius: 8px;
                object-fit: cover;
                transform: none;
            }

            .desktop-benefits-container {
                display: flex;
                width: 100%;
                margin-top: var(--space-3);
                display: flex;
                flex-direction: row;
                background-color: white;
                border-radius: 10px;
                border: 1px solid var(--border);
                padding: 0.8rem 0;
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
            }

            .desktop-benefit-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                flex: 1;
                padding: 0 0.6rem;
                position: relative;
                text-align: center;
            }

            .desktop-benefit-item:not(:last-child)::after {
                content: '';
                position: absolute;
                right: 0;
                top: 20%;
                height: 60%;
                width: 1px;
                background-color: #E8EAED;
            }

            .desktop-benefit-item .benefit-icon {
                margin-bottom: 0.8rem;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 36px;
            }

            .desktop-benefit-item .benefit-icon img {
                height: 24px;
                width: auto;
                filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
                transition: transform 0.2s;
            }

            .desktop-benefit-item:hover .benefit-icon img {
                transform: translateY(-2px);
            }

            .desktop-benefit-item .benefit-text {
                font-size: 0.75rem;
                line-height: 1.3;
                color: var(--text);
                max-width: 90%;
                margin: 0 auto;
            }

            .desktop-layout .progress-bar-container {
                width: 100%;
                margin-bottom: 0.75rem;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 0.5rem;
            }
            
            .desktop-layout .progress-bar-step {
                flex: 1;
                height: 4px;
                border-radius: 2px;
                background: var(--progress-inactive);
                overflow: hidden;
            }
            
            .desktop-layout .progress-bar-step.active {
                background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
            }
            
            .desktop-layout .form-title {
                font-size: 1rem;
                margin-bottom: 0.375rem;
                font-weight: 700;
                text-align: left;
                color: var(--text);
            }
            
            .desktop-layout .form-subtitle {
                font-size: 0.85rem;
                margin-bottom: 0.75rem;
                line-height: 1.3;
                color: var(--text-secondary);
            }
            
            .desktop-layout .form-input {
                height: 44px;
                padding: 20px 14px 8px;
                font-size: 0.9rem;
                border-radius: 8px;
            }
            
            .desktop-layout .form-label {
                font-size: 0.9rem;
                left: 14px;
            }
            
            .desktop-layout .form-group {
                margin-bottom: 0.75rem;
            }
            
            .desktop-layout .name-row {
                margin-bottom: 0.75rem;
                display: flex;
                flex-direction: row;
                gap: 0.75rem;
            }
            
            .desktop-layout .submit-button {
                padding: 0.75rem 0;
                margin-top: 0.375rem;
                font-size: 0.9rem;
                background-color: var(--primary);
                transition: background-color 0.2s;
                font-weight: 600;
                border-radius: 6px;
            }
            
            .desktop-layout .submit-button:hover {
                background-color: #166FE5;
                transform: none;
                box-shadow: none;
            }

            /* Desktop Calendar Widget Styles from calendar.php */
            .desktop-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                padding: 2rem 0 var(--space-6);
            }
            
            /* Sticky progress bar at top */
            .desktop-progress-container {
                position: sticky;
                top: 0;
                width: 100%;
                background-color: var(--background);
                padding: 1.5rem 0 2.5rem;
                z-index: 100;
            }
            
            .desktop-progress-bar-container {
                width: 100%;
                max-width: 900px;
                margin: 0 auto;
                display: flex;
                gap: 0.5rem;
            }
            
            .desktop-progress-bar-step {
                flex: 1;
                height: 4px;
                border-radius: 2px;
                background: var(--progress-inactive);
                overflow: hidden;
            }
            
            .desktop-progress-bar-step.active:nth-child(1) {
                background: var(--gradient-1);
            }
            
            .desktop-progress-bar-step.active:nth-child(2) {
                background: var(--gradient-2);
            }
            
            .desktop-progress-bar-step.active:nth-child(3) {
                background: var(--gradient-3);
            }

            /* Main calendar widget */
            .desktop-calendar-widget {
                max-width: 900px;
                width: 90%;
                margin: 0 auto;
                background: white;
                border-radius: 12px;
                box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
                border: 1px solid #e1e4e8;
                display: flex;
            }
            
            /* Left section - Details and header */
            .desktop-info-section {
                flex: 0 0 280px;
                padding: 2.5rem 2rem;
                border-right: 1px solid #eaeaea;
            }
            
            .desktop-header-text {
                margin-bottom: 1.5rem;
                animation: fadeIn 0.5s ease-out forwards;
            }
            
            .desktop-title {
                color: var(--text);
                font-weight: 700;
                font-size: 1.3rem;
                margin-bottom: 0.5rem;
                line-height: 1.2;
                animation: fadeIn 0.5s ease-out forwards;
            }
            
            .desktop-subtitle {
                color: var(--text-secondary);
                font-size: 0.9rem;
                line-height: 1.4;
                margin-bottom: 0;
                animation: fadeIn 0.6s ease-out forwards;
            }
            
            .desktop-event-details {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            
            .desktop-event-detail {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                color: var(--text);
                font-size: 0.9rem;
            }
            
            .desktop-event-detail i {
                color: #6B7280;
                width: 18px;
                text-align: center;
            }
            
            .desktop-coach-profile {
                display: flex;
                align-items: center;
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #eaeaea;
            }
            
            .desktop-coach-avatar {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                overflow: hidden;
                margin-right: 0.75rem;
                background-color: #E8EAED;
            }
            
            .desktop-coach-avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .desktop-coach-info {
                text-align: left;
            }
            
            .desktop-coach-label {
                font-size: 0.75rem;
                color: var(--text-secondary);
                margin-bottom: 2px;
            }
            
            .desktop-coach-name {
                font-size: 1rem;
                font-weight: 700;
                color: var(--text);
                line-height: 1.2;
            }
            
            /* Middle section - Month calendar */
            .desktop-calendar-section {
                flex: 0 0 380px;
                padding: 2rem;
                border-right: 1px solid #eaeaea;
            }
            
            .desktop-calendar-header {
                padding-bottom: 1.5rem;
            }
            
            .desktop-month-nav {
                display: flex;
                align-items: center;
                color: var(--text);
                width: 100%;
                justify-content: space-between;
            }
            
            .desktop-month-title {
                font-size: 1.2rem;
                font-weight: 700;
                color: var(--text);
                display: flex;
                align-items: center;
            }
            
            .desktop-month-title span {
                color: #6B7280;
                font-weight: normal;
                margin-left: 8px;
                font-size: 1rem;
            }
            
            .desktop-nav-button {
                background: transparent;
                border: none;
                color: var(--text-secondary);
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.2s ease;
            }
            
            .desktop-nav-button:hover {
                background: var(--nav-hover);
                color: var(--text);
            }
            
            .desktop-weekdays {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                text-align: center;
                font-weight: 600;
                color: var(--weekday-text);
                font-size: 0.8rem;
                padding: 0.75rem 0;
            }
            
            .desktop-weekday {
                padding: 0.5rem 0;
            }
            
            .desktop-calendar-days {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 4px;
                justify-items: center;
                align-items: center;
                width: 100%;
                overflow: hidden;
            }
            
            .desktop-calendar-day {
                height: 44px;
                width: 44px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.95rem;
                border-radius: 50%;
                cursor: pointer;
                position: relative;
                color: var(--text);
                transition: all 0.2s ease;
            }
            
            .desktop-calendar-day:hover {
                background-color: var(--calendar-day-hover);
                color: var(--primary);
            }
            
            .desktop-calendar-day.selected {
                background-color: var(--primary);
                color: #fff;
                font-weight: 500;
            }
            
            .desktop-calendar-day.today {
                font-weight: 700;
                position: relative;
            }
            
            .desktop-calendar-day.today::after {
                content: "";
                position: absolute;
                bottom: 6px;
                left: 50%;
                transform: translateX(-50%);
                width: 4px;
                height: 4px;
                background-color: var(--primary);
                border-radius: 50%;
            }
            
            .desktop-calendar-day.other-month {
                visibility: hidden;
                pointer-events: none;
            }
            
            /* Right section - Time slots */
            .desktop-timeslots-section {
                flex: 0 0 260px;
                padding: 2rem;
            }
            
            .desktop-time-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.25rem;
            }
            
            .desktop-day-title {
                font-size: 1.1rem;
                font-weight: 600;
                color: var(--text);
            }
            
            .desktop-time-header .event-timezone {
                margin-left: auto;
            }
            
            .desktop-time-slots-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            
            .desktop-time-slot {
                padding: 0.6rem 0;
                background: var(--card-bg);
                border: 1px solid var(--calendar-border);
                border-radius: 999px;
                text-align: center;
                cursor: pointer;
                color: var(--text);
                font-weight: 500;
                font-size: 0.9rem;
                transition: all 0.2s ease;
            }
            
            .desktop-time-slot:hover {
                background: var(--calendar-day-hover);
                border-color: var(--primary);
                color: var(--primary);
            }
            
            /* Time slot with green dot */
            .desktop-time-slot::before {
                content: "";
                display: inline-block;
                width: 8px;
                height: 8px;
                background-color: var(--time-dot);
                border-radius: 50%;
                margin-right: 8px;
                vertical-align: middle;
            }
            
            /* Fine print */
            .desktop-fine-print {
                max-width: 940px;
                width: 90%;
                margin: 1.5rem auto 0;
                font-size: 0.75rem;
                line-height: 1.4;
                color: #9aa0a6;
                text-align: center;
            }
        }

        /* Accessibility */
        a:focus,
        button:focus,
        input:focus,
        select:focus,
        textarea:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Fine Print Styles */
        .fine-print {
            margin: var(--space-1) 0 0;
            line-height: 1.3;
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .form-wrapper .fine-print {
            text-align: left;
            margin-bottom: var(--space-3);
        }

        .fine-print p {
            margin-bottom: var(--space-1);
        }

        .fine-print a {
            color: var(--primary);
            text-decoration: none;
        }

        .fine-print a:hover {
            text-decoration: underline;
        }

        .legal-links {
            display: flex;
            gap: var(--space-2);
            justify-content: center;
            margin-top: var(--space-2);
            flex-wrap: wrap;
        }

        .legal-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.75rem;
        }

        .legal-links a:hover {
            text-decoration: underline;
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
            background: var(--progress-inactive);
            transition: background 0.3s;
            position: relative;
            overflow: hidden;
        }

        .progress-bar-step.active {
            background: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
        }

        /* Video styles for proper display */
        .video-container video,
        .desktop-video-container video {
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
        .video-container #mainVideo,
        .desktop-video-container #desktopMainVideo {
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

        .video-container.playing #previewVideo,
        .desktop-video-container.playing #desktopPreviewVideo {
            display: none;
        }

        .video-container.playing #mainVideo,
        .desktop-video-container.playing #desktopMainVideo {
            display: block;
        }

        /* Hide play button when playing */
        .video-container.playing .play-button,
        .desktop-video-container.playing .play-button {
            display: none !important;
            z-index: -1;
            opacity: 0;
            pointer-events: none;
        }

        .calendar-day:hover {
            background-color: var(--calendar-day-hover);
            color: var(--primary);
        }

        .time-slot {
            background: var(--card-bg);
            border: 1px solid var(--calendar-border);
        }

        .time-slot:hover {
            background: var(--calendar-day-hover);
            border-color: var(--primary);
            color: var(--primary);
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
            padding-top: 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out, visibility 0.6s;
        }

        .calendar-container.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
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

        .time-header .event-timezone {
            margin-left: auto;
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
            overflow: hidden;
            width: 100%;
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
            color: var(--text-secondary);
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
            background: var(--nav-hover);
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
            color: var(--weekday-text);
            font-size: 0.75rem;
            padding: 8px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            margin: 0 0 8px;
            width: 100%;
            overflow: hidden;
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
            justify-items: center;
            align-items: center;
            width: 100%;
            overflow: hidden;
        }

        .calendar-day {
            height: 44px;
            width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            color: var(--text);
            transition: all 0.2s ease;
        }

        .calendar-day:hover {
            background-color: var(--calendar-day-hover);
            color: var(--primary);
        }

        .calendar-day.selected {
            background-color: var(--primary);
            color: #fff;
            font-weight: 500;
            border-radius: 50%;
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

        .time-slots-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .time-slot {
            padding: 12px;
            background: var(--card-bg);
            border: 1px solid var(--calendar-border);
            border-radius: 999px;
            text-align: center;
            cursor: pointer;
            color: var(--text);
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .time-slot:hover {
            background: var(--calendar-day-hover);
            border-color: var(--primary);
            color: var(--primary);
        }

        .time-slot.selected {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            font-weight: 600;
        }

        .time-slot.selected:hover {
            background: #166FE5;
            border-color: #166FE5;
            color: white;
        }

        .calendar-day.disabled {
            color: #ccc;
            cursor: not-allowed;
            pointer-events: none;
        }

        .no-slots-message {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>

<body>
    <!-- Mobile Layout -->
    <div class="container mobile-layout">
        <div class="content">
            <div class="header-group">
                <h1 class="headline">6-Week Online Weight Loss Mentorship</h1>
                <p class="subheadline">I'll help you optimize your diet and training so you're far more likely to lose weight at a steady pace without trying to figure it out yourself.</p>
            </div>

            <div class="video-container" id="videoContainer">
                <div class="play-button" id="playButton">
                    Watch how this works
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

            <div class="pricing-card">
                <div class="benefits-container">
                    <div class="benefit-item">
                        <div class="benefit-icon"><img src="https://i.postimg.cc/Vv0vD3wv/coaching.png" alt="Coaching icon"></div>
                        <div class="benefit-text">1-on-1 weight loss coaching tailored to you</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon"><img src="https://i.postimg.cc/nzPMKn6N/dollar.png" alt="Dollar icon"></div>
                        <div class="benefit-text">One payment of $599 with no hidden fees</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon"><img src="https://i.postimg.cc/V5y6TDsR/money-back.png" alt="Money back guarantee icon"></div>
                        <div class="benefit-text">Love it or get a full refund within 30 days</div>
                    </div>
                </div>
            </div>

            <!-- Calendar Section -->
            <div class="calendar-wrapper">
                <div class="calendar-header-text">
                    <h2 class="form-title">Book Your Call</h2>
                    <p class="form-subtitle">Choose a time that works best for you. I'll show you exactly how this works.</p>
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
                            <div class="event-timezone">
                                <select id="membership-timezone-select" class="timezone-select">
                                    <!-- Will be populated by JavaScript -->
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                        <div class="time-slots-grid" role="list">
                            <!-- Time slots will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add booking form for Cal.com integration -->
        <form id="booking-form" style="display: none;">
            <input type="hidden" name="name" id="user-name">
            <input type="hidden" name="email" id="user-email">
            <input type="hidden" name="notes" id="user-notes">
        </form>
    </div>

    <!-- Desktop Layout -->
    <div class="desktop-layout">
        <!-- New centered header section -->
        <div class="desktop-header-section">
            <div class="desktop-header">
                <h1 class="desktop-headline">6-Week Online Weight Loss Mentorship</h1>
                <p class="desktop-subheadline">I'll help you optimize your diet and training so you're far more likely to lose weight at a steady pace without trying to figure it out yourself.</p>
            </div>
        </div>
        
        <!-- Content section with video on left and calendar on right -->
        <div class="desktop-content-section">
            <!-- Left Column - Video -->
            <div class="left-column">
                <div class="desktop-content">
                    <div class="desktop-video-container" id="desktopVideoContainer">
                        <div class="play-button" id="desktopPlayButton">
                            Watch how this works
                            <div class="play-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z" fill-rule="evenodd" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <video id="desktopPreviewVideo" class="video-thumbnail" playsinline muted loop autoplay>
                            <source src="video.mp4" type="video/mp4">
                        </video>
                        <video id="desktopMainVideo" controls playsinline>
                            <source src="video.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="desktop-benefits-container">
                        <div class="desktop-benefit-item">
                            <div class="benefit-icon"><img src="https://i.postimg.cc/Vv0vD3wv/coaching.png" alt="Coaching icon"></div>
                            <div class="benefit-text">1-on-1 weight loss coaching tailored to you</div>
                        </div>
                        <div class="desktop-benefit-item">
                            <div class="benefit-icon"><img src="https://i.postimg.cc/nzPMKn6N/dollar.png" alt="Dollar icon"></div>
                            <div class="benefit-text">One payment of $599 with no hidden fees</div>
                        </div>
                        <div class="desktop-benefit-item">
                            <div class="benefit-icon"><img src="https://i.postimg.cc/V5y6TDsR/money-back.png" alt="Money back guarantee icon"></div>
                            <div class="benefit-text">Love it or get a full refund within 30 days</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column - Calendar -->
            <div class="right-column">
                <div class="desktop-content">
                    <div class="calendar-container">
                        <div class="month-calendar">
                            <div class="calendar-header">
                                <div class="month-nav">
                                    <div class="month-title">May <span>2025</span></div>
                                    <div class="nav-buttons">
                                        <button class="nav-button" id="desktopPrevMonth">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button class="nav-button" id="desktopNextMonth">
                                            <i class="fas fa-chevron-right"></i>
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
                                <!-- Calendar days will be populated by JavaScript -->
                            </div>
                        </div>
                        <div class="day-view">
                            <div class="time-header">
                                <div class="day-title">Thu 08</div>
                                <div class="event-timezone">
                                    <select id="desktopTimezone" class="timezone-select">
                                        <!-- Will be populated by JavaScript -->
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="time-slots-grid" role="list">
                                <!-- Time slots will be populated by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" defer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lazy load videos with Intersection Observer for better performance
            lazyLoadVideos();
            
            // Setup video functionality for both mobile and desktop
            setupVideoPlayer('videoContainer', 'previewVideo', 'mainVideo', 'playButton');
            setupVideoPlayer('desktopVideoContainer', 'desktopPreviewVideo', 'desktopMainVideo', 'desktopPlayButton');

            // Video player functionality
            function setupVideoPlayer(containerId, previewId, mainId, buttonId) {
                const videoContainer = document.getElementById(containerId);
                const previewVideo = document.getElementById(previewId);
                const mainVideo = document.getElementById(mainId);
                const playButton = document.getElementById(buttonId);
                
                if (!videoContainer || !previewVideo || !mainVideo || !playButton) return;
                
                // Set up 5-second preview loop
                previewVideo.addEventListener('timeupdate', function() {
                    if (previewVideo.currentTime >= 5) {
                        previewVideo.currentTime = 0;
                    }
                });

                // Ensure preview starts playing
                previewVideo.muted = true; // Ensure muted for autoplay
                previewVideo.play().catch(e => {
                    console.log('Preview autoplay failed:', e);
                });

                // Click handler for video container
                videoContainer.addEventListener('click', function() {
                    videoContainer.classList.add('playing');
                    mainVideo.style.display = 'block';
                    mainVideo.play();
                });

                // Reset to preview state when video ends
                mainVideo.addEventListener('pause', function() {
                    if (mainVideo.currentTime >= mainVideo.duration) {
                        videoContainer.classList.remove('playing');
                        previewVideo.style.display = 'block';
                        mainVideo.style.display = 'none';
                    }
                });
            }

            // Lazy load videos function
            function lazyLoadVideos() {
                const videos = document.querySelectorAll('video');
                
                // Replace source with data-src attribute to prevent initial loading
                videos.forEach(video => {
                    const sources = video.querySelectorAll('source');
                    sources.forEach(source => {
                        source.setAttribute('data-src', source.getAttribute('src'));
                        source.removeAttribute('src');
                    });
                });
                
                // Create intersection observer to load videos only when they come into view
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const video = entry.target;
                            const sources = video.querySelectorAll('source');
                            
                            // Set the src attribute back to load the video
                            sources.forEach(source => {
                                if (source.getAttribute('data-src')) {
                                    source.setAttribute('src', source.getAttribute('data-src'));
                                }
                            });
                            
                            // Required to make the browser load the video
                            video.load();
                            
                            // Stop observing once the video is loaded
                            observer.unobserve(video);
                        }
                    });
                }, {
                    rootMargin: '200px' // Load video when it's 200px from viewport
                });
                
                // Observe all videos
                videos.forEach(video => {
                    observer.observe(video);
                });
            }

            // Make calendar container visible after a short delay
            setTimeout(() => {
                const calendarContainer = document.querySelector('.calendar-container');
                if (calendarContainer) {
                    calendarContainer.classList.add('visible');
                }
            }, 100);

            // Booking System
            const BookingSystem = {
                selectedDate: new Date(),
                selectedTime: null,
                selectedSlot: null,
                selectedTimezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                
                // Available time slots (you can customize these)
                availableSlots: {
                    'Monday': ['9:00am', '10:00am', '11:00am', '2:00pm', '3:00pm', '4:00pm'],
                    'Tuesday': ['9:00am', '10:00am', '11:00am', '2:00pm', '3:00pm', '4:00pm'],
                    'Wednesday': ['9:00am', '10:00am', '11:00am', '2:00pm', '3:00pm', '4:00pm'],
                    'Thursday': ['9:00am', '10:00am', '11:00am', '2:00pm', '3:00pm', '4:00pm'],
                    'Friday': ['9:00am', '10:00am', '11:00am', '2:00pm', '3:00pm', '4:00pm'],
                    'Saturday': ['10:00am', '11:00am', '12:00pm', '1:00pm', '2:00pm'],
                    'Sunday': []
                },
                
                // Booked slots (loaded from server)
                bookedSlots: new Set(),
                eventTypeId: null,
                
                async init() {
                    this.setupTimezones();
                    await this.loadBookedSlots();
                    this.initializeCalendars();
                    this.setupEventListeners();
                },
                
                setupTimezones() {
                    const timezones = [
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
                    
                    // Populate mobile timezone selector
                    const mobileSelect = document.getElementById('membership-timezone-select');
                    if (mobileSelect) {
                        mobileSelect.innerHTML = '';
                        timezones.forEach(timezone => {
                            const option = document.createElement('option');
                            option.value = timezone;
                            option.textContent = timezone.replace('_', ' ');
                            if (timezone === this.selectedTimezone) {
                                option.selected = true;
                            }
                            mobileSelect.appendChild(option);
                        });
                    }
                    
                    // Populate desktop timezone selector
                    const desktopSelect = document.getElementById('desktopTimezone');
                    if (desktopSelect) {
                        desktopSelect.innerHTML = '';
                        timezones.forEach(timezone => {
                            const option = document.createElement('option');
                            option.value = timezone;
                            option.textContent = timezone.replace('_', ' ');
                            if (timezone === this.selectedTimezone) {
                                option.selected = true;
                            }
                            desktopSelect.appendChild(option);
                        });
                    }
                },
                
                async loadBookedSlots() {
                    // Set the event type ID from config
                    this.eventTypeId = '671523';
                    console.log('Using event type ID:', this.eventTypeId);
                },
                
                initializeCalendars() {
                    // Set initial selected date to today or next available day
                    const today = new Date();
                    this.selectedDate = new Date(today);
                    
                    // If today is past business hours, start with tomorrow
                    if (today.getHours() >= 17) {
                        this.selectedDate.setDate(today.getDate() + 1);
                    }
                    
                    this.renderMobileCalendar();
                    this.renderDesktopCalendar();
                    this.updateDayTitles();
                    this.renderTimeSlots();
                },
                
                setupEventListeners() {
                    // Mobile calendar navigation
                    const mobileNext = document.querySelector('.mobile-layout .next-month');
                    const mobilePrev = document.querySelector('.mobile-layout .prev-month');
                    
                    if (mobileNext) {
                        mobileNext.addEventListener('click', () => {
                            this.selectedDate.setMonth(this.selectedDate.getMonth() + 1);
                            this.renderMobileCalendar();
                            this.renderTimeSlots();
                        });
                    }
                    
                    if (mobilePrev) {
                        mobilePrev.addEventListener('click', () => {
                            this.selectedDate.setMonth(this.selectedDate.getMonth() - 1);
                            this.renderMobileCalendar();
                            this.renderTimeSlots();
                        });
                    }
                    
                    // Desktop calendar navigation
                    const desktopNext = document.getElementById('desktopNextMonth');
                    const desktopPrev = document.getElementById('desktopPrevMonth');
                    
                    if (desktopNext) {
                        desktopNext.addEventListener('click', () => {
                            this.selectedDate.setMonth(this.selectedDate.getMonth() + 1);
                            this.renderDesktopCalendar();
                            this.renderTimeSlots();
                        });
                    }
                    
                    if (desktopPrev) {
                        desktopPrev.addEventListener('click', () => {
                            this.selectedDate.setMonth(this.selectedDate.getMonth() - 1);
                            this.renderDesktopCalendar();
                            this.renderTimeSlots();
                        });
                    }
                    
                    // Timezone changes
                    const mobileTimezone = document.getElementById('membership-timezone-select');
                    const desktopTimezone = document.getElementById('desktopTimezone');
                    
                    if (mobileTimezone) {
                        mobileTimezone.addEventListener('change', (e) => {
                            this.selectedTimezone = e.target.value;
                            if (desktopTimezone) desktopTimezone.value = e.target.value;
                    this.renderTimeSlots();
                        });
                    }
                    
                    if (desktopTimezone) {
                        desktopTimezone.addEventListener('change', (e) => {
                            this.selectedTimezone = e.target.value;
                            if (mobileTimezone) mobileTimezone.value = e.target.value;
                            this.renderTimeSlots();
                        });
                    }
                },
                
                renderMobileCalendar() {
                    const calendarDays = document.querySelector('.mobile-layout .calendar-days');
                    if (!calendarDays) return;
                    
                    this.renderCalendar(calendarDays, '.mobile-layout .month-title');
                },
                
                renderDesktopCalendar() {
                    const calendarDays = document.querySelector('.right-column .calendar-days');
                    if (!calendarDays) return;
                    
                    this.renderCalendar(calendarDays, '.right-column .month-title');
                },
                
                renderCalendar(calendarDays, monthTitleSelector) {
                    const year = this.selectedDate.getFullYear();
                    const month = this.selectedDate.getMonth();
                    
                    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'];
                    
                    // Update month title
                    const monthTitle = document.querySelector(monthTitleSelector);
                    if (monthTitle) {
                        monthTitle.innerHTML = `${monthNames[month]} <span>${year}</span>`;
                    }

                const firstDay = new Date(year, month, 1);
                const lastDay = new Date(year, month + 1, 0);
                    const totalDays = lastDay.getDate();
                const startingDay = firstDay.getDay();
                    
                calendarDays.innerHTML = '';

                    // Previous month days (empty spaces)
                    for (let i = 0; i < startingDay; i++) {
                        const day = document.createElement('div');
                        day.className = 'calendar-day other-month';
                        calendarDays.appendChild(day);
                }

                    // Current month days
                    for (let day = 1; day <= totalDays; day++) {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'calendar-day';
                    dayElement.textContent = day;

                        const dayDate = new Date(year, month, day);
                        const today = new Date();
                        const dateKey = dayDate.toISOString().split('T')[0];
                        
                        // Mark today
                        if (this.isSameDay(dayDate, today)) {
                            dayElement.classList.add('today');
                        }
                        
                        // Mark selected day
                        if (this.isSameDay(dayDate, this.selectedDate)) {
                        dayElement.classList.add('selected');
                    }

                        // Check if this date has available slots (async check)
                        if (dayDate >= today.setHours(0, 0, 0, 0)) {
                            this.checkDateAvailability(dateKey, dayElement);
                        }

                        // Disable past dates
                        if (dayDate < today.setHours(0, 0, 0, 0)) {
                            dayElement.classList.add('disabled');
                        } else {
                            // Add click handler for future dates
                            dayElement.addEventListener('click', () => {
                                // Remove selected class from all days
                                calendarDays.querySelectorAll('.calendar-day').forEach(d => {
                                    d.classList.remove('selected');
                                });
                                
                                // Add selected class to clicked day
                                dayElement.classList.add('selected');
                                
                                // Update selected date
                                this.selectedDate = new Date(year, month, day);
                                
                                // Sync both calendars
                                this.syncCalendars();
                                this.updateDayTitles();
                                this.renderTimeSlots();
                            });
                    }

                    calendarDays.appendChild(dayElement);
                }
                    
                    // Add trailing empty cells to complete the grid (prevent overflow)
                    const totalCells = startingDay + totalDays;
                    const remainingCells = totalCells % 7;
                    if (remainingCells !== 0) {
                        const trailingCells = 7 - remainingCells;
                        for (let i = 0; i < trailingCells; i++) {
                            const day = document.createElement('div');
                            day.className = 'calendar-day other-month';
                            calendarDays.appendChild(day);
                        }
                    }
                },
                
                async checkDateAvailability(dateKey, dayElement) {
                    try {
                        const response = await fetch(`cal_api.php?action=availability&event_type_id=${this.eventTypeId}&date=${dateKey}&timezone=${this.selectedTimezone}`);
                        
                        if (response.ok) {
                            const data = await response.json();
                            
                            // Check if this date has available slots
                            if (data.slots && data.slots[dateKey] && data.slots[dateKey].length > 0) {
                                dayElement.classList.add('available');
                            }
                        }
                    } catch (error) {
                        console.error(`Error checking availability for ${dateKey}:`, error);
                    }
                },
                
                syncCalendars() {
                    // Update both mobile and desktop calendars to show the same selected date
                    const allCalendarDays = document.querySelectorAll('.calendar-day');
                    allCalendarDays.forEach(day => {
                        day.classList.remove('selected');
                        
                        if (day.textContent == this.selectedDate.getDate() && 
                            !day.classList.contains('other-month') && 
                            !day.classList.contains('disabled')) {
                            day.classList.add('selected');
                        }
                    });
                },
                
                updateDayTitles() {
                    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    const day = this.selectedDate.getDate().toString().padStart(2, '0');
                    const dayName = dayNames[this.selectedDate.getDay()];
                    
                    // Update mobile day title
                    const mobileDayTitle = document.querySelector('.mobile-layout .day-title');
                    if (mobileDayTitle) {
                        mobileDayTitle.textContent = `${dayName} ${day}`;
                    }
                    
                    // Update desktop day title
                    const desktopDayTitle = document.querySelector('.right-column .day-title');
                    if (desktopDayTitle) {
                        desktopDayTitle.textContent = `${dayName} ${day}`;
                    }
                },
                
                renderTimeSlots() {
                    this.renderMobileTimeSlots();
                    this.renderDesktopTimeSlots();
                },
                
                renderMobileTimeSlots() {
                    const timeSlotsGrid = document.querySelector('.mobile-layout .time-slots-grid');
                    if (!timeSlotsGrid) return;
                    
                    this.renderTimeSlotsForContainer(timeSlotsGrid);
                },
                
                renderDesktopTimeSlots() {
                    const timeSlotsGrid = document.querySelector('.right-column .time-slots-grid');
                    if (!timeSlotsGrid) return;
                    
                    this.renderTimeSlotsForContainer(timeSlotsGrid);
                },
                
                async renderDesktopTimeSlots() {
                    const timeSlotsGrid = document.querySelector('.right-column .time-slots-grid');
                    if (!timeSlotsGrid) return;
                    
                    await this.renderTimeSlotsForContainer(timeSlotsGrid);
                },
                
                async renderTimeSlotsForContainer(container) {
                    container.innerHTML = '<div style="text-align: center; padding: 20px;">Loading available times...</div>';
                    
                    if (!this.eventTypeId) {
                        container.innerHTML = '<div style="text-align: center; padding: 20px; color: #666;">Unable to load event type. Please refresh the page.</div>';
                        return;
                    }
                    
                    try {
                        // Format date for Cal.com API (YYYY-MM-DD)
                        const dateStr = this.selectedDate.toISOString().split('T')[0];
                        
                        // Get availability from Cal.com
                        const response = await fetch(`cal_api.php?action=availability&event_type_id=${this.eventTypeId}&date=${dateStr}&timezone=${this.selectedTimezone}`);
                        
                        if (response.ok) {
                            const data = await response.json();
                            container.innerHTML = '';
                            
                            // Cal.com returns slots in format: { slots: { "2025-06-09": [slot1, slot2, ...] } }
                            const dateKey = this.selectedDate.toISOString().split('T')[0];
                            const daySlots = data.slots && data.slots[dateKey] ? data.slots[dateKey] : [];
                            
                            if (daySlots.length > 0) {
                                daySlots.forEach(slot => {
                                    const startTime = new Date(slot.time);
                                    const timeStr = startTime.toLocaleTimeString('en-US', {
                                        hour: 'numeric',
                                        minute: '2-digit',
                                        hour12: true
                                    });
                                    
                                    const slotElement = document.createElement('div');
                                    slotElement.className = 'time-slot';
                                    slotElement.textContent = timeStr;
                                    
                                    slotElement.addEventListener('click', () => {
                                        // Remove selected class from all time slots
                                        document.querySelectorAll('.time-slot').forEach(s => {
                                            s.classList.remove('selected');
                                        });
                                        
                                        // Add selected class to clicked slot
                                        slotElement.classList.add('selected');
                                        
                                        // Store selected time and slot data
                                        this.selectedTime = timeStr;
                                        this.selectedSlot = slot;
                                        
                                        // Proceed to booking
                                        this.proceedToBooking();
                                    });
                                    
                                    container.appendChild(slotElement);
                                });
                            } else {
                                const noSlots = document.createElement('div');
                                noSlots.className = 'no-slots-message';
                                noSlots.textContent = 'No available time slots for this day.';
                                noSlots.style.textAlign = 'center';
                                noSlots.style.padding = '20px';
                                noSlots.style.color = '#666';
                                container.appendChild(noSlots);
                            }
                        } else {
                            throw new Error('Failed to load availability');
                        }
                    } catch (error) {
                        console.error('Error loading time slots:', error);
                        container.innerHTML = '<div style="text-align: center; padding: 20px; color: #666;">Unable to load available times. Please try again.</div>';
                    }
                },
                
                async proceedToBooking() {
                    if (!this.selectedTime || !this.selectedSlot) {
                        alert('Please select a time slot first.');
                        return;
                    }
                    
                    // Get user info from URL parameters (passed through the funnel)
                    const urlParams = new URLSearchParams(window.location.search);
                    const firstName = urlParams.get('firstName') || '';
                    const lastName = urlParams.get('lastName') || '';
                    const email = urlParams.get('email') || '';
                    const phone = urlParams.get('phone') || '';
                    
                    // If we have complete contact info from the funnel, proceed directly
                    if (firstName && lastName && email && phone) {
                        const name = (firstName + ' ' + lastName).trim();
                        this.showBookingConfirmation(name, email, phone, this.selectedTime, this.selectedSlot);
                    } else {
                        // Show contact form for direct visitors or incomplete funnel data
                        this.showContactForm();
                        // Pre-fill the form with any available funnel data
                        setTimeout(() => {
                            if (firstName) document.getElementById('modalFirstName').value = firstName;
                            if (lastName) document.getElementById('modalLastName').value = lastName;
                            if (email) document.getElementById('modalEmail').value = email;
                            if (phone) document.getElementById('modalPhone').value = phone;
                        }, 100);
                    }
                },
                
                showContactForm() {
                    // Format the date for display
                            const dateStr = this.selectedDate.toLocaleDateString('en-US', { 
                                weekday: 'long', 
                                month: 'long', 
                                day: 'numeric',
                                year: 'numeric'
                            });
                            
                    // Create contact form modal HTML with exact index.php styles
                    const modalHTML = `
                        <div id="contact-modal" class="modal-overlay">
                            <div class="modal-content">
                                <div class="form-title">Complete Your Booking</div>
                                
                                <div class="selected-time-info">
                                    <p><strong>Selected Time:</strong></p>
                                    <p>${dateStr}</p>
                                    <p>${this.selectedTime} (30 minutes)</p>
                                </div>
                                
                                <form id="contact-form" class="contact-form">
                                    <div class="name-row">
                                        <div class="name-field">
                                            <input type="text" id="modalFirstName" class="form-input" placeholder="First name" required>
                                            <label for="modalFirstName" class="form-label">First name</label>
                                            <div class="validation-mark">✓</div>
                                            <div class="error-message">Please enter your first name</div>
                                        </div>
                                        <div class="name-field">
                                            <input type="text" id="modalLastName" class="form-input" placeholder="Last name" required>
                                            <label for="modalLastName" class="form-label">Last name</label>
                                            <div class="validation-mark">✓</div>
                                            <div class="error-message">Please enter your last name</div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" id="modalEmail" class="form-input" placeholder="Email" required>
                                        <label for="modalEmail" class="form-label">Email</label>
                                        <div class="validation-mark">✓</div>
                                        <div class="error-message">Please enter a valid email address</div>
                                    </div>

                                    <div class="form-group">
                                        <input type="tel" id="modalPhone" class="form-input" placeholder="Phone number" required>
                                        <label for="modalPhone" class="form-label">Phone number (Text notifications)</label>
                                        <div class="validation-mark">✓</div>
                                        <div class="error-message">Please enter a valid phone number</div>
                                    </div>

                                    <button type="submit" id="confirm-contact" class="submit-button">Confirm Booking</button>
                                </form>
                                
                                <div class="fine-print">
                                    <p>You'll receive a confirmation email with calendar invite and meeting details.</p>
                                </div>
                            </div>
                        </div>
                        
                        <style>
                            .modal-overlay {
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: rgba(0, 0, 0, 0.5);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                z-index: 1000;
                                padding: 1rem;
                            }
                            
                            .modal-content {
                                background: var(--card-bg);
                                border-radius: 12px;
                                max-width: 450px;
                                width: 100%;
                                padding: 2rem;
                                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                                max-height: 90vh;
                                overflow-y: auto;
                            }
                            
                            .form-title {
                                font-size: 1.5rem;
                                font-weight: 700;
                                color: var(--text);
                                margin-bottom: 1rem;
                                text-align: center;
                            }
                            
                            .selected-time-info {
                                background: var(--background);
                                padding: 1rem;
                                border-radius: 8px;
                                margin-bottom: 1.5rem;
                                text-align: center;
                            }
                            
                            .selected-time-info p {
                                margin: 0.25rem 0;
                                color: var(--text);
                            }
                            
                            .selected-time-info p:first-child {
                                font-weight: 600;
                            }
                            
                            /* Copy exact form styles from index.php */
                            .contact-form {
                                width: 100%;
                                display: flex;
                                flex-direction: column;
                                gap: var(--form-gap);
                            }
                            
                            .name-field {
                                position: relative;
                                flex: 1;
                            }
                            
                            .name-row {
                                display: flex;
                                gap: var(--form-gap);
                                width: 100%;
                            }
                            
                            .form-group {
                                position: relative;
                            }
                            
                            .form-input {
                                width: 100%;
                                padding: 24px 14px 8px;
                                border: 1px solid var(--border);
                                border-radius: 8px;
                                font-size: 1.125rem;
                                color: var(--text);
                                background-color: var(--card-bg);
                                height: 56px;
                                transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
                                appearance: none;
                                -webkit-appearance: none;
                                box-sizing: border-box;
                            }
                            
                            .form-input::placeholder {
                                color: transparent;
                        }
                        
                            .form-label {
                                position: absolute;
                                left: 14px;
                                top: 50%;
                                transform: translateY(-50%);
                                color: var(--text-secondary);
                                font-size: 16px;
                                pointer-events: none;
                                transition: transform 0.2s, top 0.2s;
                                transform-origin: 0 0;
                                background-color: transparent;
                                line-height: 1;
                                padding: 0 2px;
                    }
                            
                            .form-input:focus~.form-label,
                            .form-input:not(:placeholder-shown)~.form-label,
                            .form-input:-webkit-autofill~.form-label {
                                top: 8px;
                                transform: translateY(0) scale(0.75);
                                color: var(--text-secondary);
                                background-color: var(--card-bg);
                                padding: 0 4px;
                                margin-left: -2px;
                    }
                            
                            .form-input:focus {
                                outline: none;
                                border-color: var(--primary);
                                box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.15);
                                transform: translateY(-1px);
                            }
                            
                            .validation-mark {
                                position: absolute;
                                right: 14px;
                                top: 50%;
                                transform: translateY(-50%);
                                color: white;
                                background-color: var(--success);
                                font-size: 10px;
                                font-weight: bold;
                                opacity: 0;
                                transition: opacity 0.2s;
                                z-index: 1;
                                width: 16px;
                                height: 16px;
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }
                            
                            .form-input.valid:not(:focus)~.validation-mark {
                                opacity: 1;
                            }
                            
                            .form-input.error {
                                border-color: var(--error);
                            }
                            
                            .form-input.error~.form-label {
                                color: var(--error);
                            }
                            
                            .error-message {
                                color: var(--error);
                                font-size: 0.75rem;
                                display: none;
                                text-align: left;
                                padding-left: 2px;
                                position: absolute;
                                top: 60px;
                                left: 0;
                                width: 100%;
                                line-height: 1.2;
                            }
                            
                            .form-input.error~.error-message {
                                display: block;
                            }
                            
                            .submit-button {
                                background-color: var(--primary);
                                color: white;
                                border: none;
                                border-radius: 8px;
                                padding: var(--space-2) 0;
                                font-size: 16px;
                                font-weight: 600;
                                cursor: pointer;
                                width: 100%;
                                transition: all 0.25s ease;
                                margin-top: var(--space-1);
                                position: relative;
                                overflow: hidden;
                            }
                            
                            .submit-button:hover {
                                background-color: #166FE5;
                                transform: translateY(-1px);
                                box-shadow: 0 4px 12px rgba(24, 119, 242, 0.25);
                            }
                            
                            .submit-button:disabled {
                                opacity: 0.7;
                                cursor: not-allowed;
                                transform: none;
                            }
                            
                            .fine-print {
                                margin-top: 1rem;
                                text-align: center;
                            }
                            
                            .fine-print p {
                                font-size: 0.875rem;
                                color: var(--text-secondary);
                                line-height: 1.4;
                                margin: 0;
                            }
                        </style>
                    `;
                    
                    // Add modal to page
                    document.body.insertAdjacentHTML('beforeend', modalHTML);
                        
                    // Add click outside to close
                    const modal = document.getElementById('contact-modal');
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            this.closeContactModal();
                        }
                    });
                    
                    // Setup form validation
                    this.setupModalFormValidation();
                    
                    // Add form submit handler
                    document.getElementById('contact-form').addEventListener('submit', (e) => {
                                    e.preventDefault();
                        this.handleContactFormSubmit();
                        });
                },

                closeContactModal() {
                    const modal = document.getElementById('contact-modal');
                    if (modal) modal.remove();
                    
                    // Remove selected state from time slot
                    document.querySelectorAll('.time-slot').forEach(s => {
                        s.classList.remove('selected');
                    });
                    this.selectedTime = null;
                    this.selectedSlot = null;
                },
                
                setupModalFormValidation() {
                    const inputs = {
                        firstName: document.getElementById('modalFirstName'),
                        lastName: document.getElementById('modalLastName'),
                        email: document.getElementById('modalEmail'),
                        phone: document.getElementById('modalPhone')
                    };
                    
                    // Add validation for each input
                    Object.entries(inputs).forEach(([field, input]) => {
                        if (!input) return;
                        
                        input.addEventListener('blur', () => this.validateModalField(field, input));
                        input.addEventListener('input', () => {
                            if (input.classList.contains('error')) {
                                this.validateModalField(field, input);
                            }
                        });
                    });
                },
                
                validateModalField(field, input) {
                    const value = input.value.trim();
                    let isValid = false;
                    
                    switch (field) {
                        case 'firstName':
                        case 'lastName':
                            isValid = value.length >= 2;
                            break;
                        case 'email':
                            isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
                            break;
                        case 'phone':
                            isValid = value.length >= 10;
                            break;
                    }
                    
                    input.classList.toggle('error', !isValid && value.length > 0);
                    input.classList.toggle('valid', isValid);
                    
                    return isValid;
                },
                
                handleContactFormSubmit() {
                    const firstName = document.getElementById('modalFirstName').value.trim();
                    const lastName = document.getElementById('modalLastName').value.trim();
                    const email = document.getElementById('modalEmail').value.trim();
                    const phone = document.getElementById('modalPhone').value.trim();
                    
                    // Validate all fields
                    const inputs = [
                        { field: 'firstName', element: document.getElementById('modalFirstName') },
                        { field: 'lastName', element: document.getElementById('modalLastName') },
                        { field: 'email', element: document.getElementById('modalEmail') },
                        { field: 'phone', element: document.getElementById('modalPhone') }
                    ];
                    
                    let allValid = true;
                    inputs.forEach(({ field, element }) => {
                        if (!this.validateModalField(field, element)) {
                            allValid = false;
                        }
                    });
                    
                    if (!allValid) {
                        return;
                    }
                    
                    // Show loading state
                    const submitBtn = document.getElementById('confirm-contact');
                    submitBtn.textContent = 'Booking...';
                    submitBtn.disabled = true;
                        
                    // Proceed with booking
                    const name = (firstName + ' ' + lastName).trim();
                    document.getElementById('contact-modal').remove();
                    this.createBooking(name, email, phone, this.selectedSlot);
                },
                
                showBookingConfirmation(name, email, phone, time, slot) {
                    // Format the date for display
                            const dateStr = this.selectedDate.toLocaleDateString('en-US', { 
                                weekday: 'long', 
                                month: 'long', 
                                day: 'numeric',
                                year: 'numeric'
                    });
                    
                    // Create modal HTML
                    const modalHTML = `
                        <div id="booking-modal" style="
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.5);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            z-index: 1000;
                        ">
                            <div style="
                                background: white;
                                padding: 2rem;
                                border-radius: 12px;
                                max-width: 500px;
                                width: 90%;
                                text-align: center;
                                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                            ">
                                <h2 style="margin-bottom: 1rem; color: #333;">Confirm Your Booking</h2>
                                
                                <div style="text-align: left; margin: 1.5rem 0; padding: 1rem; background: #f8f9fa; border-radius: 8px;">
                                    <p style="margin: 0.5rem 0;"><strong>Name:</strong> ${name}</p>
                                    <p style="margin: 0.5rem 0;"><strong>Email:</strong> ${email}</p>
                                    <p style="margin: 0.5rem 0;"><strong>Date:</strong> ${dateStr}</p>
                                    <p style="margin: 0.5rem 0;"><strong>Time:</strong> ${time}</p>
                                    <p style="margin: 0.5rem 0;"><strong>Duration:</strong> 30 minutes</p>
                                </div>
                                
                                <p style="margin: 1rem 0; color: #666; font-size: 0.9rem;">
                                    You'll receive a confirmation email with calendar invite and meeting details.
                                </p>
                                
                                <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 1.5rem;">
                                    <button id="cancel-booking" style="
                                        padding: 0.75rem 1.5rem;
                                        border: 1px solid #ccc;
                                        background: white;
                                        border-radius: 6px;
                                        cursor: pointer;
                                        font-size: 1rem;
                                    ">Cancel</button>
                                    <button id="confirm-booking" style="
                                        padding: 0.75rem 1.5rem;
                                        background: #1877F2;
                                        color: white;
                                        border: none;
                                        border-radius: 6px;
                                        cursor: pointer;
                                        font-size: 1rem;
                                        font-weight: 600;
                                    ">Confirm Booking</button>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    // Add modal to page
                    document.body.insertAdjacentHTML('beforeend', modalHTML);
                    
                    // Add event listeners
                    document.getElementById('cancel-booking').addEventListener('click', () => {
                        document.getElementById('booking-modal').remove();
                        // Remove selected state from time slot
                        document.querySelectorAll('.time-slot').forEach(s => {
                            s.classList.remove('selected');
                        });
                        this.selectedTime = null;
                        this.selectedSlot = null;
                    });
                    
                    document.getElementById('confirm-booking').addEventListener('click', () => {
                        const confirmBtn = document.getElementById('confirm-booking');
                        confirmBtn.textContent = 'Booking...';
                        confirmBtn.disabled = true;
                        confirmBtn.style.opacity = '0.7';
                        this.createBooking(name, email, phone, slot);
                    });
                },
                
                async createBooking(name, email, phone, slot) {
                    try {
                        // Get start time from the selected slot
                        const startTime = new Date(slot.time);
                        
                        // Create booking data for Cal.com v2 API
                        const bookingData = {
                            eventTypeId: parseInt(this.eventTypeId),
                            start: startTime.toISOString(),
                            attendee: {
                                name: name,
                                email: email,
                                timeZone: this.selectedTimezone,
                                phoneNumber: phone
                            }
                        };
                        
                        // Create booking via Cal.com API
                        const response = await fetch('cal_api.php?action=create_booking', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(bookingData)
                        });
                        
                        if (response.ok) {
                            const result = await response.json();
                            
                            // Remove the modal
                            const modal = document.getElementById('booking-modal');
                            if (modal) modal.remove();
                            
                            // Format the date for the confirmation page
                        const dateStr = this.selectedDate.toLocaleDateString('en-US', { 
                            weekday: 'long', 
                            month: 'long', 
                            day: 'numeric',
                            year: 'numeric'
                        });
                            
                            // Store booking in localStorage for the confirmation page
                            localStorage.setItem('pendingBooking', JSON.stringify({
                                date: dateStr,
                                time: this.selectedTime,
                                timezone: this.selectedTimezone,
                                bookingId: result.id,
                                name: name,
                                email: email
                            }));
                            
                            // Redirect to confirmation page
                            window.location.href = `confirmation.php?date=${encodeURIComponent(dateStr)}&time=${encodeURIComponent(this.selectedTime)}&timezone=${encodeURIComponent(this.selectedTimezone)}`;
                        } else {
                            const error = await response.json();
                            console.error('Booking API error:', error);
                            
                            // Reset button state on error
                            const modal = document.getElementById('booking-modal');
                            if (modal) {
                                const confirmBtn = document.getElementById('confirm-booking');
                                if (confirmBtn) {
                                    confirmBtn.textContent = 'Confirm Booking';
                                    confirmBtn.disabled = false;
                                    confirmBtn.style.opacity = '1';
                                }
                            }
                            alert(`Booking failed: ${error.error || 'Unknown error'}`);
                        }
                    } catch (error) {
                        console.error('Booking error:', error);
                        
                        // Reset button state on error
                        const modal = document.getElementById('booking-modal');
                        if (modal) {
                            const confirmBtn = document.getElementById('confirm-booking');
                            if (confirmBtn) {
                                confirmBtn.textContent = 'Confirm Booking';
                                confirmBtn.disabled = false;
                                confirmBtn.style.opacity = '1';
                            }
                        }
                        alert('Booking failed. Please try again.');
                    }
                },
                
                isSameDay(date1, date2) {
                    return date1.getDate() === date2.getDate() &&
                           date1.getMonth() === date2.getMonth() &&
                           date1.getFullYear() === date2.getFullYear();
                }
            };
            
            // Initialize the booking system
            BookingSystem.init();
            
            // Function to get URL parameters
            function getUrlParams() {
                const params = {};
                window.location.search.substring(1).split('&').forEach(param => {
                    if (param) {
                        const [key, value] = param.split('=');
                        params[key] = decodeURIComponent(value || '');
                    }
                });
                return params;
            }

            // Function to populate user data from URL parameters
            function populateUserData() {
                const params = getUrlParams();
                
                if (params.name) {
                    document.getElementById('user-name').value = params.name;
                }
                
                if (params.email) {
                    document.getElementById('user-email').value = params.email;
                }
                
                if (params.notes) {
                    document.getElementById('user-notes').value = params.notes;
                }
            }

            // Call the function to populate user data
            populateUserData();
        });
    </script>
</body>

</html>