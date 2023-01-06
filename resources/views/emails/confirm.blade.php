<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>rcscholarships.org Confirmation Email</title>
</head>
<body>
    @if ($cellMessage == "nope")
        <h1>Your scholarship application has been submitted.</h1>
        <p>Please do not reply. This email is not monitored. For assistance, please email <a href=mailto:"stephen.hudak+scholarship@rcstn.net">Stephen Hudak (stephen.hudak+scholarship@rcstn.net)</a> or <a href=mailto:"donna.trice+scholarship@rcstn.net">Donna Trice (donna.trice+scholarship@rcstn.net)</a> or call 615.384.5588 (Monday to Friday, 8AM - 4PM).</p>
        <p>Please keep this email for your records.</p>
        <p>All references have been emailed and you will receive email (and text if number was provided) updates when a reference has submitted their form.</p>
        <p>{{ $application }}</p>
    @endif
    @if ($cellMessage != "nope")
        <h1>{{ $cellMessage }}</h1>
    @endif
</body>
</html>