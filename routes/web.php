<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\PropertyController;
// use App\Http\controllers\FrontendController as front;
use App\Http\controllers\leaseController;
use App\Http\controllers\MaintenanceRequestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard',function() {
    return view('dashboard');
});

route::resource('property',PropertyController::class);
// route::get('/',[front::class,'welcome'])->name('welcome');



route::resource('lease',LeaseController::class);
route::resource('mainreq',MaintenanceRequestController::class);
Auth::routes();

