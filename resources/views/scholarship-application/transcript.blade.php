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
        <h2>2023 Transcript Form</h2>
        <div>
            <p>Use this website to submit a scholarship application reference to the Robertson County Scholarship Foundation. Please review all following information before continuing as applications must be submitted in their entirety during a single session.</p>
            <p>No data is saved until the application is submitted.</p>
            <p class="text-red-500">All fields marked 'Required' must have a value in order to submit your application.</p>
            <p>Uploaded documents should only be in the .DOC, .DOCX, or .PDF formats.</p>
        </div>

    </div>

    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('scholarship-application.update', $application->id) }}">
        
        @csrf
        {{ method_field('PUT') }}

        <div id="pageOneContainer">
            <h2>Transcript</h2>
            <div class="group">
                <div class="required"></div>
                <label for="upload">Please upload the transcript for {{ $application->first }} {{ $application->last }}.</label>
                <input type="file" class="form-item" name="upload" id="upload" accept=".pdf, .doc, .docx" required>
            </div>
            <input type="hidden" name="type" value="transcript">
        </div>

        <div id="endContainer">
            <input type="submit" class="btn btn-full btn-green" value="Submit Scholarship Application">
        </div>

    </form>


    <script></script>

</body>
</html>