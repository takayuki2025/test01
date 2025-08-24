<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;


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



Route::middleware('auth')->group(function () {
    Route::get('admin', [AuthController::class, 'index']);
});


Route::get('/', [ContactController::class, 'index']);



// Route::post('/login', [ContactController::class, 'admin']);
// Route::post('/register', [ContactController::class, 'admin']);



Route::get('/admin/search', [ContactController::class, 'search']);




Route::post('/confirm', [ContactController::class, 'confirm']);
Route::match(['get', 'post'], '/confirm', [ContactController::class, 'confirm']);


Route::match(['get', 'post'], '/back-to-form', [ContactController::class, 'confirm']);
Route::get('/back-to-form', [ContactController::class, 'confirm2']);
Route::match(['get', 'post'], '/back-to-form', [ContactController::class, 'confirm2']);


Route::post('/thanks', [ContactController::class, 'store']);



Route::post('/test-modal', [ContactController::class, 'modal']);



Route::post('/exportContacts', [ContactController::class, 'exportContacts']);

