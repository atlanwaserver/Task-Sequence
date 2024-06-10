<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
Route::get('/', function () {
    return view('welcome');
});
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/Task-Sequence/public/livewire/update', $handle);
    });
