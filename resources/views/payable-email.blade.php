<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payable Email</title>
</head>

<body>
    <p>Hi {{ $student_name }},</p>
    <p>I hope this email finds you well.</p>
    <p>
        We would like to take this opportunity to remind you of your outstanding Parents' Counterpart Balances as of
        {{ $month }}, {{ $year }}. We understand that your families may be facing financial difficulties,
        but we would like to remind you
        that
        your Scholarship Contract states that your parents/guardians agreed to support your counterpart with P500 per
        month.
    </p>
    <p> Here's your account statement, please settle your balances regularly so that it won't be burdensome for you to
        pay
        prior to graduation.</p>
    <p style="margin-left: 5%"> Parents Counterpart as of {{ $month }}, {{ $year }}: <b>{{ $counterpartBalance }} PHP</b>  <br>
        Remaining Debt from Medical Fees: <b>{{ $medicalShareBalance }} PHP</b> <br>
        Other Payable: <b>0.00 PHP</b> <br>
        <b>Total Payable: {{ $total }} PHP</b></p>

    <p>To see all your records, click this link: (ioms-pn-student-parent-portal-link)</p>

    <p>Thank you so much!</p>
</body>

</html>
