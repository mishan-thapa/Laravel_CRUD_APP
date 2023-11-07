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

//yo layout haru layout ko lagi use vaxa
/*Route::get('/', function () {
    return view('home');
}); */

Route::get('/contact',function(){
    return view('contact');
});

//yo layout crud_with_model ko lagi use vaxa
use App\Http\Controllers\StudentController;
Route::get('/',[StudentController::class,'index'])->name('home');

//yo chai file upload ko lagi route

Route::get('/file_upload',function(){
    return view('file_upload');
});

Route::post('file_upload',[StudentController::class,'file_upload'])->name('file_upload');

//yo chai authentication wala ko lagi
use App\Http\Controllers\AuthController;


Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::get('register',[AuthController::class,'register_view'])->name('register');
    Route::post('register',[AuthController::class,'register'])->name('register');

});


Route::group(['middleware'=>'auth'],function(){
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/create',[StudentController::class,'create'])->name('create');
    Route::get('/edit_form/{id}',[StudentController::class,'edit_form'])->name('edit_form');
    Route::put('/edit_form/{id}',[StudentController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[StudentController::class,'destroy'])->name('destroy');
});