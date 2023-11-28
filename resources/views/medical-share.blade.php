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
    <p>Here's an update regarding your medical share:</p>
    <table>
        <tbody>
            <tr>
                <td style="width: 30%">Medical Concern:</td>
                <td class="amount"><b>{{ $medical_concern }}</b></td>
            </tr>
            <tr>
                <td style="width: 30%">Total Medical Expense:</td>
                <td class="amount"><b>{{ $total_cost }} PHP</b></td>
            </tr>
            <tr>
                <td style="width: 30%">Amount Due (15% Medical Share):</td>
                <td class="amount"><b>{{ $percent_share_as_amount_due }} PHP</b></td>
            </tr>
            <tr>
                <td style="width: 30%">Amount Paid:</td>
                <td class="amount"><b>{{ $amount_paid }} PHP</b></td>
            </tr>
            <tr>
                <td style="width: 30%">Date:</td>
                <td class="amount"><b> {{ $date }}</b></td>
            </tr>
        </tbody>
    </table>
    <p>If you have any questions or need further assistance, please contact our support team.</p>
    <p>Thank you.</p>
</body>

</html>
