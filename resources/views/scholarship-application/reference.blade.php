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
        <h2>2023 Reference Form</h2>
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
            <h2>Reference</h2>

            @if(Route::is('reference.teacher') )
                <div class="group">
                    <div class="required"></div>
                    <label for="teacherMonths">How many months were you in frequent contact with the student?</label>
                    <input type="number" min="0" min="100" class="form-item" name="teacherMonths" required>
                </div>
                <div class="group">
                    <div class="required"></div>
                    <label for="teacherRelationship">What was your relationship to the applicant?</label>
                    <input type="text" placeholder="Example: ELA Teacher" class="form-item" name="teacherRelationship" required>
                </div>
                <div class="group">
                    <div class="required"></div>
                    <label for="teacherRate">Using a scale of 0-99, please rate the applicant on overall promise, comparing him or her to all other students with whom you have had close contact at the same stage in their high school experience.</label>
                    <input type="number" min="0" min="100" class="form-item" name="teacherRate" required>
                </div>
                <div class="group">
                    <div class="required"></div>
                    <label for="teacherUpload">Please upload your reference about the applicant that is not reflected in grades, test scores, or rank in class and explains what makes this applicant truly exceptional.</label>
                    <input type="file" class="form-item" name="teacherUpload" accept=".pdf, .doc, .docx" required>
                </div>
                <input type="hidden" name="type" value="teacher">
            @endif

            @if(Route::is('reference.general') )
                <div class="group">
                    <div class="required"></div>
                    <label for="upload">Please upload your reference about the applicant.</label>
                    <input type="file" class="form-item" name="upload" id="upload" accept=".pdf, .doc, .docx" required>
                </div>
                <input type="hidden" name="type" value="general">
            @endif

            @if(Route::is('reference.ben') )
            <div class="group" id="email">
                <div class="required"></div>
                <label for="yourEmail">Which email address did you receive the reference request?</label>
                <p>The upload field will automatically show after the correct email address is entered.</p>
                <input type="text" placeholder="somebody@example.com" class="form-item" id="yourEmail" name="yourEmail" value="" required>
            </div>
            <div id="hidden" class="hidden">
                <div class="group">
                    <div class="required"></div>
                    <label for="upload">Please upload your reference about the applicant.</label>
                    <input type="file" class="form-item" name="upload" id="upload" accept=".pdf, .doc, .docx" required>
                </div>
                <input type="hidden" name="type" value="ben" id="ben">
            </div>
            @endif

            @if(Route::is('reference.tony') )
            <div class="group">
                <div class="required"></div>
                <label for="upload">Please upload your reference about the applicant that gives an overview of the applicant's leadership and/or bravery.</label>
                <input type="file" class="form-item" name="upload" id="upload" accept=".pdf, .doc, .docx" required>
            </div>
            <input type="hidden" name="type" value="tony">
            @endif
        </div>

        <div id="endContainer">
            <input type="submit" class="btn btn-full btn-green" value="Submit Scholarship Application">
        </div>

    </form>


    <script>

        $('#yourEmail').keyup( function() {
            var yourEmail = $("#yourEmail").val();
            if ( yourEmail == '{{ $application->ghs1Reference1 }}' ) {
                $('#hidden').removeClass("hidden").attr('value', 'ghs1Reference1');
                $('#ben').val("ben11");
            }
            if ( yourEmail == '{{ $application->ghs1Reference2 }}' ) {
                $('#hidden').removeClass("hidden").attr('value', 'ghs1Reference2');
                $('#ben').val("ben12");
            }
            if ( yourEmail == '{{ $application->ghs2Reference1 }}' ) {
                $('#hidden').removeClass("hidden").attr('value', 'ghs2Reference1');
                $('#ben').val("ben21");
            }
            if ( yourEmail == '{{ $application->ghs2Reference2 }}' ) {
                $('#hidden').removeClass("hidden").attr('value', 'ghs2Reference2');
                $('#ben').val("ben22");
            }
        });

    </script>

</body>
</html>