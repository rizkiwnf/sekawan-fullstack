<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/booking', [BookingController::class, 'index'])->name('booking');
	Route::get('/booking/export', [BookingController::class, 'export'])->name('bookingExport');
	Route::post('/booking/store', [BookingController::class, 'store'])->name('booking-add');
	Route::post('/booking/update', [BookingController::class, 'update'])->name('booking-update');
	Route::post('/booking/delete', [BookingController::class, 'delete'])->name('booking-delete');
	
	Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle');	
	Route::post('/vehicle/add', [VehicleController::class, 'add'])->name('vehicle-add');

	Route::get('/bookings', [BookingController::class, 'bookingByUser'])->name('bookings');
	Route::post('/bookings/approve', [BookingController::class, 'approveFirst'])->name('bookingsApproveFirst');
	Route::post('/bookings/cancel', [BookingController::class, 'cancelFirst'])->name('bookingsCancelFirst');
	Route::post('/bookings/approve-pusat', [BookingController::class, 'approveFinal'])->name('bookingsApproveFinal');
	Route::post('/bookings/cancel-pusat', [BookingController::class, 'cancelFinal'])->name('bookingsCancelFinal');

	Route::get('/activity', [BookingController::class, 'activity'])->name('activity');


	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});
