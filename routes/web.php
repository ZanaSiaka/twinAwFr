<?php

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

Route::get('/', [App\Http\Controllers\Welcome::class,'index'])->name('welcome');

Route::get('/awards',[App\Http\Controllers\Awards::class,'index'])->name('awards');

Route::get('/vote', [App\Http\Controllers\Vote::class,'index'])->name('vote');

Route::get('/a_propos', [App\Http\Controllers\Welcome::class,'a_propos'])->name('a_propos');
