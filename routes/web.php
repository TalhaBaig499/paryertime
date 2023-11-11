<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NamazTimingsController;
use App\Models\city;
use App\Models\country;
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



// Route::get('/namaztimings', [NamazTimingsController::class, 'NamazTimings'])->name('namaz.time');
Route::match(['post','get'],'/', [NamazTimingsController::class, 'getNamazTimings'])->name('namaz.time');

Route::get('/city', [NamazTimingsController::class, 'getCitiesByCountry'])->name('city');

Route::get('/get-cities', [NamazTimingsController::class, 'getCities']);

