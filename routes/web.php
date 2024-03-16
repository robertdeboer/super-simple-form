<?php

use App\Livewire\FormMarriage;
use App\Livewire\FormResult;
use App\Livewire\FormUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form/me', FormUser::class)->name('form.user');
Route::get('/form/marriage', FormMarriage::class)->name('form.marriage');
Route::get('/form/result', FormResult::class)->name('form.result');
