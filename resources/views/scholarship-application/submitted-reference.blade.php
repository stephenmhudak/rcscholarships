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

    <div id="titleContainer">
        <h1>Robertson County Scholarship Foundation</h1>
    </div>

    <div id="startContainer">
        <h2>2023 Reference Submission</h2>
        <p>Your reference for {{ $application->first }} {{ $application->last }} has been submitted.</p>
    </div>


</body>
</html>