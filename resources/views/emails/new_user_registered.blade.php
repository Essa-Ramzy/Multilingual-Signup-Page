<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #eee;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New User Registration</h2>
        </div>
        
        <p>A new user <strong>{{ $user->user_name }}</strong> is registered to the system.</p>
        
        <p>User details:</p>
        <ul>
            <li>Full Name: {{ $user->full_name }}</li>
            <li>Email: {{ $user->email }}</li>
            <li>Registration Time: {{ $user->created_at }}</li>
        </ul>
        
        <div class="footer">
            <p>This is an automated message. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html> 