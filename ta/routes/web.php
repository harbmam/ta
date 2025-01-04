<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\pelajarcontroller;
use App\Http\Controllers\jurusancontroller;
use App\Http\Controllers\pengajarcontroller;
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

Route::get('/', function () {
    return view('index');
});
    
Route::resource('pelajar', pelajarcontroller::class);   
Route::resource('jurusan', jurusancontroller::class);   
Route::resource('pengajar', pengajarcontroller::class);   

Route::get('pelajarpdf',[pelajarcontroller::class, 'pelajarPDF']);