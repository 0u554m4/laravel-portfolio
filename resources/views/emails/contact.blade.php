<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #14b8a6;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 0 0 8px 8px;
            border: 1px solid #e9ecef;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #14b8a6;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }
        .message-content {
            white-space: pre-wrap;
            min-height: 100px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📧 New Contact Form Submission</h1>
        <p>You have received a new message from your portfolio website</p>
    </div>
    
    <div class="content">
        <div class="field">
            <span class="label">👤 Name:</span>
            <div class="value">{{ $contactData['name'] }}</div>
        </div>
        
        <div class="field">
            <span class="label">📧 Email:</span>
            <div class="value">
                <a href="mailto:{{ $contactData['email'] }}" style="color: #14b8a6; text-decoration: none;">
                    {{ $contactData['email'] }}
                </a>
            </div>
        </div>
        
        <div class="field">
            <span class="label">📝 Subject:</span>
            <div class="value">{{ $contactData['subject'] }}</div>
        </div>
        
        <div class="field">
            <span class="label">💬 Message:</span>
            <div class="value message-content">{{ $contactData['message'] }}</div>
        </div>
        
        <div class="field">
            <span class="label">🕒 Submitted:</span>
            <div class="value">{{ now()->format('F j, Y \a\t g:i A') }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This message was sent from your portfolio contact form.</p>
        <p>You can also view and manage this message in your <a href="{{ url('/admin/dashboard') }}" style="color: #14b8a6;">admin dashboard</a>.</p>
    </div>
</body>
</html>
