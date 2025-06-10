<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Book Your Call - Weight Loss Mentorship</title>
    <meta name="description" content="Book a call for our weight loss mentorship program.">
    <meta name="robots" content="index, follow">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preload" as="image" href="video-thumb-optimized.png" fetchpriority="high">
    <style>
        /* Global CSS Variables and Styles for BusyBarbell */

        /* CSS Variables */
        :root {
            /* Spacing System - 8-point grid */
            --space-1: 0.5rem;  /* 8px */
            --space-2: 1rem;    /* 16px */
            --space-3: 1.5rem;  /* 24px */
            --space-4: 2rem;    /* 32px */
            --space-5: 2.5rem;  /* 40px */
            --space-6: 3rem;    /* 48px */
            
            /* Form Spacing */
            --form-gap: 1rem;
            
            /* Colors */
            --primary: #1877F2;
            --background: #f8f9fa;
            --text: #222222;
            --text-secondary: #717171;
            --border: #c1c7cd;
            --card-bg: #fff;
            --error: #ff3b30;
            --success: #4cd964;
            --divider: #E8EAED;
            --progress-inactive: #e0e0e0;
            
            /* Calendar Specific Colors */
            --calendar-day-hover: #F0F9FF;
            --calendar-border: #E5E7EB;
            
            /* Shadows */
            --premium-shadow: 0 8px 30px rgba(0, 0, 0, 0.07);
            --card-hover-shadow: 0 14px 40px rgba(0, 0, 0, 0.1);
            
            /* Transitions */
            --premium-transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            
            /* Gradients for Progress Bars */
            --gradient-1: linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
            --gradient-2: linear-gradient(90deg, #ee0979 0%, #9733ee 100%);
            --gradient-3: linear-gradient(90deg, #9733ee 0%, #00c6ff 100%);
            
            /* Questionnaire Specific */
            --slider-blue: #E3F2FD;
            --slider-blue-highlight: #1877F2;
            --slider-track: #E0E0E0;
            --slider-thumb: #1877F2;
            
            /* Base Font Size */
            font-size: 16px;
        }

        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, sans-serif;
        }

        /* Body Styles */
        body {
            background: var(--background);
            color: var(--text);
            line-height: 1.5;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        /* Common Container Styles */
        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Common Animations */
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

        /* Common Typography */
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
            line-height: 1.5;
            letter-spacing: -0.005em;
        }

        /* Common Form Styles */
        .form-wrapper {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
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
        .form-input:focus ~ .form-label,
        .form-input:not(:placeholder-shown) ~ .form-label,
        .form-input:-webkit-autofill ~ .form-label {
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

        /* Validation States */
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

        .form-input.valid:not(:focus) ~ .validation-mark {
            opacity: 1;
        }

        .form-input.error {
            border-color: var(--error);
        }

        .form-input.error ~ .form-label {
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

        .form-input.error ~ .error-message {
            display: block;
        }

        /* Common Button Styles */
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

        /* Progress Bar Styles */
        .progress-bar-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-bar-step {
            flex: 1;
            height: 4px;
            border-radius: 2px;
            background: var(--progress-inactive);
            transition: background 0.3s;
            position: relative;
            overflow: hidden;
        }

        .progress-bar-step.active:nth-child(1) {
            background: var(--gradient-1);
        }

        .progress-bar-step.active:nth-child(2) {
            background: var(--gradient-2);
        }

        .progress-bar-step.active:nth-child(3) {
            background: var(--gradient-3);
        }

        /* Common Disclaimer Styles */
        .disclaimer {
            max-width: 650px;
            margin: var(--space-4) auto 0;
            padding-top: var(--space-4);
            line-height: 1.5;
            font-size: 0.75rem;
            color: var(--text-secondary);
            text-align: center;
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

        /* Mobile Responsive Typography */
        @media (max-width: 768px) {
            .headline {
                font-size: 1.875rem;
            }
            
            .subheadline {
                font-size: 1rem;
            }
            
            .form-title {
                font-size: 1rem;
            }
            
            .form-subtitle {
                font-size: 0.875rem;
            }
            
            .form-input {
                padding: 24px 12px 8px;
                font-size: 1rem;
                height: 52px;
            }
            
            .form-label {
                font-size: 1rem;
                left: 12px;
            }
            
            .form-input:focus ~ .form-label,
            .form-input:not(:placeholder-shown) ~ .form-label {
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

        /* Desktop Base Font Size */
        @media (min-width: 769px) {
            :root {
                font-size: 16px;
            }
        }
    </style>
    <link rel="dns-prefetch" href="https://api.cal.com">
    <link rel="preconnect" href="https://api.cal.com" crossorigin>
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
            
            /* Video aspect ratios */
            --mobile-video-ratio: 80%;
            /* 5:4 aspect ratio (4/5 = 0.8 = 80%) */
            --desktop-video-ratio: 54.05%;
            /* 1.85:1 aspect ratio (1/1.85 = 0.5405 = 54.05%) */
            
            /* Premium styling variables */
            --premium-transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);

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
            font-size: 16px;
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

        @keyframes pulseFade {
            0% {
                box-shadow: 0 0 0 0 rgba(238, 9, 121, 0.5);
            }

            50% {
                box-shadow: 0 0 0 4px rgba(238, 9, 121, 0.3);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(238, 9, 121, 0);
            }
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: var(--space-4) 0 var(--space-6);
        }

        .content {
            margin: 0 auto;
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
            width: 100%;
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
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            color: var(--text);
            margin: 0 auto;
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
            margin: 0;
            background-color: var(--background);
            padding: var(--space-2) 0;
            text-align: left;
        }

        /* Progress Bar Styles - REMOVE */
        .progress-bar-container,
        .desktop-progress-bar-container,
        .progress-bar-step,
        .desktop-progress-bar-step {
            display: none;
        }

        .form-title {
            color: var(--text);
            font-weight: 700;
            font-size: 1.125rem;
            margin-bottom: var(--space-1);
            text-align: left;
            line-height: 1.2;
        }

        .form-subtitle {
            color: var(--text-secondary);
            font-size: 1.125rem;
            margin-bottom: var(--space-3);
            line-height: 1.4;
            text-align: left;
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

        /* Mobile Styles */
        @media(max-width:768px) {
            .container {
                padding: var(--space-3) 0 var(--space-4);
            }

            .content {
                padding: 0 1.5rem;
                gap: var(--space-2);
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
                padding: 10px;
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
                margin-bottom: var(--space-2);
            }

            /* Hide desktop layout on mobile */
            .desktop-view {
                display: none;
            }
        }

        /* Desktop layout */
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
            .desktop-view {
                display: block;
            }

            body {
                background: var(--background);
            }

            .desktop-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                padding: var(--space-4) var(--space-2);
            }

            /* Sticky progress bar at top */
            .desktop-progress-container {
                width: 100%;
                background-color: var(--background);
                padding: var(--space-4) 0 var(--space-4);
            }

            .desktop-header-text {
                text-align: left;
                width: 100%;
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
                opacity: 0;
                visibility: hidden;
                transform: translateY(20px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out, visibility 0.6s;
            }

            .desktop-calendar-widget.visible {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
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
                text-align: left;
                color: var(--text);
                font-weight: 700;
                font-size: 1.3rem;
                margin-bottom: 0.5rem;
                line-height: 1.2;
                animation: fadeIn 0.5s ease-out forwards;
            }

            .desktop-subtitle {
                text-align: left;
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

        /* Video styles */
        .video-details-wrapper {
            width: 100%;
            margin-bottom: var(--space-3);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

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

        /* Email-like layout styles */
        .email-content {
            display: flex;
            flex-direction: column;
            gap: var(--space-4);
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
        }

        .feature-boxes {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-3);
            margin-top: var(--space-4);
        }

        .feature-box {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--premium-shadow);
            transition: var(--premium-transition);
        }

        .feature-box:hover {
            box-shadow: var(--card-hover-shadow);
        }

        .feature-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .feature-box-content {
            padding: var(--space-2);
            text-align: left;
        }

        .feature-box-title {
            font-weight: 600;
            font-size: 1rem;
            color: var(--text);
            margin-bottom: 4px;
        }

        .feature-box-description {
            font-size: 0.875rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .large-image {
            width: 100%;
            max-width: 900px;
            margin: var(--space-3) auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--premium-shadow);
        }

        .large-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .summary-section {
            width: 100%;
            padding: var(--space-3) 0;
            background: var(--background);
        }

        .summary-title {
            text-align: left;
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: var(--space-3);
            color: var(--text);
        }

        .summary-title span {
            color: rgba(255, 255, 255, 0.6);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--space-2);
            width: 100%;
        }

        .summary-box {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            padding: var(--space-2);
            display: flex;
            flex-direction: column;
            border: 1px solid var(--border);
        }

        .summary-box img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
        }

        .summary-box-content {
            padding: var(--space-2) 0 0 0;
        }

        .summary-box-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: var(--space-1);
            text-align: left;
        }

        .summary-box-description {
            font-size: 0.9375rem;
            color: var(--text-secondary);
            line-height: 1.4;
            text-align: left;
        }

        @media (max-width: 768px) {
            .summary-box {
                padding: var(--space-1);
            }
            
            .summary-box-content {
                padding: var(--space-1) 0 0 0;
            }
            
            .summary-box-title {
                font-size: 1rem;
            }
            
            .summary-box-description {
                font-size: 0.875rem;
            }
        }

        .footer-fine-print {
            width: 100%;
            padding: var(--space-3) var(--space-2);
            color: var(--text-secondary);
            font-size: 0.75rem;
            line-height: 1.5;
            text-align: left;
            border-top: 1px solid var(--border);
            margin-top: var(--space-3);
        }

        .footer-fine-print p {
            margin-bottom: var(--space-2);
        }

        .footer-fine-print .copyright {
            margin-bottom: var(--space-2);
        }

        @media (max-width: 768px) {
            .footer-fine-print {
                padding: var(--space-2);
                margin-top: var(--space-2);
                font-size: 0.7rem;
            }
        }

        /* Lightbox styles */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            cursor: pointer;
        }

        .lightbox.active {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease-out;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90vh;
            object-fit: contain;
            border-radius: 8px;
        }

        .lightbox-close {
            position: fixed;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            z-index: 1001;
        }

        .summary-box img {
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .summary-box img:hover {
            opacity: 0.9;
        }

        .cta-button {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: var(--space-2) var(--space-4);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            max-width: 450px;
            text-decoration: none;
            transition: all 0.25s ease;
            margin-top: var(--space-3);
            text-align: center;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #166FE5;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(24, 119, 242, 0.25);
        }

        /* Benefits Section */
        .benefits-card {
            background-color: var(--card-bg);
            border-radius: 14px;
            padding: 12px 0;
            max-width: 450px;
            margin: var(--space-3) auto 0;
            border: 1px solid var(--border);
            box-shadow: var(--premium-shadow);
            transition: var(--premium-transition);
        }

        .benefits-card:hover {
            box-shadow: var(--card-hover-shadow);
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

        @media (max-width: 768px) {
            .cta-button {
                padding: var(--space-2) 0;
                font-size: 1rem;
                margin-top: var(--space-2);
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
        }
    </style>
</head>

<body>
    <!-- Mobile Layout -->
    <div class="container mobile-layout">
        <div class="content">
                <div class="form-wrapper">
                    <div class="form-title">You're Signed Up</div>
                <p class="form-subtitle">Watch the video below to learn how this works. Then check your inbox for the first email.</p>
                </div>

                <div class="video-details-wrapper">
                    <div class="video-container" id="videoContainer">
                        <div class="play-button" id="playButton">
                            Here's what to expect
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

                    <div class="benefits-card">
                        <div class="benefits-container">
                            <div class="benefit-item">
                                <div class="benefit-icon"><img src="https://i.postimg.cc/dQXSL7yb/fire.png" alt="Fire icon"></div>
                                <div class="benefit-text">How I ate to lose fat without feeling hungry</div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon"><img src="https://i.postimg.cc/MZsVxTTg/gymmm.png" alt="Dumbbell icon"></div>
                                <div class="benefit-text">The 2 workouts I did to prevent muscle loss</div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon"><img src="https://i.postimg.cc/28Z9vzdV/target.png" alt="Target icon"></div>
                                <div class="benefit-text">The exact way I tracked progress to stay on target</div>
                            </div>
                        </div>
                    </div>

                    <a href="mentorship.php<?php 
                        $params = [];
                        if (isset($_GET['email'])) $params[] = 'email=' . urlencode($_GET['email']);
                        if (isset($_GET['firstName'])) $params[] = 'firstName=' . urlencode($_GET['firstName']);
                        if (isset($_GET['lastName'])) $params[] = 'lastName=' . urlencode($_GET['lastName']);
                        if (isset($_GET['phone'])) $params[] = 'phone=' . urlencode($_GET['phone']);
                        echo !empty($params) ? '?' . implode('&', $params) : '';
                    ?>" class="cta-button">Want my help? Click Here</a>
                </div>
        </div>
    </div>

    <!-- Desktop Layout -->
    <div class="desktop-view">
        <div class="desktop-container">
            <div class="desktop-progress-container">
                <div class="desktop-header-text">
                    <h1 class="desktop-title">You're Signed Up</h1>
                    <p class="desktop-subtitle">Watch the video below to learn how this works. Then check your inbox for the first email.</p>
                </div>
            </div>

            <div class="desktop-calendar-widget">
                <div class="desktop-info-section">
                    <div class="desktop-header-text">
                        <h1 class="desktop-title">You're Signed Up</h1>
                        <p class="desktop-subtitle">Watch the video below to learn how this works. Then check your inbox for the first email.</p>
                    </div>

                    <div class="video-details-wrapper">
                        <div class="desktop-video-container" id="desktopVideoContainer">
                            <div class="play-button" id="desktopPlayButton">
                                Here's what to expect
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
                    </div>

                    <div class="benefits-card">
                        <div class="benefits-container">
                            <div class="benefit-item">
                                <div class="benefit-icon"><img src="https://i.postimg.cc/dQXSL7yb/fire.png" alt="Fire icon"></div>
                                <div class="benefit-text">How I ate to lose fat without feeling hungry</div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon"><img src="https://i.postimg.cc/MZsVxTTg/gymmm.png" alt="Dumbbell icon"></div>
                                <div class="benefit-text">The 2 workouts I did to prevent muscle loss</div>
                            </div>
                            <div class="benefit-item">
                                <div class="benefit-icon"><img src="https://i.postimg.cc/28Z9vzdV/target.png" alt="Target icon"></div>
                                <div class="benefit-text">The exact way I tracked progress to stay on target</div>
                            </div>
                        </div>
                    </div>

                    <a href="mentorship.php<?php 
                        $params = [];
                        if (isset($_GET['email'])) $params[] = 'email=' . urlencode($_GET['email']);
                        if (isset($_GET['firstName'])) $params[] = 'firstName=' . urlencode($_GET['firstName']);
                        if (isset($_GET['lastName'])) $params[] = 'lastName=' . urlencode($_GET['lastName']);
                        if (isset($_GET['phone'])) $params[] = 'phone=' . urlencode($_GET['phone']);
                        echo !empty($params) ? '?' . implode('&', $params) : '';
                    ?>" class="cta-button">Want my help? Click Here</a>
                </div>
            </div>
        </div>
    </div>

    <div class="lightbox" id="lightbox">
        <div class="lightbox-close">&times;</div>
        <img src="" alt="" id="lightbox-img">
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" defer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Video playback control
            const videoContainer = document.getElementById('videoContainer');
            const playButton = document.getElementById('playButton');
            const previewVideo = document.getElementById('previewVideo');
            const mainVideo = document.getElementById('mainVideo');

            if (videoContainer && playButton && previewVideo && mainVideo) {
                videoContainer.addEventListener('click', function() {
                    videoContainer.classList.add('playing');
                    mainVideo.style.display = 'block';
                    mainVideo.play();
                });

                mainVideo.addEventListener('pause', function() {
                    if (mainVideo.currentTime >= mainVideo.duration) {
                        videoContainer.classList.remove('playing');
                        previewVideo.style.display = 'block';
                        mainVideo.style.display = 'none';
                    }
                });
            }

            // Desktop video control
            const desktopVideoContainer = document.getElementById('desktopVideoContainer');
            const desktopPlayButton = document.getElementById('desktopPlayButton');
            const desktopPreviewVideo = document.getElementById('desktopPreviewVideo');
            const desktopMainVideo = document.getElementById('desktopMainVideo');

            if (desktopVideoContainer && desktopPlayButton && desktopPreviewVideo && desktopMainVideo) {
                desktopVideoContainer.addEventListener('click', function() {
                    desktopVideoContainer.classList.add('playing');
                    desktopMainVideo.style.display = 'block';
                    desktopMainVideo.play();
                });

                desktopMainVideo.addEventListener('pause', function() {
                    if (desktopMainVideo.currentTime >= desktopMainVideo.duration) {
                        desktopVideoContainer.classList.remove('playing');
                        desktopPreviewVideo.style.display = 'block';
                        desktopMainVideo.style.display = 'none';
                    }
                });
            }

            // Lightbox functionality
            const lightbox = document.getElementById('lightbox');
            const lightboxImg = document.getElementById('lightbox-img');
            const lightboxClose = document.querySelector('.lightbox-close');

            // Get all clickable images
            const images = document.querySelectorAll('.summary-box img');
            
            images.forEach(img => {
                img.addEventListener('click', function() {
                    lightbox.classList.add('active');
                    lightboxImg.src = this.src;
                    lightboxImg.alt = this.alt;
                    document.body.style.overflow = 'hidden'; // Prevent scrolling
                });
            });

            // Close lightbox when clicking the close button or outside the image
            lightbox.addEventListener('click', function(e) {
                if (e.target !== lightboxImg) {
                    closeLightbox();
                }
            });

            lightboxClose.addEventListener('click', closeLightbox);

            // Close on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeLightbox();
                }
            });

            function closeLightbox() {
                lightbox.classList.remove('active');
                document.body.style.overflow = ''; // Restore scrolling
            }
        });
    </script>
</body>
</html>
