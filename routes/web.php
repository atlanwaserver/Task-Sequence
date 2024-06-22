<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ChartController;

Route::get('/', function () {
    return redirect('/admin/login');
});
Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/Task-Sequence/public/livewire/update', $handle);
    });

Route::get('custom-view', [ChartController::class, 'index'])->name('custom-view');