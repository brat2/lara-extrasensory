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

Route::get('/', [MainController::class, 'start']);

Route::get('/go', [MainController::class, 'makeGuess']);

Route::get('/guess', [MainController::class, 'showGuess']);

Route::post('/answer', [MainController::class, 'setResult']);

Route::get('', [MainController::class, 'showResult']);
