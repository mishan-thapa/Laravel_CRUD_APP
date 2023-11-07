<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//routes for crud with api
Route::get('list/{id?}',[MyApiController::class,'list'])->name('list');
Route::post('create',[MyApiController::class,'create'])->name('create');
Route::put('update/{id}',[MyApiController::class,'update'])->name('update');
Route::delete('delete/{id}',[MyApiController::class,'delete'])->name('delete');

//routes for api resource

Route::get('api_resource_view',[MyApiController::class,'api_resource_view']);