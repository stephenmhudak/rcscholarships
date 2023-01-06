<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RCSF Reference</title>
</head>
<body>
    
    <p>Please do not reply. This email is not monitored. For assistance, please email <a href=mailto:"stephen.hudak+scholarship@rcstn.net">Stephen Hudak (stephen.hudak+scholarship@rcstn.net)</a> or <a href=mailto:"donna.trice+scholarship@rcstn.net">Donna Trice (donna.trice+scholarship@rcstn.net)</a> or call 615.384.5588 (Monday to Friday, 8AM - 4PM).</p>

    <p>Hello,</p>
    <p>You have been provided as a reference for {{ $application->first }} {{ $application->last }}.</p>
    
    @if ($referenceType = "teacher")
    <p>Please visit <a href="{{ route('reference.teacher', [ 'email' => $application->email ]) }}">the scholarship reference form</a> to complete your reference.</p>
    @elseif ($referenceType = "general")
    <p>Please visit <a href="{{ route('reference.general', [ 'email' => $application->email ]) }}">the scholarship reference form</a> to complete your reference.</p>
    @elseif ($referenceType = "ben")
    <p>Please visit <a href="{{ route('reference.ben', [ 'email' => $application->email ]) }}">the scholarship reference form</a> to complete your reference.</p>
    @elseif ($referenceType = "tony")
    <p>Please visit <a href="{{ route('reference.tony', [ 'email' => $application->email ]) }}">the scholarship reference form</a> to complete your reference.</p>
    @else
    <p>Oops - you received this email in error. Please disregard.</p>
    @endif

</body>
</html>