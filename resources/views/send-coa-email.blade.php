<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payable Email</title>
</head>
<style>
    .amount {
        padding-left: 5%;
    }
</style>

<body>
    <p>Dear {{ $student_name }}</p>

    <p>I hope this email finds you well.</p>

    <p>You will be graduating from Passerelles Numeriques Philippines Scholarship this coming {{ $graduation_date }}.
    </p>

    <p>Here's your statement of account, settling your financial situation with PN:</p>
    <div>
        <table>
            <tbody>
                <!-- Add these lines to display the balance values in your email view -->
                <tr>
                    <td>Remaining Debt from Parent's Counterpart:</td>
                    <td class="amount"><b>{{ number_format($counterpartBalance, 2) }} PHP</b></td>
                </tr>
                <tr>
                    <td>Remaining Debt from Medical Fees:</td>
                    <td class="amount"><b>{{ number_format($medicalShareBalance, 2) }} PHP</b></td>
                </tr>
                <tr>
                    <td>Graduation Fees at USC:</td>
                    <td class="amount"><b>{{ number_format($graduationFeeBalance, 2) }} PHP</b></td>
                </tr>
                <tr>
                    <td>Other Remaining Debts:</td>
                    <td class="amount"><b>{{ number_format($personalShareBalance, 2) }} PHP</b></td>
                </tr>
                <tr>
                    <td><b>Total Payable:</b></td>
                    <td class="amount"><b
                            style="color: #33711D;">{{ number_format($counterpartBalance + $medicalShareBalance + $graduationFeeBalance + $personalShareBalance, 2) }}
                            PHP</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <p>Thank you so much!</p>
</body>

</html>
