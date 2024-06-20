<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\medicController;
use App\Models\medis;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(PharmacyController::class)->group(function () {
    Route::get('/index', 'index');


});




Route::controller(Authcontroller::class)->group(function () {
    Route::get('/registration', 'registration')->middleware('Checklogin');
    Route::post('register-user', 'registerUser')->name('register.user');

    Route::get('login', 'login');
    Route::post('login-user', 'loginUser')->name('login.user');

    // Route::get('about', 'dashboard')->middleware('Checklogin');
    Route::get('about', 'dashboard');
    Route::get('/logout', 'logout');

    Route::post('/cart', 'carts')->name('add.cart');
    Route::get('/viewcart', 'viewcart');

    Route::get('/bill','bill')->name('bill.sale');
    // Route::get('/billall', 'postbill')->name('bill.sale');
    // Route::put('/postbill/{idsale}', 'postbill')->name('billpost.sale');

    Route::get('/history','historyuser');
    Route::get('/chartgoogle', 'chartgoogle');




});



Route::controller(AuthController::class)->group(function () {

});


Route::controller(medicController::class)->group(function () {
    Route::get('/add-medic', 'create');
    Route::post('/create-medic', 'store')->name('medic.store');
    Route::get('/all-medic', 'index');
    Route::get('/show-medic/{id}', 'show');
    Route::get('/edit-medic/{id}', 'edit');
    Route::post('/update-medic', 'update')->name('medic.update');
    Route::delete('/delete-medic/{id}', 'destroy')->name('medic.delete');
    Route::delete('/delete-cart/{id}', 'destroycart')->name('del.cart');



    Route::post('/test', 'sale')->name('sale.id');

    Route::get('/all', [medicController::class, 'allMedic'])->name('all-medic');

});

// Route::get('/cartview', [cartController::class , 'carts'])->name('cart-view');
