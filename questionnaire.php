<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Set Your Goals - Weight Loss Questionnaire</title>
    <link rel="stylesheet" href="global.css">
    <style>
        /* Page-specific styles for questionnaire.php */
        
        body {
            padding-bottom: env(safe-area-inset-bottom);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 var(--space-2) var(--space-6);
            width: 100%;
        }

        .progress-bar-container {
            padding: var(--space-4) 0;
        }

        .step {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .step.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .question {
            max-width: 450px;
            margin: 0 auto;
            padding: 0;
        }

        .question-title {
            color: var(--text);
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: var(--space-3);
            text-align: center;
            line-height: 1.2;
        }

        /* Step 2 specific styling */
        #step2 .question-title:nth-child(3) {
            margin-top: var(--space-4);
        }

        /* Button styling - page specific overrides */
        .submit-button {
            opacity: 1;
            transform: translateY(0);
            transition: background-color 0.2s, opacity 0.2s;
            background-color: var(--border);
            color: var(--text-secondary);
            pointer-events: none;
            cursor: not-allowed;
            margin-top: 24px;
        }

        .submit-button.enabled {
            background-color: var(--primary);
            color: white;
            pointer-events: auto;
            cursor: pointer;
        }

        /* Make step 3 button always enabled */
        #step3 .submit-button {
            background-color: var(--primary);
            color: white;
            pointer-events: auto;
            cursor: pointer;
        }

        /* Adjust spacing for rate values */
        .rate-values {
            margin-bottom: var(--space-4);
            display: flex;
            gap: var(--space-2);
        }

        /* Adjust spacing for stats container */
        .stats-container {
            margin-bottom: var(--space-4);
            display: flex;
            gap: var(--space-2);
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 0 var(--space-2) var(--space-4);
            }
            
            .progress-bar-container {
                padding: var(--space-3) 0;
            }

            .question-title {
                font-size: 1.25rem;
                margin-bottom: var(--space-2);
                text-align: center;
            }
            
            #step2 .question-title:nth-child(3) {
                margin-top: var(--space-3);
            }
            
            .slider-container {
                margin-bottom: var(--space-3);
            }
            
            .rate-label {
                margin-bottom: var(--space-2);
            }
            
            .rate-values {
                margin-bottom: var(--space-3);
            }
        }

        /* Remove margin from last question title */
        .question-title:last-of-type {
            margin-bottom: var(--space-2);
        }

        /* Adjust spacing for step 2 */
        #step2 .question {
            gap: var(--space-2);
        }

        #step2 .rate-values {
            margin-top: var(--space-2);
            margin-bottom: var(--space-2);
        }

        /* Adjust spacing for step 3 */
        #step3 .question {
            gap: var(--space-2);
        }

        /* Form styles are in global.css */

        /* Slider styles - page specific */
        .slider-container {
            position: relative;
            height: 60px;
            margin-bottom: var(--space-4);
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 100%;
            background: transparent;
            outline: none;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 100%;
            background: transparent;
            cursor: ew-resize;
        }

        .slider-track {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--slider-track);
            pointer-events: none;
        }

        .slider-ticks-container {
            position: absolute;
            top: 0;
            height: 100%;
            left: 50%;
            right: 0;
            pointer-events: none;
            will-change: transform;
        }

        .slider-ticks {
            position: absolute;
            top: 0;
            left: -50vw;
            right: -50vw;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .slider-tick {
            position: absolute;
            width: 1px;
            height: 8px;
            background: var(--border);
            transform-origin: center center;
        }

        .slider-tick.major {
            height: 12px;
        }

        .slider-value {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 2rem;
            color: var(--text);
        }

        .slider-scale {
            position: absolute;
            bottom: -20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            color: var(--text-secondary);
            font-size: 0.75rem;
            pointer-events: none;
            will-change: transform;
        }

        .scale-number {
            position: absolute;
            color: var(--text-secondary);
            font-size: 0.75rem;
            transform: translateX(-50%);
        }

        .slider-indicator {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--slider-blue-highlight);
            left: 50%;
            transform: translateX(-50%);
        }

        .slider-fill {
            position: absolute;
            top: 50%;
            height: 1px;
            background: var(--slider-blue);
            opacity: 0.5;
            pointer-events: none;
            left: 50%;
            right: 0;
        }

        /* Remove old highlight track */
        .slider-track-highlight {
            display: none;
        }

        .rate-label {
            display: inline-block;
            padding: var(--space-2) var(--space-3);
            background: var(--slider-blue);
            border-radius: 8px;
            margin-bottom: var(--space-3);
            font-size: 1rem;
            color: var(--text);
        }

        .rate-box {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: var(--space-2);
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .rate-row {
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }

        .rate-value {
            display: flex;
            align-items: baseline;
            gap: 4px;
        }

        .rate-minus {
            color: var(--text);
            font-size: 1.25rem;
        }

        .rate-number {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text);
        }

        .rate-unit {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-right: var(--space-2);
        }

        .rate-period {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: 4px;
        }

        .stat-box {
            background: var(--slider-blue);
            border-radius: 8px;
            padding: var(--space-2);
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .stat-value {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .goal-summary {
            margin: var(--space-4) 0;
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }

        .summary-item {
            padding: var(--space-2);
            border-bottom: 1px solid var(--border);
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text);
        }

        .summary-value {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .summary-description {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            line-height: 1.4;
        }

        /* Make sure both rate values and stats sections use the same styling */
        .rate-values, .stats-container {
            margin-bottom: var(--space-4);
            display: flex;
            gap: var(--space-2);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="progress-bar-container">
            <div class="progress-bar-step active"></div>
            <div class="progress-bar-step"></div>
            <div class="progress-bar-step"></div>
        </div>

        <form id="goalForm" action="beehiiv_integration.php" method="POST">
            <!-- Hidden fields to pass email and name data -->
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
            <input type="hidden" name="firstName" value="<?php echo htmlspecialchars($_GET['firstName'] ?? ''); ?>">
            <input type="hidden" name="lastName" value="<?php echo htmlspecialchars($_GET['lastName'] ?? ''); ?>">
            <input type="hidden" name="phone" value="<?php echo htmlspecialchars($_GET['phone'] ?? ''); ?>">
            
            <!-- Step 1: Current Weight -->
            <div class="step active" id="step1">
                <div class="question">
                    <h2 class="question-title">What is your current weight?</h2>
                    <div class="form-group">
                        <input type="tel" inputmode="numeric" pattern="[0-9]*" maxlength="3" id="currentWeight" name="currentWeight" class="form-input" placeholder="Enter your current weight" required>
                        <label for="currentWeight" class="form-label">Current weight (In pounds)</label>
                        <div class="validation-mark">✓</div>
                        <div class="error-message">Please enter a valid weight</div>
                    </div>
                    <button type="button" class="submit-button" onclick="nextStep(1)">Next</button>
                </div>
            </div>

            <!-- Step 2: Target Weight -->
            <div class="step" id="step2">
                <div class="question">
                    <div class="stats-container">
                        <div class="stat-box">
                            <div class="stat-value" id="dailyBudget">1675</div>
                            <div class="stat-label">initial daily budget</div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-value" id="endDate">May 23, 2025</div>
                            <div class="stat-label">projected end date</div>
                        </div>
                    </div>
                    <h2 class="question-title">What is your target weight?</h2>
                    <div class="slider-container">
                        <div class="slider-track"></div>
                        <div class="slider-ticks-container" id="sliderTicksContainer">
                            <div class="slider-ticks" id="sliderTicks"></div>
                        </div>
                        <div class="slider-indicator" id="sliderIndicator">
                            <div class="slider-value" id="targetWeightLabel">180 lbs</div>
                        </div>
                        <div class="slider-fill" id="sliderFill"></div>
                        <input type="range" id="targetWeight" name="targetWeight" class="slider" min="60" max="180" value="180" step="1">
                    </div>
                    <h2 class="question-title">What is your target goal rate?</h2>
                    <div class="rate-label" id="goalRateLabel">Standard</div>
                    <div class="slider-container">
                        <div class="slider-track slider-track-filled" id="goalRateTrack"></div>
                        <div class="slider-track slider-track-highlight" id="goalRateHighlight"></div>
                        <input type="range" id="goalRate" name="goalRate" class="slider" min="0" max="2" step="0.1" value="1">
                    </div>
                    <div class="rate-values">
                        <div class="rate-box">
                            <div class="rate-row">
                                <div class="rate-value">
                                    <span class="rate-minus">-</span>
                                    <span class="rate-number" id="weeklyRateLbs">0.2</span>
                                    <span class="rate-unit">lbs</span>
                                </div>
                                <div class="rate-value">
                                    <span class="rate-number" id="weeklyRateBw">0.1</span>
                                    <span class="rate-unit">% BW</span>
                                </div>
                            </div>
                            <span class="rate-period">Per Week</span>
                        </div>
                        <div class="rate-box">
                            <div class="rate-row">
                                <div class="rate-value">
                                    <span class="rate-minus">-</span>
                                    <span class="rate-number" id="sixWeekRateLbs">1.2</span>
                                    <span class="rate-unit">lbs</span>
                                </div>
                                <div class="rate-value">
                                    <span class="rate-number" id="sixWeekRateBw">0.4</span>
                                    <span class="rate-unit">% BW</span>
                                </div>
                            </div>
                            <span class="rate-period">In 6 Weeks</span>
                        </div>
                    </div>
                    <button type="button" class="submit-button" onclick="nextStep(2)">Next</button>
                </div>
            </div>

            <!-- Step 3: Goal Summary -->
            <div class="step" id="step3">
                <div class="question">
                    <h2 class="question-title">Goal Summary</h2>
                    <div class="stats-container">
                        <div class="stat-box" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                            <div class="stat-label" style="margin: 0;">Weight Loss</div>
                            <div class="stat-value" id="weightLossSummary" style="margin: 0;">157 lbs ≫ 157 lbs</div>
                        </div>
                    </div>
                    <div class="goal-summary">
                        <div class="summary-item">
                            <div class="summary-title">Goal Rate</div>
                            <div class="summary-value">-1.5% BW per week</div>
                            <div class="summary-description">
                                We will adjust your calorie targets as needed to keep you on track to lose 1.5% of your body weight per week. The exact number of pounds you lose each week will decrease as your overall body weight decreases.
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-title">Initial Daily Budget</div>
                            <div class="summary-value" id="dailyBudgetSummary">1675 kcal</div>
                            <div class="summary-description">
                                This daily budget is estimated based on your current expenditure. Your expenditure is ever-changing and will adjust in response to your diet, activity, and more. Each week during the check-in, we will adjust your weekly plan to reflect your new daily budget.
                            </div>
                        </div>
                        <div class="summary-item">
                            <div class="summary-title">Estimated End Date</div>
                            <div class="summary-value" id="endDateSummary">May 23, 2025</div>
                            <div class="summary-description">
                                This is an optimistic estimate of when you would reach your goal if your expenditure were perfectly stable and you had 100% adherence to targets. Remember to prioritize progress over perfection, and plan for the goal to take a few more weeks than this optimistic estimate.
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="submit-button enabled">Complete Sign Up</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Initialize elements
        const targetWeightSlider = document.getElementById('targetWeight');
        const targetWeightLabel = document.getElementById('targetWeightLabel');
        const sliderTicksContainer = document.getElementById('sliderTicksContainer');
        const sliderIndicator = document.getElementById('sliderIndicator');
        const sliderFill = document.getElementById('sliderFill');
        const scale140 = document.getElementById('scale140');
        const scale150 = document.getElementById('scale150');
        const goalRateSlider = document.getElementById('goalRate');
        const goalRateLabel = document.getElementById('goalRateLabel');
        const goalRateTrack = document.getElementById('goalRateTrack');
        const goalRateHighlight = document.getElementById('goalRateHighlight');
        const weeklyRateSpan = document.getElementById('weeklyRate');
        const sixWeekRateSpan = document.getElementById('sixWeekRate');
        const weightLossSummary = document.getElementById('weightLossSummary');
        const currentWeight = document.getElementById('currentWeight');
        const progressSteps = document.querySelectorAll('.progress-bar-step');
        const minWeightSpan = document.getElementById('minWeight');
        const maxWeightSpan = document.getElementById('maxWeight');

        // Create tick marks
        function createTicks() {
            const min = parseInt(targetWeightSlider.min);
            const max = parseInt(targetWeightSlider.max);
            const range = max - min;
            const tickCount = range; // One tick per pound
            const containerWidth = targetWeightSlider.offsetWidth;
            const pixelsPerTick = containerWidth / tickCount;
            
            const ticksContainer = document.getElementById('sliderTicks');
            ticksContainer.innerHTML = ''; // Clear existing ticks
            
            // Create ticks for each pound
            for (let i = 0; i <= tickCount; i++) {
                const tick = document.createElement('div');
                tick.className = 'slider-tick';
                
                // Calculate position - start from max (left) to min (right)
                const position = i * pixelsPerTick;
                tick.style.left = `${position}px`;
                
                const weight = max - i;
                
                // Add major tick and label every 10 pounds
                if (weight % 10 === 0) {
                    tick.classList.add('major');
                    
                    const scaleNumber = document.createElement('div');
                    scaleNumber.className = 'scale-number';
                    scaleNumber.textContent = weight;
                    scaleNumber.style.left = `${position}px`;
                    ticksContainer.appendChild(scaleNumber);
                }
                
                ticksContainer.appendChild(tick);
            }
        }

        // Update target weight display
        function updateTargetWeightDisplay() {
            const value = parseInt(targetWeightSlider.value);
            const min = parseInt(targetWeightSlider.min);
            const max = parseInt(targetWeightSlider.max);
            const range = max - min;
            
            // Update label to show weight in pounds
            targetWeightLabel.textContent = value + ' lbs';
            
            // Calculate pixel offset for ticks
            const containerWidth = targetWeightSlider.offsetWidth;
            const pixelsPerValue = containerWidth / range;
            const offset = (max - value) * pixelsPerValue;
            
            // Move ticks and scale
            sliderTicksContainer.style.transform = `translateX(${offset}px)`;
            
            updateWeightLossSummary();
            updateProjections();
            
            // Enable next button if weight has been changed from max
            const currentWeightVal = parseFloat(currentWeight.value) || 180;
            if (value !== currentWeightVal) {
                showNextButton(2, true);
            } else {
                hideNextButton(2);
            }
        }

        // Initialize the slider
        function initializeWeightSlider() {
            createTicks();
            updateTargetWeightDisplay();
            
            let isDragging = false;
            let startX, startValue;
            
            function handleDragStart(e) {
                isDragging = true;
                startX = e.type.includes('mouse') ? e.pageX : e.touches[0].pageX;
                startValue = parseInt(targetWeightSlider.value);
                document.body.style.cursor = 'ew-resize';
            }
            
            function handleDragMove(e) {
                if (!isDragging) return;
                
                const x = e.type.includes('mouse') ? e.pageX : e.touches[0].pageX;
                const diff = x - startX;
                const range = parseInt(targetWeightSlider.max) - parseInt(targetWeightSlider.min);
                const pixelsPerValue = targetWeightSlider.offsetWidth / range;
                
                // Moving right decreases weight (slides ticks right)
                let newValue = startValue - Math.round(diff / pixelsPerValue);
                newValue = Math.max(parseInt(targetWeightSlider.min), Math.min(parseInt(targetWeightSlider.max), newValue));
                
                if (targetWeightSlider.value !== newValue.toString()) {
                    targetWeightSlider.value = newValue;
                    updateTargetWeightDisplay();
                }
                
                e.preventDefault();
            }
            
            function handleDragEnd() {
                isDragging = false;
                document.body.style.cursor = '';
            }
            
            targetWeightSlider.addEventListener('mousedown', handleDragStart);
            targetWeightSlider.addEventListener('touchstart', handleDragStart);
            
            document.addEventListener('mousemove', handleDragMove);
            document.addEventListener('touchmove', handleDragMove, { passive: false });
            
            document.addEventListener('mouseup', handleDragEnd);
            document.addEventListener('touchend', handleDragEnd);
            
            window.addEventListener('resize', updateTargetWeightDisplay);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeWeightSlider();
            updateGoalRateDisplay();
            
            // Disable all next buttons initially except step 3
            document.querySelectorAll('.submit-button').forEach(button => {
                button.classList.remove('enabled');
            });
            
            const step3Button = document.querySelector('#step3 .submit-button');
            if (step3Button) {
                step3Button.classList.add('enabled');
            }
        });

        // Add validation for weight input
        currentWeight.addEventListener('input', function() {
            validateWeight(this);
            this.classList.remove('error');
            
            if (this.value && !isNaN(this.value)) {
                const weight = parseInt(this.value);
                targetWeightSlider.max = weight;
                targetWeightSlider.value = weight;
                targetWeightSlider.min = Math.min(60, weight - 1);
                updateTargetWeightDisplay();
                showNextButton(1);
            } else {
                targetWeightSlider.min = 60;
                targetWeightSlider.max = 180;
                targetWeightSlider.value = 180;
                updateTargetWeightDisplay();
                hideNextButton(1);
            }
        });

        currentWeight.addEventListener('blur', function() {
            validateWeight(this);
        });

        function validateWeight(input) {
            const value = parseFloat(input.value);
            const isValid = value >= 50 && value <= 500;
            input.classList.toggle('valid', isValid);
            input.classList.toggle('error', !isValid && input.value !== '');
            showNextButton(1, isValid);
        }

        // Update goal rate display
        function updateGoalRateDisplay() {
            const value = parseFloat(goalRateSlider.value);
            let label = 'Standard';
            let weeklyRateLbs = 0.2;
            let currentWeightVal = parseFloat(currentWeight.value) || 180;

            if (value < 0.7) {
                label = 'Slower';
                weeklyRateLbs = 0.2;
            } else if (value > 1.3) {
                label = 'Faster (Use Caution)';
                weeklyRateLbs = 0.8;
            } else {
                weeklyRateLbs = 0.2;
            }

            // Calculate body weight percentages
            let weeklyRateBw = ((weeklyRateLbs / currentWeightVal) * 100).toFixed(1);
            let sixWeekRateLbs = (weeklyRateLbs * 6).toFixed(1);
            let sixWeekRateBw = ((sixWeekRateLbs / currentWeightVal) * 100).toFixed(1);

            // Update display
            goalRateLabel.textContent = label;
            document.getElementById('weeklyRateLbs').textContent = weeklyRateLbs.toFixed(1);
            document.getElementById('weeklyRateBw').textContent = weeklyRateBw;
            document.getElementById('sixWeekRateLbs').textContent = sixWeekRateLbs;
            document.getElementById('sixWeekRateBw').textContent = sixWeekRateBw;

            // Update filled track
            const percent = (value / goalRateSlider.max) * 100;
            goalRateTrack.style.width = percent + '%';

            // Position the highlight around the "standard" range
            goalRateHighlight.style.left = '35%';
            goalRateHighlight.style.width = '30%';
        }

        goalRateSlider.addEventListener('input', function() {
            updateGoalRateDisplay();
            updateProjections();
        });

        function showNextButton(step, isValid = true) {
            const currentStep = document.getElementById('step' + step);
            const button = currentStep.querySelector('.submit-button');
            // Don't apply enable/disable logic to step 3 button
            if (step !== 3) {
                if (isValid) {
                    button.classList.add('enabled');
                } else {
                    button.classList.remove('enabled');
                }
            }
        }

        function hideNextButton(step) {
            const currentStep = document.getElementById('step' + step);
            const button = currentStep.querySelector('.submit-button');
            // Don't disable step 3 button
            if (step !== 3) {
                button.classList.remove('enabled');
            }
        }

        function nextStep(currentStep) {
            // Basic validation
            if (currentStep === 1) {
                if (!currentWeight.value) {
                    currentWeight.classList.add('error');
                    return;
                }
                const weightValue = parseFloat(currentWeight.value);
                if (weightValue < 50 || weightValue > 500) {
                    currentWeight.classList.add('error');
                    return;
                }
            }

            // Hide current step
            document.getElementById('step' + currentStep).classList.remove('active');
            // Show next step
            document.getElementById('step' + (currentStep + 1)).classList.add('active');
            // Update progress bar
            progressSteps[currentStep].classList.add('active');

            // Update summary if moving to final step
            if (currentStep === 2) {
                updateWeightLossSummary();
            }
        }

        function updateWeightLossSummary() {
            const currentVal = currentWeight.value || '157';
            const targetVal = targetWeightSlider.value;
            weightLossSummary.textContent = `${currentVal} lbs ≫ ${targetVal} lbs`;
        }

        // Add function to update projections
        function updateProjections() {
            const currentWeightVal = parseFloat(currentWeight.value) || 180;
            const targetWeightVal = parseInt(targetWeightSlider.value);
            const weeklyRateLbs = parseFloat(document.getElementById('weeklyRateLbs').textContent);
            
            // Calculate daily calorie deficit
            const dailyDeficit = weeklyRateLbs * 3500 / 7; // 3500 calories per pound
            const maintenanceCalories = currentWeightVal * 15; // Rough estimate
            const dailyBudget = Math.round(maintenanceCalories - dailyDeficit);
            
            // Calculate projected end date
            const totalPoundsToLose = currentWeightVal - targetWeightVal;
            const weeksToGoal = totalPoundsToLose / weeklyRateLbs;
            const daysToGoal = Math.ceil(weeksToGoal * 7);
            const endDate = new Date();
            endDate.setDate(endDate.getDate() + daysToGoal);
            
            // Update displays
            document.getElementById('dailyBudget').textContent = dailyBudget;
            document.getElementById('endDate').textContent = endDate.toLocaleDateString('en-US', { 
                month: 'short',
                day: 'numeric',
                year: 'numeric'
            });
        }
    </script>
</body>
</html> 