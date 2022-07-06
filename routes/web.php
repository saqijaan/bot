<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\QuestionController;
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

Route::middleware('auth')->group(function(){
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    Route::resource('careers', CareerController::class)->except('show');
    Route::resource('questions', QuestionController::class)->except('show');

});

require __DIR__.'/auth.php';
