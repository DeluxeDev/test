<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RickAndMortyController;
use App\Http\Controllers\EpisodeController;

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

Route::get('/', [RickAndMortyController::class,'index']);
Route::get('/characters', [RickAndMortyController::class,'index'])->name('index');

Route::get('/episodes', [EpisodeController::class,'index'])->name('episodes');