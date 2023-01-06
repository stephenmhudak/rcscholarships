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
        <h2>2023 Application Information</h2>
        @if (
            $errors->has('firstName') || $errors->has('lastName') || 
            $errors->has('birth') || $errors->has('gender') || 
            $errors->has('livesWith') || $errors->has('highSchool') || 
            $errors->has('actScore') || $errors->has('actScore') || 
            $errors->has('institution') || $errors->has('major') || 
            $errors->has('email') || $errors->has('address') || 
            $errors->has('city') || $errors->has('zip') || 
            $errors->has('guardianIncome') || $errors->has('responsibleForEducation') || 
            $errors->has('guardianOneOccupation') || $errors->has('guardianOneEmployer') || 
            $errors->has('ownOrRent') || $errors->has('additionalLand') || 
            $errors->has('dependents') || $errors->has('dependentsInCollege') || 
            $errors->has('employed') || $errors->has('workHistory') || 
            $errors->has('teacher') || $errors->has('teacherEmail') || 
            $errors->has('reference') || $errors->has('referenceEmail') || 
            $errors->has('photo') || $errors->has('tax1') || 
            $errors->has('tax2') || $errors->has('essay')
            )
        <div class="row bg-red-500 p-8">
            <h4 class="text-white">Scholarship application not submitted due to missing information. Information in dropdowns or fields where it was possible to add more rows must be re-entered.</h4>
        </div>
        @endif

        <div class="row">
            <div class="col">
                <p>Use this website to submit a scholarship application to the Robertson County Scholarship Foundation. Please review all following information before continuing as applications must be submitted in their entirety during a single session.</p>
                <p>No data is saved until the application is submitted.</p>
                <p class="font-bold">Scholarships are only awarded to residents of Robertson County, Tennessee.</p>
                <p class="text-red-500">All fields marked 'Required' must have a value in order to submit your application.</p>
                <p>It is recommended you print a copy of the application to collect information before completing it online. You can <a href="files/RCSFApplication.pdf" target="_blank" class="file">print this PDF</a> to gather your information prior to completing the online form.</p>
            </div>
            <div class="col">
                <p class="font-bold">To complete an application, you will need:</p>
                <ul>
                    <li>A valid email address that does not end in "@k12.rcstn.net"</li>
                    <li>Contact information:
                        <ul>
                            <li>Home phone (if available)</li>
                            <li>Cell phone (if available, may also be used to receive application completion updates)</li>
                            <li>Address (home and mailing)</li>
                        </ul>
                    </li>
                    <li>Extracurricular activities and community involvement</li>
                    <li>Demonstration of financial need</li>
                    <li>Supporting documents:
                        <ul>
                            <li>Recent headshot of applicant</li>
                            <li>Signed parent/guardian tax return 1040 or 1040A pages 1 and 2.<br>Please view <a href="https://www.irs.gov/pub/irs-pdf/f1040.pdf" target="_blank" class="file">this IRS PDF</a> for reference.</li>
                        </ul>
                    </li>
                    <li>2 references and an email for each. One must be a teacher.</li>
                    <li>An essay explaining why a scholarship matters to you on <a href="files/WhyAScholarshipMattersToMe.docx" class="file">this file</a>. You will need to download the file, type and save your essay on it, then upload it in the "Supporting Documents" section of this form.</li>
                    <li>A copy of your transcript and ACT/SAT scores. Your transcript will automatically be requested from your school counselor upon completion of this form.</li>
                </ul>
            </div>
            <div class="col">
                <p class="font-bold">Some scholarships are available that require additional information. It would be beneficial to submit the associated information if you meet any of the following requirements:</p>
                <ul>
                    <li>If you are a Greenbrier High School student entreprenuer pursuing a trade or vocation:
                        <ul>
                            <li>An essay using the <a href="files/Entrepreneur.docx" class="file">instructions in this file</a>. You will need to download the file, type and save your essay on it, then upload it in the "Additional Scholarship Opportunities" section of this form.</li>
                            <li>2 letters of recommendation, one from a teacher and one from either a coach, employer, community leader or pastor.</li>
                        </ul>
                    </li>
                    <li>If you are a Greenbrier High School student pursuing business or construction management:
                        <ul>
                            <li>An essay using the <a href="files/ConstructionManagement.docx" class="file">instructions in this file</a>. You will need to download the file, type and save your essay on it, then upload it in the "Additional Scholarship Opportunities" section of this form.</li>
                            <li>2 letters of recommendation, one from a teacher and one from either a coach, employer, community leader or pastor.</li>
                            <li>Brief description of yourself and your life plans, goals or dreams.</li>
                        </ul>
                    </li>
                    <li>If you are a student pursuing a degree in education:
                        <ul>
                            <li>An essay using the <a href="files/AspiringEducator.docx" class="file">instructions in this file</a>. You will need to download the file, type and save your essay on it, then upload it in the "Additional Scholarship Opportunities" section of this form.</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <p><input type="checkbox" id="next" name="next" value="next" class="checkbox">I have read the application information.</p>
        <p>You must acknowledge that you have read the application information before continuing. <button id="start" href="" class="btn btn-blue" disabled>Next</button></p>
    </div>

    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('scholarship-application.store') }}">
        
        @csrf

        <div id="pageOneContainer">
            <h2>General Information</h2>

            <div class="group">
                <div class="required"></div>
                <label for="firstName">What is your first name?</label>
                <input type="text" placeholder="First Name" class="form-item" name="firstName" value="{{ old('firstName') }}" required>
                <label for="middleName">What is your middle name?</label>
                <input type="text" placeholder="Middle Name" class="form-item" name="middleName" value="{{ old('middleName') }}">
                <div class="required"></div>
                <label for="lastName">What is your last name?</label>
                <input type="text" placeholder="Last Name" class="form-item" name="lastName" value="{{ old('lastName') }}" required>
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="birth">When were you born?</label>
                <input type="date" class="form-item" name="birth" value="{{ old('birth') }}" required>
                <div class="required"></div>
                <label for="gender">Are you male or female?</label>
                <select name="gender" id="gender" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="livesWith">Who do you live with?</label>
                <select name="livesWith" id="livesWith" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Both Parents">Both Parents</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Relative">Relative</option>
                    <option value="Guardian">Guardian</option>
                </select>

                <div class="required"></div>
                <label for="highSchool">Which high school do you attend?</label>
                <select name="highSchool" id="highSchool" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    @foreach ($schools as  $school)
                        <option value="{{$school->id}}">{{$school->name}}</option>
                    @endforeach
                </select>

                <label for="actScore">What was your highest ACT or SAT composite score?</label>
                <p>Leave blank if you have not taken the ACT or SAT.</p>
                <input type="number" class="form-item" name="actScore" value="{{ old('actScore') }}">
            </div>

            <div class="group">
                {{-- <div class="required"></div>
                <label for="state">In which state is the institution you plan to attend?</label>
                <select name="state" id="state" class="form-item" required>
                    <option value="disabled" selected disabled>Select a state...</option>
                    @foreach ($states as  $state)
                        <option value="{{$state->state}}" data-tokens="{{$state->state}}">{{$state->state}}</option>
                    @endforeach
                </select> --}}
                {{-- <div id="institutionGroup"> --}}
                    <div class="required"></div>
                    <label for="institution">Which institution do you plan to attend?</label>
                    {{-- <select name="institution" id="institution" class="form-item" required>
                        <option value="" selected disabled>Select an institution...</option>
                        @foreach ($institutions as  $institution)
                            <option value="{{$institution->id}}" data-tokens="{{$institution->schoolAlias}}">{{$institution->name}}</option>
                        @endforeach
                    </select> --}}
                    <input type="text" placeholder="Institution" class="form-item" name="institution" value="{{ old('institution') }}" required>
                {{-- </div> --}}
                <div class="required"></div>
                <label for="major">What do you plan to major in?</label>
                <input type="text" placeholder="Degree Major" class="form-item" name="major" value="{{ old('major') }}" required>
            </div>
        </div>

        <div id="pageTwoContainer">
            <h2>Contact Information</h2>
            <p>Email and cell phone information will be used to notify you of reference sumbissions. Mailing addresses are used to officially notify awardees of their award amount.</p>

            <div class="group">
                <div class="required"></div>
                <label for="email">What is your email address?<br>(Do not use an email address ending in @k12.rcstn.net)</label>
                <p>An email address may not be used on multiple applications.</p>
                <input type="email" placeholder="example@example.com" class="form-item" name="email" value="{{ old('email') }}" required>
                <label for="cell">What is your cell phone number?<br>(Only numbers are accepted. Include area code.)</label>
                <p>Only the following carriers will receive texts: Alltel, AT&T, Boost Mobile, Consumer Cellular, Cricket Wireless, Google Fi, Metro PCS, Mint Mobile, Page Plus, Republic Wireless, Simple Mobile, Sprint, T-Mobile, Tracfone, U.S. Cellular, Verizon, Virgin Mobile, and Xfinity Mobile.</p>
                <input type="number" placeholder="6155555555" class="form-item" name="cell" value="{{ old('cell') }}">
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="address">What is your permanent address?<br>(Where do you live?)</label>
                <input type="text" placeholder="123 Main Street" class="form-item" name="address" value="{{ old('address') }}" required>
                <label for="unit">Does this address have an apartment or unit number?<br>(Leave blank if this does not apply to the address.)</label>
                <input type="text" class="form-item" name="unit" value="{{ old('unit') }}">
                <div class="required"></div>
                <label for="city">Which city is this address in?</label>
                <select name="city" id="city" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Adams">Adams</option>
                    <option value="Cedar Hill">Cedar Hill</option>
                    <option value="Cottontown">Cottontown</option>
                    <option value="Cross Plains">Cross Plains</option>
                    {{-- <option value="Goodlettsville">Goodlettsville</option> --}}
                    <option value="Greenbrier">Greenbrier</option>
                    <option value="Millersville">Millersville</option>
                    <option value="Orlinda">Orlinda</option>
                    <option value="Pleasant View">Pleasant View</option>
                    <option value="Portland">Portland</option>
                    <option value="Ridgetop">Ridgetop</option>
                    <option value="Springfield">Springfield</option>
                    <option value="White House">White House</option>
                </select>
                <div class="required"></div>
                <label for="zip">What is the zip code for this address?</label>
                <input type="text" placeholder="37172" class="form-item" name="zip" value="{{ old('zip') }}" required>
            </div>

            <div class="group">
                <p><input type="checkbox" id="hasMailingAddress" name="hasMailingAddress" value="yes" class="checkbox">Check this box if you receive mail somewhere other than where you live.</p>
                <div id="mailingAddressContainer" class="hidden">
                    <label for="mailingAddress">What is your mailing address?<br>(Where do receive mail?)</label>
                    <input type="text" placeholder="123 Main Street" class="form-item" name="mailingAddress" value="{{ old('mailingAddress') }}">
                    <label for="mailingUnit">Does this address have an apartment or unit number?<br>(Leave blank if this does not apply to the address.)</label>
                    <input type="text" class="form-item" name="mailingUnit" value="{{ old('mailingUnit') }}">
                    <label for="mailingCity">What city is this address in?</label>
                    <input type="text" class="form-item" name="mailingCity" value="{{ old('mailingCity') }}">
                    <label for="mailingZip">What is the zip code for this address?</label>
                    <input type="text" placeholder="37172" class="form-item" name="mailingZip" value="{{ old('mailingZip') }}">
                </div>
            </div>
        </div>

        <div id="pageThreeContainer">
            <h2>Extracurricular Activities</h2>

            <div class="group">
                <label for="extracurriculars[]">Please list any extracurricular activities (and officer positions if any) you have participated in.</label>
                <p>Use the "Add Activity" button to insert rows for additional activities. Use the "Remove Activity" button to remove extra rows.</p>
                <div class="form-table">
                    <div class="flex">
                        <p class="w-2/5 font-bold">Activity</p>
                        <p class="w-2/5 font-bold">Position</p>
                        <p class="w-1/5"></p>
                    </div>
                    <div id="extraCurriculars">
                        <div class="flex addition">
                            <input name="extracurriculars[]" type="text" placeholder="Club or Sport, Position(s)" class="form-item w-4/5">
                            <input type="hidden" name="extracurriculars[]"><button class="btn btn-small btn-red remove" onclick="remove_form(this);">Remove Activity</button>
                        </div>
                    </div>
                    <div class="flex">
                        <p class="w-1/5"><button class="btn btn-small btn-green" id="addExtraCurricular">Add Activity</button></p>
                        <p class="w-2/5"></p>
                        <p class="w-2/5"></p>
                    </div>
                </div>
            </div>

            <div class="group">
                <label for="awards[]">Please list any awards or honors you have earned.</label>
                <p>Use the "Add Award" button to insert rows for additional awards. Use the "Remove Award" button to remove extra rows.</p>
                <div class="form-table">
                    <div class="flex">
                        <p class="w-4/5 font-bold">Award</p>
                        <p class="w-1/5"></p>
                    </div>
                    <div id="awards">
                        <div class="flex">
                            <input type="text" placeholder="Award" class="form-item w-4/5" name="awards[]">
                            <button class="btn btn-small btn-red" onclick="remove_form(this);">Remove Award</button>
                        </div>
                    </div>
                    <div class="flex">
                        <p class="w-1/5"><button class="btn btn-small btn-green" id="addAward">Add Award</button></p>
                        <p class="w-4/5"></p>
                    </div>
                </div>
            </div>

            <div class="group">
                <label for="activities[]">Please list any church or community activities you have participated in.</label>
                <p>Use the "Add Activity" button to insert rows for additional awards. Use the "Remove Activity" button to remove extra rows.</p>
                <div class="form-table">
                    <div class="flex">
                        <p class="w-4/5 font-bold">Activity</p>
                        <p class="w-1/5"></p>
                    </div>
                    <div id="activities">
                        <div class="flex">
                            <input type="text" placeholder="Activity" class="form-item w-4/5" name="activities[]">
                            <button class="btn btn-small btn-red" onclick="remove_form(this);">Remove Activity</button>
                        </div>
                    </div>
                    <div class="flex">
                        <p class="w-1/5"><button class="btn btn-small btn-green" id="addActivity">Add Activity</button></p>
                        <p class="w-4/5"></p>
                    </div>
                </div>
            </div>

        </div>

        <div id="pageFourContainer">
            <h2>Financial Needs</h2>

            <div class="group">
                <div class="required"></div>
                <label for="guardianIncome">What is your parents' or guardians' gross income?</label>
                <input type="number" name="guardianIncome" class="form-item" value="{{ old('guardianIncome') }}" required>
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="responsibleForEducation">Which adult is responsible for your education?</label>
                <select name="responsibleForEducation" id="responsibleForEducation" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Both Parents">Both Parents</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Relative">Relative</option>
                    <option value="Guardian">Guardian</option>
                </select>
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="guardianOneOccupation">What does your parent or guardian do for a living?</label>
                <input type="text" name="guardianOneOccupation" class="form-item" value="{{ old('guardianOneOccupation') }}" required>
                <div class="required"></div>
                <label for="guardianOneEmployer">Where is your parent or guardian employed?</label>
                <input type="text" name="guardianOneEmployer" class="form-item" value="{{ old('guardianOneEmployer') }}" required>
            </div>

            <div id="occupation2" class="hidden">
                <div class="group">
                    <label for="guardianTwoOccupation">What does your other parent or guardian do for a living?<br>(Leave blank if there are not 2 adults responsible for your education.)</label>
                    <input type="text" name="guardianTwoOccupation" class="form-item" value="{{ old('guardianTwoOccupation') }}">
                    <label for="guardianTwoEmployer">Where is your parent or guardian employed?<br>(Leave blank if there are not 2 adults responsible for your education.)</label>
                    <input type="text" name="guardianTwoEmployer" class="form-item" value="{{ old('guardianTwoEmployer') }}">
                </div>
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="ownOrRent">Do your parents or guardians own or rent your home?</label>
                <select name="ownOrRent" id="ownOrRent" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Own">Own</option>
                    <option value="Rent">Rent</option>
                </select>
                <div id="home" class="hidden">
                    <label for="homeValue">If your home is owned, what is its value?</label>
                    <input type="number" name="homeValue" class="form-item" value="{{ old('homeValue') }}">
                    <label for="homeEquity">If your home is owned, how much equity does it have?</label>
                    <input type="number" name="homeEquity" class="form-item" value="{{ old('homeEquity') }}">
                </div>
            </div>

            <div class="group">
                <div class="required"></div>
                <label for="additionalLand">Do you parents or guardians own additional land?</label>
                <select name="additionalLand" id="additionalLand" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <div id="land" class="hidden">
                    <label for="landValue">If additional land is owned, what is its value?</label>
                    <input type="number" name="landValue" class="form-item" value="{{ old('landValue') }}">
                    <label for="landDebt">If additional land is owned, how much debt is owed on it?</label>
                    <input type="number" name="landDebt" class="form-item" value="{{ old('landDebt') }}">
                </div>
            </div>
            
            <div class="group">
                <div class="required"></div>
                <label for="dependents">Please list any dependent(s)' name(s) and age(s), including yourself.</label>
                <p>Use the "Add Dependent" button to insert rows for additional activities. Use the "Remove Activity" button to remove extra rows.</p>
                <div class="form-table">
                    <div class="flex">
                        <p class="w-4/5 font-bold">Dependent Name, Age</p>
                        <p class="w-1/5"></p>
                    </div>
                    <div id="dependents">
                        <div class="flex addition">
                            <input  id="dependa" name="dependents[]" type="text" placeholder="Dependent Name, Age" class="form-item w-4/5 dependent" required>
                            <button class="btn btn-small btn-red remove" onclick="remove_form(this);">Remove Dependent</button>
                        </div>
                    </div>
                    <div class="flex">
                        <p class="w-1/5"><button class="btn btn-small btn-green" id="addDependent">Add Dependent</button></p>
                        {{-- <p class="w-2/5"><input id="family" name="dependents" type="hidden" value="" required></p> --}}
                        <p class="w-2/5"></p>
                    </div>
                </div>

                <div class="required"></div>
                <label for="dependentsInCollege">Excluding yourself, how many dependents will be in college for the 2023-2024 school year?</label>
                <input name="dependentsInCollege" type="number" class="form-item" value="{{ old('dependentsInCollege') }}" required>
            </div>

            <div class="group">
                <label for="unusualCircumstances">Please explain any unusual circumstances.</label>
                <p>Examples include: illness of parent, unexpected financial loss, unusually high cost of education such as medical school...</p>
                <textarea name="unusualCircumstances" id="unusualCircumstances" rows="5" class="form-item">{{ old('unusualCircumstances') }}</textarea>
            </div>


            <div class="group">
                <div class="required"></div>
                <label for="employed">Are you employed?</label>
                <select name="employed" id="employed" class="form-item" required>
                    <option value="" selected disabled>Select an option...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <div id="employmentHistory" class="hidden">
                    <label for="employer">If you are employed, who is your employer?</label>
                    <input type="text" name="employer" class="form-item" value="{{ old('employer') }}">
                    <label for="hours">If you are employed, how many hours do you work per week?</label>
                    <input type="number" name="hours" class="form-item" value="{{ old('hours') }}">
                </div>
                <div class="required"></div>
                <label for="workHistory">Please write a short explanation of your work history.</label>
                <p>Include any volunteer work.</p>
                <textarea name="workHistory" id="workHistory" rows="5" class="form-item" required>{{ old('workHistory') }}</textarea>
            </div>
        </div>

        <div id="pageFiveContainer">
            <h2>References</h2>
            <p>Please provide a teacher and a non-teacher reference. You will be notified when a reference has completed their form.</p>
            <div class="group">
                <div class="required"></div>
                <label for="teacher">Teacher Name</label>
                <input type="text" class="form-item" name="teacher" placeholder="Mr. Example" value="{{ old('teacher') }}" required>
                <div class="required"></div>
                <label for="teacherEmail">Teacher Email</label>
                <input type="email" class="form-item" name="teacherEmail" placeholder="mr.example@rcstn.net" value="{{ old('teacherEmail') }}" required>
            </div>
            <div class="group">
                <div class="required"></div>
                <label for="reference">Reference Name</label>
                <input type="text" class="form-item" name="reference" placeholder="Mr. Example" value="{{ old('reference') }}" required>
                <div class="required"></div>
                <label for="referenceEmail">Reference Email</label>
                <input type="email" class="form-item" name="referenceEmail" placeholder="mrexample1@gmail.com" value="{{ old('referenceEmail') }}" required>
            </div>
        </div>

        <div id="pageSixContainer">
            <h2>Supporting Documents</h2>
            
            <div class="group">
                <div class="required"></div>
                <label for="photo">Please submit a recent headshot. Color photos only.</label>
                <p>Great examples include yearbook photos and casual or formal senior photos.</p>
                <p>Only files in the .JPG or .JPEG formats will be accepted.</p>
                <input type="file" name="photo" accept=".jpg, .jpeg" class="form-item form-file" required>
            </div>
            
            <div class="group">
                <div class="required"></div>
                <label for="tax1">Please submit page 1 of your parent or guradian tax return.</label>
                <p>Only files in the .JPG, .JPEG, or .PDF formats will be accepted.</p>
                <input type="file" name="tax1" accept=".jpg, .jpeg, .pdf" class="form-item form-file" required>
            </div>
            
            <div class="group">
                <div class="required"></div>
                <label for="tax2">Please submit page 2 of your parent or guradian tax return.</label>
                <p>Only files in the .JPG, .JPEG, or .PDF formats will be accepted.</p>
                <input type="file" name="tax2" accept=".jpg, .jpeg, .pdf" class="form-item form-file" required>
            </div>
            
            <div class="group">
                <div class="required"></div>
                <label for="essay">Please submit your essay explaining why a scholarship matters to you.</label>
                <p>Only files in the .PDF format will be accepted.</p>
                <input type="file" name="essay" accept=".pdf" class="form-item form-file" required>
            </div>

        </div>

        <div id="pageSevenContainer">
            <h2>Additional Scholarship Opportunities</h2>
            <p>These opportunities have requirements beyond the rest of the application such as additional references and/or essays.</p>
            <p class="mb-4">Some options will automatically display based on which school you attend. The Stephanie D. Mason Aspiring Educator Memorial Scholarship will show only by selecting that you plan to major in education.</p>
            
            <div id="ghs" class="hidden">
                <div id="ghsScholarshipOne" class="group">
                    <p class="important">This oppotunity is for Greenbrier High School students pursuing business or construction management.</p>
                    <label for="ghsOneRefOne">Please provide the email address of an additional reference.</label>
                    <input type="email" name="ghsOneRefOne" class="form-item" value="{{ old('ghsOneRefOne') }}">
                    <label for="ghsOneRefTwo">Please provide the email address of an additional reference.</label>
                    <input type="email" name="ghsOneRefTwo" class="form-item" value="{{ old('ghsOneRefTwo') }}">
                    <label for="ghsOneFile">Upload the essay with the prompt of "I define success in life as..."</label>
                    <p>Only files in the .PDF format will be accepted.</p>
                    <input type="file" accept=".pdf" name="ghsOneFile" class="form-item form-file" value="{{ old('ghsOneFile') }}">
                </div>
                <div id="ghsScholarshipTwo" class="group">
                    <p class="important">This oppotunity is for Greenbrier High School students pursuing a trade.</p>
                    <label for="ghsTwoRefOne">Please provide the email address of an additional reference.</label>
                    <input type="email" name="ghsTwoRefOne" class="form-item" value="{{ old('ghsTwoRefOne') }}">
                    <label for="ghsTwoRefTwo">Please provide the email address of an additional reference.</label>
                    <input type="email" name="ghsTwoRefTwo" class="form-item" value="{{ old('ghsTwoRefTwo') }}">
                    <label for="ghsTwoFile">Upload the essay with the prompt of "In all labor there is profit, but mere talk leads only to poverty..."</label>
                    <p>Only files in the .PDF format will be accepted.</p>
                    <input type="file" accept=".pdf" name="ghsTwoFile" class="form-item form-file" value="{{ old('ghsTwoFile') }}">
                </div>
            </div>
            
            <div id="shs" class="hidden">
                <p class="important">This oppotunity is for Springfield High School students who demonstrate courage and leadership.</p>
                <div id="shsScholarship" class="group">
                    <label for="shsScholarshipOne">Please provide the email address of an additional reference who can speak to your courage and leadership.</label>
                    <input type="email" name="shsScholarshipOne" class="form-item" value="{{ old('shsScholarshipOne') }}">
                </div>
            </div>

            <div id="education">
                <p><input type="checkbox" id="isEducation" name="isEducation" value="isEducation" class="checkbox">I plan to major in education.</p>
                <div id="educationScholarship" class="group">
                    <p class="important">This oppotunity is for students pursuing a degree in education.</p>
                    <label for="educationScholarshipOne">Upload the essay with the prompt of "When I meet people for the first time, I hope they walk away from me feeling..."</label>
                    <p>Only files in the .PDF format will be accepted.</p>
                    <input type="file" accept=".pdf" name="educationScholarshipOne" class="form-item form-file" value="{{ old('educationScholarshipOne') }}">
                </div>
            </div>

        </div>

        <div id="endContainer">
            <input type="submit" class="btn btn-full btn-green" value="Submit Scholarship Application">
        </div>

    </form>


    <script>

        $('#pageOneContainer').addClass("hidden");
        $('#institutionGroup').addClass("hidden");
        $('#pageTwoContainer').addClass("hidden");
        $('#pageThreeContainer').addClass("hidden");
        $('#pageFourContainer').addClass("hidden");
        $('#pageFiveContainer').addClass("hidden");
        $('#pageSixContainer').addClass("hidden");
        $('#pageSevenContainer').addClass("hidden");
        $('#educationScholarship').addClass("hidden");
        $('#endContainer').addClass("hidden");


        $('#next').change( function() {
            if($(this).is(":checked")) {
                $('#start').prop("disabled",false);
            } else {
                $('#start').prop("disabled",true);
            }
        });

        $('#start').on('click', function() {
            $('#pageOneContainer').removeClass("hidden");
            $('#pageTwoContainer').removeClass("hidden");
            $('#pageThreeContainer').removeClass("hidden");
            $('#pageFourContainer').removeClass("hidden");
            $('#pageFiveContainer').removeClass("hidden");
            $('#pageSixContainer').removeClass("hidden");
            $('#pageSevenContainer').removeClass("hidden");
            $('#endContainer').removeClass("hidden");
            $('#startContainer').addClass('hidden');
        });

        $('#hasMailingAddress').change( function() {
            if($(this).is(":checked")) {
                $('#mailingAddressContainer').removeClass("hidden");
            } else {
                $('#mailingAddressContainer').addClass("hidden");
            }
        });

        $('#highSchool').change( function() {
            if($(this).val() == '2'){
                $('#ghs').removeClass("hidden");
            }
            if($(this).val() != '2'){
                $('#ghs').addClass("hidden");
            }
            if($(this).val() == '6'){
                $('#shs').removeClass("hidden");
            }
            if($(this).val() != '6'){
                $('#shs').addClass("hidden");
            }
        });

        $('#responsibleForEducation').change( function() {
            if($(this).val() == 'Both Parents'){
                $('#occupation2').removeClass("hidden");
            }
            if($(this).val() != 'Both Parents'){
                $('#occupation2').addClass("hidden");
            }
        });

        $('#ownOrRent').change( function() {
            if($(this).val() == 'Own'){
                $('#home').removeClass("hidden");
            }
            if($(this).val() != 'Own'){
                $('#home').addClass("hidden");
            }
        });

        $('#additionalLand').change( function() {
            if($(this).val() == 'Yes'){
                $('#land').removeClass("hidden");
            }
            if($(this).val() != 'Yes'){
                $('#land').addClass("hidden");
            }
        });

        $('#employed').change( function() {
            if($(this).val() == 'Yes'){
                $('#employmentHistory').removeClass("hidden");
            }
            if($(this).val() != 'Yes'){
                $('#employmentHistory').addClass("hidden");
            }
        });

        $('#isEducation').change( function() {
            if($(this).is(":checked")) {
                $('#educationScholarship').removeClass("hidden");
            } else {
                $('#educationScholarship').addClass("hidden");
            }
        });

        function remove_form(button){
            jQuery(button).parent().remove();
            event.preventDefault();
        }
        
        $('#addExtraCurricular').click( function (e) {
            e.preventDefault();
            // Adding a row inside the tbody.
            $('#extraCurriculars').append(`
                <div class="flex addition">
                    <input name="extracurriculars[]" type="text" placeholder="Club or Sport, Position(s)" class="form-item w-4/5">
                    <button class="btn btn-small btn-red" onclick="remove_form(this);">Remove Activity</button>
                </div>
            `);
        });

        $('#addAward').click( function (e) {
            e.preventDefault();
            // Adding a row inside the tbody.
            $('#awards').append(`
                <div class="flex addition">
                    <input type="text" placeholder="Award" class="form-item w-4/5" name="awards[]">
                    <button class="btn btn-small btn-red" onclick="remove_form(this);">Remove Award</button>
                </div>
            `);
        });

        $('#addActivity').click( function (e) {
            e.preventDefault();
            // Adding a row inside the tbody.
            $('#activities').append(`
                <div class="flex addition">
                    <input type="text" placeholder="Activity" class="form-item w-4/5" name="activities[]">
                    <button class="btn btn-small btn-red" onclick="remove_form(this);">Remove Activity</button>
                </div>
            `);
        });

        dependaRow = 0;
        $('#addDependent').click( function (e) {
            e.preventDefault();
            // Adding a row inside the tbody.
            dependaRow++;
            $('#dependents').append('<div class="flex addition"><input id="dependa' + dependaRow + '" name="dependents[]" type="text" placeholder="Dependent Name, Age" class="form-item w-4/5 dependents" required><button class="btn btn-small btn-red remove" onclick="remove_form(this);">Remove Dependent</button></div>');
        });

        $('#form').submit( function( event ) {
            document.getElementById("overlay").style.display = "block";
        });

    </script>

</body>
</html>