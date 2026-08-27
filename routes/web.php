<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::livewire('/inventory', 'inventory.index')->name('inventory.index');
    Route::livewire('/users', 'users.index')->name('users.index');

    //creates
    Route::livewire('/create-user', 'users.create')->name('user.create');
    Route::livewire('/add-inventory', 'inventory.create')->name('inventory.create');

});

require __DIR__.'/settings.php';
