<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customized Email</title>
</head>

<body>
    <p>{{ $salutation }} Batch {{ $selectedBatchYear }},</p>
    <p>{{ $message_content }}</p>
    <p>{{ $conclusion_salutation }}, <br>
        {{ $sender }}</p>
</body>

</html>
