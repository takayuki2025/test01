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

// Route::get('/', function () {
//     return view('welcome');
// });





Route::middleware('auth')->group(function () {
    Route::get('admin', [AuthController::class, 'index']);
});

Route::get('/admin', [AuthController::class, 'index']);







Route::get('/', [ContactController::class, 'index']);



// Route::post('/register', [ContactController::class, 'register'])->name('register');;
// Route::match(['get', 'post'], '/register', [ContactController::class, 'register']);

// Route::post('/login', [ContactController::class, 'login'])->name('login');;
// Route::post('/login', [ContactController::class, 'login']);



Route::get('/admin', [ContactController::class, 'admin']);
Route::post('/admin', [ContactController::class, 'admin']);
Route::get('/admin/search', [ContactController::class, 'search']);




Route::post('/confirm', [ContactController::class, 'confirm']);
Route::match(['get', 'post'], '/confirm', [ContactController::class, 'confirm']);



Route::match(['get', 'post'], '/back-to-form', [ContactController::class, 'confirm']);
Route::get('/back-to-form', [ContactController::class, 'confirm2']);
Route::match(['get', 'post'], '/back-to-form', [ContactController::class, 'confirm2']);


// Route::get('/confirm', [ContactController::class, 'confirm']);

Route::post('/thanks', [ContactController::class, 'store']);

Route::post('/test-modal', [ContactController::class, 'modal']);



Route::get('/export', [ExportController::class, 'export']);





Route::post('/postcsv', [ContactController::class, 'postCsv']);




// Route::get('/export-csv', function () {
//     $filename = 'users.csv';
//     $headers = [
//         'Content-Type' => 'text/csv',
//         'Content-Disposition' => "attachment; filename=\"$filename\"",
//     ];

//     $callback = function () {
//         $handle = fopen('php://output', 'w');
//         // ヘッダー行
//         fputcsv($handle, ['ID', '名前', 'メール']);

//         // データ行（chunkでメモリ効率化）
//         User::chunk(100, function ($users) use ($handle) {
//             foreach ($users as $user) {
//                 fputcsv($handle, [$user->id, $user->name, $user->email]);
//             }
//         });

//         fclose($handle);
//     };

//     return response()->stream($callback, 200, $headers);
// });