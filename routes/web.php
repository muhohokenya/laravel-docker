<?php

use App\Http\Controllers\FileSearchController;
use App\Http\Controllers\Welcome;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/search-files', [FileSearchController::class,'search'])->name('search-files');

Route::get('/dashboard',[Welcome::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

//require __DIR__.'/auth.php';
