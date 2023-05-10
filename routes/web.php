<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/Login', function () {
    return view('LoginForm');
});
/*Route::get('/home', function () {
    return view('home');
});*/

Route::resource('/projects', HomeController::class)->only(['index','show','create','store']);
Route::resource('/tasks', TaskController::class)->only(['index','show','create','store']);