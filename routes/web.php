<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
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


// Route::get('/{country}', [CountryController::class, 'show'])->name('country.show');
// Route::get('/', [CountryController::class, 'showRandom'])->name('country.random');
// Route::get('/{name?}', [CountryController::class, 'showRandom'])->name('country.random');
// Route::get('/nextrandom', [CountryController::class, 'redirectToRandom'])->name('nextrandom');
// Route::post('/contactus', [CountryController::class, 'contactus'])->name('contactus');


// Home (Random Country)
Route::get('/', [CountryController::class, 'showRandom'])->name('country.random');

// Redirect to Next Random Country
Route::get('/nextrandom', [CountryController::class, 'redirectToRandom'])->name('nextrandom');

// Contact Form
Route::post('/contactus', [CountryController::class, 'contactus'])->name('contactus');

// Show Country by Name (slug)
// Route::get('/{country}', [CountryController::class, 'show'])->name('country.show');
Route::get('/{country}', [CountryController::class, 'show'])->name('country.show');
