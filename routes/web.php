<?php

use App\Http\Controllers;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware;

Route::get('/', function () {
    return redirect('/homePage');
});

Route::view('/homePage', 'homePage')->name('homePage');

Route::view('/login', 'manageLogin.login')->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('submitLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::view('/forgotPassword', 'manageLogin.forgotPassword')->name('forgotPassword');

Route::post('/forgot/submit', [LoginController::class, 'forgotPassword'])->name('forgotPassword.post');

Route::view('/register', 'manageRegister.participantRegister')->name('register');
Route::view('/registerMessage', 'manageRegister.registerMessage')->name('participant.registerMessage');
Route::post('/registerParticipant', [RegisterController::class, 'registerParticipant'])->name('registerParticipant');

// Route::post('/confirmStaffRegister', [RegisterController::class, 'confirmStaffRegister'])->name('confirmStaffRegister');

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile/{id}', [UserController::class, 'show'])->name('showUserProfile');
        Route::view('/participantProfile', 'manageProfile.participantProfile')->name('participantProfile');
        Route::put('/profile/{id}/update',  [UserController::class, 'update'])->name('updateUserProfile');
    });
});

Route::prefix('staff')->name('staff.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::view('/linkSent', 'manageRegister.linkSent')->name('linkSent');
        Route::get('/profile/{id}', [UserController::class, 'show'])->name('showStaffProfile');
        Route::view('/staffRegistration', 'manageRegister.staffRegistration')->name('staffRegistration');
        Route::post('/registerStaff', [RegisterController::class, 'registerStaff'])->name('registerStaff');
        Route::view('/staffProfile', 'manageProfile.staffProfile')->name('staffProfile');
        Route::put('/staffProfile/{id}/update',  [UserController::class, 'update'])->name('updateStaffProfile');
        Route::view('/staffCompleteRegistration', 'manageRegister.staffCompleteRegistration')->name('staffCompleteRegistration');
    });
});


//Module Payment
Route::prefix('staff')->name('staff.')->group(function () {
    Route::middleware(['auth'])->group(function () {
		Route::middleware(['isBursary:bursary'])->group(function () 
		{
			Route::prefix('bursary')->group(function () 
			{
				Route::get('/makePayment', [Controllers\PaymentController::class,'viewMakePaymentPage']);
				Route::get('/searchPaymentResult',[Controllers\PaymentController::class,'viewSearchPaymentPage']);
				Route::get('/viewReceiptInterface',[Controllers\PaymentController::class,'handlePayment']);
				Route::get('/viewArrearsInterface',[Controllers\PaymentController::class,'viewArrearsInterface']);
				Route::get('/viewArrearDetailInterface',[Controllers\PaymentController::class,'viewArrearDetail']);
				Route::get('/setMontlyAmount',[Controllers\PaymentController::class,'setMonthlyAmount']);
				Route::get('/modifyAmount',[Controllers\PaymentController::class,'modifyAmount']);
				Route::get('/updateAmount',[Controllers\PaymentController::class,'updateAmount']);
				Route::get('/viewRecentReceipt',[Controllers\PaymentController::class,'viewRecentReceip']);
				Route::get('/viewReceiptDetail',[Controllers\PaymentController::class,'viewReceiptDetail']);
				Route::get('/searchReceiptById',[Controllers\PaymentController::class,'searchReceiptById']);
				Route::get('/refreshReceipt',[Controllers\PaymentController::class,'refreshReceipt']);				
			});
		});	
	
		
		Route::middleware(['isAdmin:admin'])->group(function () 
		{
			//admin pages
			Route::prefix('admin')->group(function () 
			{
				Route::get('/makePayment', [Controllers\PaymentController::class,'viewMakePaymentPage']);
				Route::get('/searchPaymentResult',[Controllers\PaymentController::class,'viewSearchPaymentPage']);
				Route::get('/viewReceiptInterface',[Controllers\PaymentController::class,'handlePayment']);
				Route::get('/viewArrearsInterface',[Controllers\PaymentController::class,'viewArrearsInterface']);
				Route::get('/viewArrearDetailInterface',[Controllers\PaymentController::class,'viewArrearDetail']);
				Route::get('/setMontlyAmount',[Controllers\PaymentController::class,'setMonthlyAmount']);
				Route::get('/modifyAmount',[Controllers\PaymentController::class,'modifyAmount']);
				Route::get('/updateAmount',[Controllers\PaymentController::class,'updateAmount']);
				Route::get('/viewRecentReceipt',[Controllers\PaymentController::class,'viewRecentReceip']);
				Route::get('/viewReceiptDetail',[Controllers\PaymentController::class,'viewReceiptDetail']);
				Route::get('/searchReceiptById',[Controllers\PaymentController::class,'searchReceiptById']);
				Route::get('/refreshReceipt',[Controllers\PaymentController::class,'refreshReceipt']);			
			});
			
				
		});	

		Route::middleware(['isParticipant:participant'])->group(function () 
		{
			//participant page
			
		});				
				
		
		
    });
});
