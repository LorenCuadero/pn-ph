<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Account Creation Message</title>
</head>

<body>
    <p>Hello {{ $admin_name }},</p>
    <p>You are now added as an administrator to your account. For the credentials, use your own email and your password
        is: <b>{{ $admin_password }}.</b>
        Please enter use this credential to login initially. If logged in, kindly change password for your safety.</p>
    <p>Thank you,<br>Passerelles Numeriques
        Philippines</p>
</body>

</html>
