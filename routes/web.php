<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Combine\CityController;
use App\Http\Controllers\Combine\CountryController;
use App\Http\Controllers\Combine\CategoryController;

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
Route::get('/job/category/{category}', [FrontController::class, 'jobCategories'])->name('jobCategories');

//gmail login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/call-back', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth','verified'])->group(function () {

    //Dashboard
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::get('/chats',[AdminController::class,'chatSupport'])->name('chat.support');
    Route::get('/get-messages',[AdminController::class,'getMessages'])->name('get.messages');
    Route::post('/send-message',[AdminController::class,'sendMessage'])->name('send.message');

    //Profile
    Route::get('/profile', [DashboardController::class, 'companyProfile'])->name('companyProfile');
    Route::post('/profile', [DashboardController::class, 'updateCompany'])->name('updateCompany');

    //Role and Permission
    Route::get('/assign-permission/{id}', [RoleController::class, 'assignRolePermissions'])->name('role.assign.permission');
    Route::post('/assign-permission/{id}', [RoleController::class, 'updateRolePermissions'])->name('role.update.permission');

    //Stripe
    Route::post('/session',[StripeController::class,'session'])->name('session');
    Route::get('/success',[StripeController::class,'success'])->name('success');

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
        'packages' => PackageController::class,
        'site' => SiteController::class,
    ]);
});

Route::fallback(function(){
    return Redirect::to('/');  //incase we don't have targeted url
});
