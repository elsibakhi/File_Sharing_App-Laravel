<?php

use App\Http\Controllers\UploadController;
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

Route::get('/', [UploadController::class,"index"])->name("home");


Route::post("upload",[UploadController::class,"store"])->name("file.store");
Route::get("/{link}",[UploadController::class,"show"])->name("file.show");
Route::get("download/{path}",[UploadController::class,"downloadFile"])->name("file.download");
