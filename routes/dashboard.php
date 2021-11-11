<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shorturlscontroller;
use App\Http\Controllers\shortusercontroller;

Route::get('/url', [shortusercontroller::class, 'index'])->name('user_url')->middleware('auth');
Route::delete('/{id}', [shortusercontroller::class, 'destroy'])->name('url.destroy');
Route::get('shorturl', [shorturlscontroller::class, 'index'])->name('shorturl')->middleware('auth');
Route::post('shorturl', [shorturlscontroller::class, 'store'])->name('short_url');
Route::get('/clickinfo/{id}', [shorturlscontroller::class, 'showclick'])->name('show.click');
Route::get('/{shorturl}', [shorturlscontroller::class, 'show'])->name('show_url');

