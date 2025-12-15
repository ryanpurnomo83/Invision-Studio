<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/navbar', App\Livewire\Navbar::class);

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/editor', function(){
    return view('/pages/editor');
})->name('editor');

Route::get('/', function(){
    return view('/pages/welcome');
});