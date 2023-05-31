<?php

use App\Http\Controllers\OfferController;
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

Route::get('/',  [OfferController::class, 'index'])->name('home');
Route::get('/oferta/{offer}',  [OfferController::class, 'show'])->name('offers.show');
Route::get('/oferta/{offer}/aplicar',  [OfferController::class, 'apply'])->middleware(['auth'])->name('offers.apply');
