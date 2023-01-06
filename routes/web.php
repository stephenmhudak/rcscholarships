<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\School;
use App\Models\Institution;
use App\Models\ScholarshipApplication;

use App\Http\Controllers\ScholarshipApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    $schools = School::all();
    $institutions = Institution::all();
    $states = DB::table('institutions')->select('state')->orderBy('state', 'asc')->distinct()->get();
    return view('scholarship-application.index', ['schools' => $schools, 'institutions' => $institutions, 'states' => $states]);
});

// Application Submission
Route::get('/submitted/{email}/{first}/{last}/{major}', function ($email, $first, $last, $major) {
    $application = ScholarshipApplication::where('email', '=', $email)
                                            ->where('first', '=', $first)
                                            ->where('last', '=', $last)
                                            ->where('major', '=', $major)
                                            ->first()
                                            ->toJson(JSON_PRETTY_PRINT);
    return view('scholarship-application.submitted', ['application' => $application]);
})->name('submitted');

// Reference submission
Route::get('/submitted/reference/{email}/{first}/{last}/{major}', function ($email, $first, $last, $major) {
    $application = ScholarshipApplication::where('email', '=', $email)
                                            ->where('first', '=', $first)
                                            ->where('last', '=', $last)
                                            ->where('major', '=', $major)
                                            ->first();
    return view('scholarship-application.submitted-reference', ['application' => $application]);
})->name('submitted-reference');

// Transcript submission
Route::get('/submitted/transcript/{email}/{first}/{last}/{major}', function ($email, $first, $last, $major) {
    $application = ScholarshipApplication::where('email', '=', $email)
                                            ->where('first', '=', $first)
                                            ->where('last', '=', $last)
                                            ->where('major', '=', $major)
                                            ->first();
    return view('scholarship-application.submitted-transcript', ['application' => $application]);
})->name('submitted-transcript');

// References
Route::get('/reference/teacher/{email}', function ($email) {
    $application = ScholarshipApplication::where('email', '=', $email)->first();
    return view('scholarship-application.reference', ['application' => $application]);
})->name('reference.teacher');
Route::get('/reference/general/{email}', function ($email) {
    $application = ScholarshipApplication::where('email', '=', $email)->first();
    return view('scholarship-application.reference', ['application' => $application]);
})->name('reference.general');
Route::get('/reference/ben/{email}', function ($email) {
    $application = ScholarshipApplication::where('email', '=', $email)->first();
    return view('scholarship-application.reference', ['application' => $application]);
})->name('reference.ben');
Route::get('/reference/tony/{email}', function ($email) {
    $application = ScholarshipApplication::where('email', '=', $email)->first();
    return view('scholarship-application.reference', ['application' => $application]);
})->name('reference.tony');

Route::get('/transcript/{email}', function ($email) {
    $application = ScholarshipApplication::where('email', '=', $email)->first();
    return view('scholarship-application.transcript', ['application' => $application]);
})->name('transcript.upload');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// JSON
// Universities
Route::get('/institutions/{state}', function ($state) {
    $institutions = Institution::where('state', '=', $state)->get();
    return Response::json($institutions);
});
// Application
Route::get('/app/{email}', function ($email) {
    $app = ScholarshipApplication::where('email', '=', $email)->get();
    return Response::json($app);
});

Route::resource('scholarship-application', ScholarshipApplicationController::class);