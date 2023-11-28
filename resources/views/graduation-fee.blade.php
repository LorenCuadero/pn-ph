<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p>Transaction Information</p>
    <p>Hello {{ $student_name }},</p>
    <p>Here's an update regarding your graduation fee/s:</p>
    <table>
        <tbody>
            <tr>
                <td style="width: 30%">Amount Due:</td>
                <td class="amount"><b>{{ $amount_due }} PHP</b></td>
            </tr>
            <tr>
                <td style="width: 30%">Amount Paid:</td>
                <td class="amount"><b>{{ $amount_paid }} PHP</b></td>
            </tr>
            <tr>
                <td style="width: 30%">Date:</td>
                <td class="amount"><b>  {{ $date }}</b></td>
            </tr>
        </tbody>
    </table>
    <p>If you have any questions or need further assistance, please contact our support team.</p>
    <p>Thank you.</p>
</body>

</html>
