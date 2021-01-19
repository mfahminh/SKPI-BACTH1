<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuController;
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
//    return view('home');
// });

Route::get('/', [BukuController::class, 'index']);
Route::get('/add', [BukuController::class, 'add']);
Route::get('/home', [BukuController::class, 'index']);
Route::post('/push', [BukuController::class, 'push']);
Route::post('/delete', [BukuController::class, 'destroy']);
Route::get('/{value}/edit', [BukuController::class, 'edit']);
Route::post('/update', [BukuController::class, 'update']);



