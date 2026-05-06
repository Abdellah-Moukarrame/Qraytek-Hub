<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Application Pending</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f6f7f8;
            padding: 40px 20px;
            color: #0d141b;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        .header {
            background: #137fec;
            padding: 40px;
            text-align: center;
        }
        .header h1 {
            color: white;
            font-size: 24px;
            font-weight: 800;
            margin-top: 16px;
        }
        .header p {
            color: rgba(255,255,255,0.8);
            font-size: 14px;
            margin-top: 6px;
        }
        .logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .logo-icon {
            width: 44px;
            height: 44px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        .logo-text {
            color: white;
            font-size: 20px;
            font-weight: 800;
        }
        .body {
            padding: 40px;
        }
        .greeting {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #0d141b;
        }
        .text {
            font-size: 14px;
            line-height: 1.8;
            color: #475569;
            margin-bottom: 16px;
        }
        .status-card {
            background: #fff7ed;
            border: 2px solid #fed7aa;
            border-radius: 12px;
            padding: 20px 24px;
            margin: 24px 0;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }
        .status-icon {
            font-size: 28px;
            flex-shrink: 0;
        }
        .status-title {
            font-size: 15px;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 4px;
        }
        .status-desc {
            font-size: 13px;
            color: #b45309;
            line-height: 1.6;
        }
        .steps {
            background: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            margin: 24px 0;
        }
        .steps-title {
            font-size: 14px;
            font-weight: 700;
            color: #0d141b;
            margin-bottom: 16px;
        }
        .step {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 14px;
        }
        .step:last-child { margin-bottom: 0; }
        .step-num {
            width: 28px;
            height: 28px;
            background: #137fec;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }
        .step-text {
            font-size: 13px;
            color: #475569;
            line-height: 1.6;
            padding-top: 4px;
        }
        .step-text strong {
            color: #0d141b;
            font-weight: 600;
        }
        .timer {
            text-align: center;
            background: #137fec;
            color: white;
            border-radius: 12px;
            padding: 20px;
            margin: 24px 0;
        }
        .timer-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
            margin-bottom: 6px;
        }
        .timer-value {
            font-size: 32px;
            font-weight: 900;
        }
        .timer-sub {
            font-size: 12px;
            opacity: 0.7;
            margin-top: 4px;
        }
        .footer {
            background: #f8fafc;
            padding: 24px 40px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
        .footer p {
            font-size: 12px;
            color: #94a3b8;
            line-height: 1.6;
        }
        .footer a {
            color: #137fec;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">

    {{-- Header --}}
    <div class="header">
        <div class="logo">
            <div class="logo-icon">🎓</div>
            <span class="logo-text">Qraytek Hub</span>
        </div>
        <h1>Application Received!</h1>
        <p>Your teacher application is now under review</p>
    </div>

    {{-- Body --}}
    <div class="body">
        <p class="greeting">Hi, {{ $teacher->name }}! 👋</p>

        <p class="text">
            Thank you for applying to join <strong>Qraytek Hub</strong> as an independent teacher.
            We've successfully received your application and all your submitted documents.
        </p>

        {{-- Status Card --}}
        <div class="status-card">
            <div class="status-icon">⏳</div>
            <div>
                <div class="status-title">Application Status: Pending Review</div>
                <div class="status-desc">
                    Our admin team is currently reviewing your profile, qualifications,
                    and submitted documents. You will receive an email once a decision has been made.
                </div>
            </div>
        </div>

        {{-- Timer --}}
        <div class="timer">
            <div class="timer-label">Maximum review time</div>
            <div class="timer-value">48 Hours</div>
            <div class="timer-sub">You will be notified by email</div>
        </div>

        {{-- What happens next --}}
        <div class="steps">
            <div class="steps-title">What happens next?</div>
            <div class="step">
                <div class="step-num">1</div>
                <div class="step-text">
                    <strong>Documents Verification</strong> — Our team will verify your CV,
                    University Degree, Teaching Certificate and ID Card.
                </div>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <div class="step-text">
                    <strong>Profile Review</strong> — We will review your subject,
                    experience and bio to ensure quality for our students.
                </div>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <div class="step-text">
                    <strong>Decision Email</strong> — You will receive an email within
                    48 hours confirming whether your application is approved or rejected.
                </div>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <div class="step-text">
                    <strong>Start Teaching!</strong> — Once approved, you can log in,
                    set your availability, create courses and start accepting bookings.
                </div>
            </div>
        </div>

        <p class="text">
            If you have any questions about your application, feel free to contact us at
            <a href="mailto:support@qraytekHub.com" style="color:#137fec">support@qraytekHub.com</a>
        </p>

        <p class="text">
            Thank you for choosing Qraytek Hub. We look forward to having you on our platform!
        </p>

        <p class="text">
            Best regards,<br/>
            <strong>The Qraytek Hub Team 🎓</strong>
        </p>
    </div>

    {{-- Footer --}}
    <div class="footer">
        <p>
            This email was sent to {{ $teacher->email }} because you applied as a teacher on Qraytek Hub.<br/>
            © {{ date('Y') }} Qraytek Hub. All rights reserved.
        </p>
    </div>

</div>
</body>
</html>
