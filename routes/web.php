<?php

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

Route::get('/laravel', function() {return view('laravel.index');});

Route::get('/laravel/t0', function() { return view('laravel.t0'); });
Route::get('/laravel/t1', function() { return view('laravel.t1'); });
Route::get('/laravel/t2', function() { return view('laravel.t2'); });
Route::get('/laravel/t3', function() { return view('laravel.t3'); });
Route::get('/laravel/t4', function() { return view('laravel.t4'); });
Route::get('/laravel/t5', function() { return view('laravel.t5'); });
Route::get('/laravel/t6', function() { return view('laravel.t6'); });
Route::get('/laravel/t7', function() { return view('laravel.t7'); });
Route::get('/laravel/t8', function() { return view('laravel.t8'); });
Route::get('/laravel/t9', function() { return view('laravel.t9'); });

Route::get('/laravel/t10', function() { return view('laravel.t10'); });
Route::get('/laravel/t11', function() { return view('laravel.t11'); });
Route::get('/laravel/t12', function() { return view('laravel.t12'); });
Route::get('/laravel/t13', function() { return view('laravel.t13'); });
Route::get('/laravel/t14', function() { return view('laravel.t14'); });
Route::get('/laravel/t15', function() { return view('laravel.t15'); });


Route::get('/frontend', function() {return view('frontend.index');});

Route::get('/frontend/t1', function() { return view('frontend.t1'); });
Route::get('/frontend/t2', function() { return view('frontend.t2'); });
Route::get('/frontend/t3', function() { return view('frontend.t3'); });
Route::get('/frontend/t4', function() { return view('frontend.t4'); });
Route::get('/frontend/t5', function() { return view('frontend.t5'); });
Route::get('/frontend/t6', function() { return view('frontend.t6'); });
Route::get('/frontend/t7', function() { return view('frontend.t7'); });
Route::get('/frontend/t8', function() { return view('frontend.t8'); });
Route::get('/frontend/t9', function() { return view('frontend.t9'); });
