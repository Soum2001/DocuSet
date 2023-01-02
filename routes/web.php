<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDetails;
use App\Http\Controllers\UserListing;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Models\User;
use Illuminate\Support\Facades\Route;


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
    return view('login')->with(array('success' => 0, 'failure' => '0'));
})->middleware(AuthMiddleware::class);

Route::get('/login', function () {
    return view('login')->with(array('success' => 0, 'failure' => '0'));
})->middleware(AuthMiddleware::class);

Route::post('registration_page', function () {
    return view('registration')->with(array());
 });
Route::post('registration_page/{email}/{user_name}/{position}',[UserDetails::class, 'registerCandidate']);


Route::post('login', [AuthController::class, 'authenticate']);

Route::post('/register', [UserListing::class, 'register']);

Route::group(['middleware' => ['web', 'user_auth']], function () {
    Route::get('home', [HomeController::class, 'homePage']);
    Route::get('user_listing', [UserListing::class, 'viewUserPage']);
    Route::post('user_details', [UserListing::class, 'loadUserDetails']);
    Route::post('submit_hr_details', [UserListing::class, 'submitHrDetails']);
    Route::post('candidate_details', [UserDetails::class, 'loadCandidateDetails']);
    Route::post('mail_invitation', [UserDetails::class, 'mailInvitation']);
    Route::post('edit_user', [UserListing::class, 'editUserDetails']);
    Route::post('submit_candidate_details', [UserDetails::class, 'submitCandidateDetails']);
});
Route::get('logout', [AuthController::class, 'logout']);
//Route::get('select_hr',[RegistrationController::class,'selectHr']);