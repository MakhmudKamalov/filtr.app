<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KlientController;
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

Route::get('/',);
Route::redirect('/', '/klients');

Route::resource('klients', KlientController::class);
Route::get('klients/{klient}/add', [KlientController::class, 'add'])->name('klients.add');
Route::post('klients/storeAdd', [KlientController::class, 'storeAdd'])->name('klients.storeAdd');
