<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\productController;
use App\Http\Controllers\dashboard\dashboardController;

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

Route::prefix('dashboard')->middleware('verified')->name('dashboard')->group(function () {
    Route::get('/', [dashboardController::class, 'index']);
    Route::prefix('/products')->controller(productController::class)->name('.products')->group(function () {
        Route::get('/all', 'all')->name('.all');
        Route::get('/add', 'add')->name('.add');
        Route::post('/create', 'create')->name('.create');
        Route::get('/edit/{id}', 'edit')->name('.edit');
        Route::put('/update/{id}', 'update')->name('.update');
        Route::delete('/delete/{id}', 'delete')->name('.delete');
    });
});


Route::prefix('dashboard')->group(function () {
    Auth::routes(['verify' => true]);
});
