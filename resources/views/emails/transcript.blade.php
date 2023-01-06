<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RCSF Transcript Requext</title>
</head>
<body>
    
    <p>Please do not reply. This email is not monitored. For assistance, please email <a href=mailto:"stephen.hudak@rcstn.net">Stephen Hudak (stephen.hudak@rcstn.net)</a> or <a href=mailto:"donna.trice@rcstn.net">Donna Trice (donna.trice@rcstn.net)</a> or call 615.384.5588 (Monday to Friday, 8AM - 4PM).</p>

    <p>Hello,</p>
    <p>{{ $application->first }} {{ $application->last }} has submitted a scholarship application. Their transcript is required in order to be complete.</p>
    
    <p>Please visit <a href="{{ route('transcript.upload', [ 'email' => $application->email ]) }}">the transcript upload form</a> to submit the transcript.</p>

</body>
</html>