<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/navbar', App\Livewire\Navbar::class);

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/studio', function(){
    return view('/pages/studio');
})->name('editor');

Route::get('/', function(){
    return view('/pages/welcome');
});

Route::get('/video-studio', function(){
    return view('/pages/video-studio');
})->name('video-studio');