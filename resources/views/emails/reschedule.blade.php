<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reschedule Your Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin: 10px 0;
        }

        .content strong {
            font-weight: bold;
            color: #4CAF50;
        }

        .button-container {
            margin-top: 20px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .accept {
            background-color: #4CAF50;
            color: white;
        }

        .accept:hover {
            background-color: #45a049;
        }

        .reject {
            background-color: #f44336;
            color: white;
        }

        .reject:hover {
            background-color: #e53935;
        }

        .footer {
            background-color: #f4f6f9;
            padding: 20px;
            text-align: center;
            font-size: 14px;
        }

        .footer p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>Reschedule Your Appointment</h1>
        </div>
        <!-- Body Section -->
        <div class="content">
            <p>Dear Patient,</p>
            <p>Your appointment is scheduled from <strong>{{ $startTime }}</strong> to
                <strong>{{ $endTime }}</strong>.
            </p>
            @if ($status === 'pending')
                <p>Please confirm your response by clicking one of the following buttons. You can only take one action,
                    and the status cannot be changed after your response:</p>
                <div class="button-container">
                    <a href="{{ url('accept-reschedule/' . $rescheduleId) }}" class="btn accept">Accept</a>
                    <a href="{{ url('reject-reschedule/' . $rescheduleId) }}" class="btn reject">Reject</a>
                </div>
            @elseif($status === 'accepted')
                <p><strong>Thank you! The reschedule request has been accepted.</strong></p>
                <div class="alert alert-success" role="alert">
                    Status: <strong>{{ ucfirst($status) }}</strong>
                </div>
            @elseif($status === 'rejected')
                <p><strong>The reschedule request has been rejected.</strong></p>
                <div class="alert alert-danger" role="alert">
                    Status: <strong>{{ ucfirst($status) }}</strong>
                </div>
            @endif
        </div>
        <!-- Footer Section -->
        <div class="footer">
            <p>If you did not request this reschedule, please ignore this email.</p>
        </div>
    </div>
</body>

</html>
