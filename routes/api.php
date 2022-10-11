<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ExcelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('files/export',[ExcelController::class,'export']);
Route::post('files/export-deleted',[ExcelController::class,'exportDeletedFiles']);
Route::post('files/attachments-received-deleted-files',[ExcelController::class,'exportAttachmentsReceivedDeletedFiles']);


Route::get('files',[ApiController::class,'index']);
Route::post('/tokens/create',[ApiController::class,'issueToken']);
Route::post('/register',[ApiController::class,'register']);
