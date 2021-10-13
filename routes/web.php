<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shorturlsController;

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

Route::get('shorturl', [shorturlscontroller::class, 'index']);
Route::post('shorturl', [shorturlscontroller::class, 'store'])->name('short_url');
Route::get('/{shorturl}', [shorturlscontroller::class, 'show'])->name('show_url');