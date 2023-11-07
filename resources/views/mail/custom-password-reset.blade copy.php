<!DOCTYPE html>
<html>
<head>
    <style>
        /* Laravel CSS customization */
        .email-header {
            background-color: #f8f9fa;
            padding: 25px 0;
            text-align: center;
        }
        
        .email-body {
            background-color: #ffffff;
            padding: 25px;
        }
        
        .email-button {
            background-color: #1e429f;
            border-radius: 3px;
            color: #ffffff;
            display: inline-block;
            font-size: 14px;
            line-height: 45px;
            text-align: center;
            text-decoration: none;
        }
        
        .email-signature {
            color: #999999;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-header">
        <!-- Header content goes here, if any -->
    </div>
    
    <div class="email-body">
        <h2>Password Reset Request</h2>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <a href="{{ route('reset.password', ['token' => $token, 'email' => $email]) }}" class="email-button">Reset Password</a>
        <p>If you did not request a password reset, no further action is required.</p>
        <div class="email-signature">
            Thanks, {{ config('app.name') }}
        </div>
    </div>
</body>
</html>
