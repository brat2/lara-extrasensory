<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'start'])->name('start');

Route::get('/go', [MainController::class, 'makeGuess'])->name('makeGuess');

Route::get('/guess', [MainController::class, 'showGuess'])->name('showGuess');

Route::post('/answer', [MainController::class, 'setResult'])->name('setResult');

Route::get('/result', [MainController::class, 'showResult'])->name('showResult');
