<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Robertson County Scholarship Foundation: Application</title>
    
    <script src="https://kit.fontawesome.com/5797652965.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css'])

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<body>

    <div id="overlay">
        <div id="text">Your scholarship application is being submitted. This page will refresh and you will receive a verification email when complete.</div>
    </div>

    <div id="titleContainer">
        <h1>Robertson County Scholarship Foundation</h1>
    </div>

    <div id="startContainer">
        <h2>2023 Application Submission</h2>
        <p>Your 2023 scholarship application has been submitted. Please save this page as a PDF for your records.</p>
    </div>

        <div id="pageOneContainer">
            <pre>{{ $application }}</pre>
        </div>


</body>
</html>