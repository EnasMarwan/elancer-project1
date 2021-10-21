<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shorturlscontroller;
use App\Http\Controllers\shortusercontroller;

Route::get('/url', [shortusercontroller::class, 'index'])->name('user_url')->middleware('auth');
Route::get('shorturl', [shorturlscontroller::class, 'index'])->name('shorturl')->middleware('auth');
Route::post('shorturl', [shorturlscontroller::class, 'store'])->name('short_url');
Route::get('/{shorturl}', [shorturlscontroller::class, 'show'])->name('show_url');
