<?php

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

// Authentication Routes...
Auth::routes(['register' => false]);

Route::get('/', function () {
    if (Auth::guest()) {
        return view('auth/login');
    }

    return redirect()->route('home');
});


Route::get('/test', function () {
    return view('layouts.base');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
