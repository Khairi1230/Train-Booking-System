<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserAuthController;
use App\Models\ReservationModel;
use Illuminate\Support\Facades\Route;


Route::get('/service-unavailable', function () {
    abort(503);
})->name('service-unavailable');


Route::view('/', 'home')->name('home');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
// ----------------------------------------Signup---------------------------------------------------------
Route::get('/signup', [UserAuthController::class, 'usersignup'])->name('usersignup');
Route::post('/signupsubmit', [UserAuthController::class, 'signupsubmit'])->name('signupsubmit');
// ----------------------------------------Login--------------------------------------------------
Route::get('/login', [UserAuthController::class, 'userlogin'])->name('userlogin');
Route::post('/loginsubmit', [UserAuthController::class, 'loginsubmit'])->name('loginsubmit');

Route::get('/availablebus', [SearchController::class, 'availablebus'])->name('availablebus');
Route::post('/availablebus', [SearchController::class, 'availablebussubmit'])->name('availablebussubmit');
// ----------------------------------------------------------------userdashboard------------------------------------------------

Route::group(['middleware' => 'UserAuthMiddleware'], function () {
    Route::get('/dashboard', [UserAuthController::class, 'userdashboard'])->name('userdashboard');
});

// ---------------------------------------------Tours---------------------------------------------------------------------
Route::get('/tours', [SearchController::class, 'tours'])->name('tours');
Route::get('/tours/pokhara', [SearchController::class, 'pokharatour'])->name('pokharatour');
Route::get('/tours/chitwan', [SearchController::class, 'chitwantour'])->name('chitwantour');
Route::get('/tours/ilam', [SearchController::class, 'ilamtour'])->name('ilamtour');
// ---------------------------------------------Contact Us--------------------------------------------------------------------------
Route::get('/contactus', [SearchController::class, 'contactus'])->name('contactus');
Route::post('/contactus', [SearchController::class, 'contactsubmit'])->name('contactsubmit');


// ---------------------------------------------Owner-----------------------------------------------------------------------
Route::get('/ownerlogin', [OwnerController::class, 'ownerlogin'])->name('ownerlogin');
Route::post('/ownerloginsubmit', [OwnerController::class, 'ownerloginsubmit'])->name('ownerloginsubmit');
Route::get('/ownersignup', [OwnerController::class, 'ownersignup'])->name('ownersignup');
Route::post('/ownersignupsubmit', [OwnerController::class, 'ownersignupsubmit'])->name('ownersignupsubmit');

Route::group(['middleware' => 'OwnerMiddleware'], function () {
    Route::post('/ownerlogout', [OwnerController::class, 'ownerlogout'])->name('ownerlogout');
    Route::get('/ownerdashboard', [OwnerController::class, 'ownerdashboard'])->name('ownerdashboard');
    Route::get('/availableseat', [OwnerController::class, 'availableseat'])->name('availableseat');
});

Route::get('/addbus', [OwnerController::class, 'addbus'])->name('addbus');
Route::post('/addbussubmit', [OwnerController::class, 'addbussubmit'])->name('addbussubmit');


// ---------------------------------------Book Ticket---------------------------------------------------------------------------
Route::get('/bookticket', [BookingController::class, 'bookticket'])->name('bookticket');
Route::post('/bookticketsubmit', [BookingController::class, 'bookticketsubmit'])->name('bookticketsubmit');


// -------------------------------------------Reservation-------------------------------------------------------------------------
Route::get('/reservation', [ReservationController::class, 'reservation'])->name('reservation');
Route::post('/reservationsubmit', [ReservationController::class, 'reservationsubmit'])->name('reservationsubmit');





Route::get('/bookings/{id}/edit', [BookingController::class, 'editbooking'])->name('editbooking');
Route::delete('/bookings/{id}', [BookingController::class, 'cancelbooking'])->name('cancelbooking');
Route::put('/bookings/{id}', [BookingController::class, 'updatebooking'])->name('updatebooking');
