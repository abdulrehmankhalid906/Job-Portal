<?php

use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Combine\CityController;
use App\Http\Controllers\Combine\CountryController;
use App\Http\Controllers\Combine\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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
Route::get('jobs/{id}/{title}', [FrontController::class, 'viewJob'])->name('viewJob');
Route::post('applyjob', [FrontController::class, 'applyjobs'])->name('applyjobs');


Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('verified');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [DashboardController::class, 'companyProfile'])->name('companyProfile')->middleware('auth');
Route::post('/profile', [DashboardController::class, 'updateCompany'])->name('updateCompany')->middleware('auth');

Route::get('/post-job', [DashboardController::class, 'postJob'])->name('postJob')->middleware('auth');
Route::post('/post-job', [DashboardController::class, 'newPost'])->name('newPost')->middleware('auth');
Route::get('/job-listing', [DashboardController::class, 'listing'])->name('listing')->middleware('auth');
Route::get('/applicants', [DashboardController::class, 'applicants'])->name('applicants')->middleware('auth');

// Route::get('/retrive-users',[TestApiController::class,'RetriveUserDate']); we can use api even in web.php



//feedback Section
Route::get('/feedback',[DashboardController::class,'writeFeedback'])->name('feedback')->middleware('auth');
Route::post('/feedback',[DashboardController::class,'storeFeedback'])->name('save-feedback')->middleware('auth');

//Some resource
Route::resource('/category', CategoryController::class);
Route::resource('/countries', CountryController::class);
Route::resource('/cities', CityController::class);
Route::resource('/testimonials', TestimonialController::class);
Route::resource('/companies',CompanyController::class);

Route::resource('/permissions', PermissionController::class);
Route::resource('/roles', RoleController::class);



