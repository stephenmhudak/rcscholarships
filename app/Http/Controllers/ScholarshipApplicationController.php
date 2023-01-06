<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\ScholarshipApplication;
use App\Models\School;
use App\Models\TelecomProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Use Mail;
use App\Mail\ConfirmationCellPhone;     // Sends a confirmation email as a text to a cell phone
use App\Mail\ConfirmationEmail;         // Sends a confirmation email
use App\Mail\ConfirmationReference;     // No use yet
use App\Mail\CounselorEmail;            // Sends an email to the school counselor for transcripts
use App\Mail\ReferenceEmail;            // Sends an email to each listed reference

use Carbon\Carbon;

class ScholarshipApplicationController extends Controller {
    
    public function store(Request $request) {

        // dd($request);

        // Validate the form responses
        request()->validate([
            'firstName' => 'required',
            'middleName' => 'nullable',
            'lastName' => 'required',
            'birth' => 'required',
            'gender' => 'required',
            'livesWith' => 'required',
            'highSchool' => 'required',
            'actScore' => 'nullable',
            'institution' => 'required',
            'major' => 'required',
            'email' => 'required|email|unique:scholarship_applications,email',
            'cell' => 'nullable',
            'address' => 'required',
            'unit' => 'nullable',
            'city' => 'required',
            'zip' => 'required',
            'mailingAddress' => 'nullable',
            'mailingUnit' => 'nullable',
            'mailingCity' => 'nullable',
            'mailingZip' => 'nullable',
            'extracurriculars' => 'nullable',
            'awards' => 'nullable',
            'activitiew' => 'nullable',
            'guardianIncome' => 'required',
            'responsibleForEducation' => 'required',
            'guardianOneOccupation' => 'required',
            'guardianOneEmployer' => 'required',
            'guardianTwoOccupation' => 'nullable',
            'guardianTwoEmployer' => 'nullable',
            'ownOrRent' => 'required',
            'homeValue' => 'nullable',
            'homeEquity' => 'nullable',
            'additionalLand' => 'required',
            'landValue' => 'nullable',
            'landDebt' => 'nullable',
            'dependents' => 'required',
            'dependentsInCollege' => 'required',
            'unusualCircumstances' => 'nullable',
            'employed' => 'required',
            'employer' => 'nullable',
            'hours' => 'nullable',
            'workHistory' => 'required',
            'teacher' => 'required',
            'teacherEmail' => 'required',
            'reference' => 'required',
            'referenceEmail' => 'required',
            'photo' => 'required',
            'tax1' => 'required',
            'tax2' => 'required',
            'essay' => 'required',
            'ghsOneRefOne' => 'nullable',
            'ghsOneRefTwo' => 'nullable',
            'ghsOneFile' => 'nullable',
            'ghsTwoRefOne' => 'nullable',
            'ghsTwoRefTwo' => 'nullable',
            'ghsTwoFile' => 'nullable',
            'shsScholarshipOne' => 'nullable',
            'educationScholarshipOne' => 'nullable'
        ]);

        // Add scholarship application to database
        $scholarship                                = new ScholarshipApplication;
        $scholarship->first                         = $request->firstName;
        $scholarship->middle                        = $request->middleName;
        $scholarship->last                          = $request->lastName;
        $scholarship->dob                           = $request->birth;
        $scholarship->gender                        = $request->gender;
        $scholarship->livesWith                     = $request->livesWith;
        $scholarship->school_id                     = $request->highSchool;
        $scholarship->actScore                      = $request->actScore;
        $scholarship->institution                   = $request->institution;
        $scholarship->major                         = $request->major;
        $scholarship->email                         = $request->email;
        $scholarship->cellPhone                     = $request->cell;
        $scholarship->address1                      = $request->address;
        $scholarship->address1Unit                  = $request->unit;
        $scholarship->address1City                  = $request->city;
        $scholarship->address1Zip                   = $request->zip;
        $scholarship->address2                      = $request->mailingAddress;
        $scholarship->address2Unit                  = $request->mailingUnit;
        $scholarship->address2City                  = $request->mailingCity;
        $scholarship->address2Zip                   = $request->mailingZip;
        $scholarship->extracurriculars              = json_encode($request->extracurriculars);
        $scholarship->awards                        = json_encode($request->awards);
        $scholarship->activities                    = json_encode($request->activities);
        $scholarship->guardianIncome                = $request->guardianIncome;
        $scholarship->adultResponsibleForEducation  = $request->responsibleForEducation;
        $scholarship->guardian1Job                  = $request->guardianOneOccupation;
        $scholarship->guardian1Employer             = $request->guardianOneEmployer;
        $scholarship->guardian2Job                  = $request->guardianTwoOccupation;
        $scholarship->guardian2Employer             = $request->guardianTwoEmployer;
        $scholarship->rentOrOwn                     = $request->ownOrRent;
        $scholarship->homeValue                     = $request->homeValue;
        $scholarship->homeEquity                    = $request->homeEquity;
        $scholarship->additionalLand                = $request->additionalLand;
        $scholarship->landValue                     = $request->landValue;
        $scholarship->landDebt                      = $request->landDebt;
        $scholarship->dependents                    = json_encode($request->dependents); //$request->dependents; //json_encode($request->dependents);
        $scholarship->dependentsInCollege           = $request->dependentsInCollege;
        $scholarship->unusualCircumstances          = $request->unusualCircumstances;
        $scholarship->isEmployed                    = $request->employed;
        $scholarship->employer                      = $request->employer;
        $scholarship->employmentHours               = $request->hours;
        $scholarship->workHistory                   = $request->workHistory;
        $scholarship->teacherName                   = $request->teacher;
        $scholarship->teacherEmail                  = $request->teacherEmail;
        $scholarship->referenceName                 = $request->reference;
        $scholarship->referenceEmail                = $request->referenceEmail;
        // $scholarship->headshot                      = $request->photo;
        if ($file = $request->file('photo')){
            $headshot = "headshot." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $headshot)) {
                $scholarship->headshot = $headshot;
            }
        }
        // $scholarship->tax1                          = $request->tax1;
        if ($file = $request->file('tax1')){
            $tax1 = "tax1." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $tax1)) {
                $scholarship->tax1 = $tax1;
            }
        }
        // $scholarship->tax2                          = $request->tax2;
        if ($file = $request->file('tax2')){
            $tax2 = "tax2." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $tax2)) {
                $scholarship->tax2 = $tax2;
            }
        }
        // $scholarship->essay                         = $request->essay;
        if ($file = $request->file('essay')){
            $essay = "essay." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $essay)) {
                $scholarship->essay = $essay;
            }
        }
        $scholarship->ghs1Reference1                = $request->ghsOneRefOne;
        $scholarship->ghs1Reference2                = $request->ghsOneRefTwo;
        // $scholarship->ghs1Essay                     = $request->ghsOneFile;
        if ($file = $request->file('ghsOneFile')){
            $ghs1Essay = "ghs1Essay." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $ghs1Essay)) {
                $scholarship->ghs1Essay = $ghs1Essay;
            }
        }
        $scholarship->ghs2Reference1                = $request->ghsTwoRefOne;
        $scholarship->ghs2Reference2                = $request->ghsTwoRefTwo;
        // $scholarship->ghs2Essay                     = $request->ghsTwoFile;
        if ($file = $request->file('ghsTwoFile')){
            $ghs2Essay = "ghs2Essay." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $ghs2Essay)) {
                $scholarship->ghs2Essay = $ghs2Essay;
            }
        }
        $scholarship->shs1Reference1                = $request->shsScholarshipOne;
        // $scholarship->educationEssay                = $request->educationScholarshipOne;
        if ($file = $request->file('educationScholarshipOne')){
            $educationEssay = "educationEssay." . $file->getClientOriginalExtension();
            if ($file->move('uploads/' . $scholarship->email, $educationEssay)) {
                $scholarship->educationEssay = $educationEssay;
            }
        }
        $scholarship->save();

        // convert application data to json for emails
        $application = json_encode($scholarship, JSON_PRETTY_PRINT);

        // send a text confirming application submission
        $cellMessage = "Your scholarship application has been submitted. You will only receive future text updates for reference submissions.";
        $carrierDomain = TelecomProvider::select('emailDomain')->get();
        foreach ($carrierDomain as $domain) {
            $cell = $request->cell . "@" . $domain->emailDomain;            
            Mail::to($cell)->send(new ConfirmationCellPhone($cellMessage));
        }

        // send an email confirming application submission
        $email = $request->email;
        $cellMessage = "nope";
        Mail::to($email)->send(new ConfirmationEmail($application, $cellMessage));
        
        // send an email to counselor for transcript
        $application = $scholarship;
        $counselor = School::where('id', '=', $scholarship->school_id)->first();
        $counselorEmail = $counselor->counselorEmails;
        Mail::to($counselorEmail)->send(new CounselorEmail($application));

        // send an email to each reference
        $teacher = $request->teacherEmail;
        $generalReference = $request->referenceEmail;
        // email teacher reference
        $referenceType = "teacher";
        Mail::to($teacher)->send(new ConfirmationReference($application, $referenceType));
        // email general reference
        $referenceType = "general";
        Mail::to($generalReference)->send(new ConfirmationReference($application, $referenceType));
        // email ben the builder reference if exist
        $referenceType = "ben";
        if (!empty($request->ghsOneRefOne)) {
            Mail::to($request->ghsOneRefOne)->send(new ConfirmationReference($application, $referenceType));
        }
        if (!empty($request->ghsOneRefTwo)) {
            Mail::to($request->ghsOneRefTwo)->send(new ConfirmationReference($application, $referenceType));
        }
        if (!empty($request->ghsTwoRefOne)) {
            Mail::to($request->ghsTwoRefOne)->send(new ConfirmationReference($application, $referenceType));
        }
        if (!empty($request->ghsTwoRefTwo)) {
            Mail::to($request->ghsTwoRefTwo)->send(new ConfirmationReference($application, $referenceType));
        }
        // email tony bears reference if exist
        $referenceType = "tony";
        if (!empty($request->shsScholarshipOne)) {
            Mail::to($request->shsScholarshipOne)->send(new ConfirmationReference($application, $referenceType));
        }

        return to_route('submitted', ['email' => $scholarship->email,'first' => $scholarship->first,'last' => $scholarship->last,'major' => $scholarship->major]);
    }





















    // only used to upload files
    // laravel default
    // public function update(Request $request, ScholarshipApplication $scholarshipApplication){}
    public function update(Request $request, ScholarshipApplication $scholarshipApplication){

        if ($request->type == "ben11") {
            if ($file = $request->file('upload')){
                $upload = "ben1Ref1." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->ghs1Reference1Upload = $upload;

                    $cellMessage = "Reference from " . $scholarshipApplication->ghs1Reference1 . " has been submitted.";
                    $application = $scholarshipApplication->ghs1Reference1;
                }
            }
        }

        if ($request->type == "ben12") {
            if ($file == $request->file('upload')){
                $upload = "ben1Ref2." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->ghs1Reference2Upload = $upload;

                    $cellMessage = "Reference from " . $scholarshipApplication->ghs1Reference1 . " has been submitted.";
                    $application = $scholarshipApplication->ghs1Reference2;
                }
            }
        }

        if ($request->type == "ben21") {
            if ($file == $request->file('upload')){
                $upload = "ben2Ref1." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->ghs2Reference1Upload = $upload;

                    $cellMessage = "Reference from " . $scholarshipApplication->ghs2Reference1 . " has been submitted.";
                    $application = $scholarshipApplication->ghs2Reference1;
                }
            }
            
        }

        if ($request->type == "ben22") {
            if ($file = $request->file('upload')){
                $upload = "ben2Ref2." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->ghs2Reference2Upload = $upload;

                    $cellMessage = "Reference from " . $scholarshipApplication->ghs2Reference2 . " has been submitted.";
                    $application = $scholarshipApplication->ghs2Reference2;
                }
            }
        }

        if ($request->type == "general") {
            if ($file = $request->file('upload')){
                $upload = "ben1Ref1." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->referenceUpload = $upload;

                    $cellMessage = "Reference from " . $scholarshipApplication->referenceEmail . " has been submitted.";
                    $application = $scholarshipApplication->ghs1Reference1;
                }
            }
        }

        if ($request->type == "teacher") {
            if ($file = $request->file('upload')){
                $upload = "teacher." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->teacherUpload = $upload;
                }
            }

            $cellMessage = "Reference from " . $scholarshipApplication->teacherEmail . " has been submitted.";
            $application = $scholarshipApplication->teacherEmail;
        }

        if ($request->type == "tony") {
            if ($file = $request->file('upload')){
                $upload = "shs1Reference1Upload." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->shs1Reference1Upload = $upload;
                }
            }

            $cellMessage = "Reference from " . $scholarshipApplication->shs1Reference1 . " has been submitted.";
            $application = $scholarshipApplication->shs1Reference1;
        }
        
        if ($request->type == "transcript") {
            if ($file = $request->file('upload')){
                $upload = "transcript." . $file->getClientOriginalExtension();
                if ($file->move('uploads/' . $scholarshipApplication->email, $upload)) {
                    $scholarshipApplication->transcript = $upload;
                }
            }

            $cellMessage = "Your transcript has been submitted.";
            $application = $scholarshipApplication->transcript;
        }

        // dd($cellMessage);

        // send a text confirming application submission
        $carrierDomain = TelecomProvider::select('emailDomain')->get();
        foreach ($carrierDomain as $domain) {
            $cell = $scholarshipApplication->cellPhone . "@" . $domain->emailDomain;
            Mail::to($cell)->send(new ConfirmationCellPhone($cellMessage));
        }

        // send an email confirming application submission
        $email = $scholarshipApplication->email;
        Mail::to($email)->send(new ConfirmationEmail($application, $cellMessage));

        return to_route('submitted-reference', ['email' => $scholarshipApplication->email,'first' => $scholarshipApplication->first,'last' => $scholarshipApplication->last,'major' => $scholarshipApplication->major]);
    }

    























    // Functions not used yet
    public function index(){}
    public function create(){}
    public function show(ScholarshipApplication $scholarshipApplication){}
    public function edit(ScholarshipApplication $scholarshipApplication){}
    public function destroy(ScholarshipApplication $scholarshipApplication){}
}
