<?php

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Combine\CityController;
use App\Http\Controllers\Combine\CountryController;
use App\Http\Controllers\Combine\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    'verify' => true   //for the email verification
]);

Route::get('/', [FrontController::class, 'frontHome'])->name('frontHome');
Route::get('viewjobs/{id}/{slug}', [FrontController::class, 'viewJob'])->name('viewJob');
Route::post('applyjob', [FrontController::class, 'applyjobs'])->name('applyjobs');


Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('verified');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [DashboardController::class, 'companyProfile'])->name('companyProfile')->middleware('auth');
Route::post('/profile', [DashboardController::class, 'updateCompany'])->name('updateCompany')->middleware('auth');


// Route::get('/retrive-users',[TestApiController::class,'RetriveUserDate']); we can use api even in web.php
Route::get('/assign-permission/{id}', [RoleController::class, 'assignRolePermissions'])->name('role.assign.permission');
Route::post('/assign-permission/{id}', [RoleController::class, 'updateRolePermissions'])->name('role.update.permission');

//Some resource
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'category' => CategoryController::class,
        'countries' => CountryController::class,
        'cities' => CityController::class,
        'companies' => CompanyController::class,
        'applicants' => ApplicantController::class,
        'testimonials' => TestimonialController::class,
        'jobs' => JobController::class,
        'feedbacks' => FeedbackController::class, 
    ]);
});