
<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    // Products
    Route::livewire('/products', 'inventory.index')
        ->name('inventory.index');

        // Stock Inventory
        Route::livewire('/stock-inventory', 'stock_inventory.index')
            ->name('stock_inventory.index');

        // New Stock Entries
        Route::livewire('/stock-entries', 'stock_entries.index')
            ->name('stock_entries.index');

        // Purchase Returns
        Route::livewire('/purchase-returns', 'purchase_returns.index')
            ->name('purchase_returns.index');

        // QA Stocks
        Route::livewire('/qa-stocks', 'qa_stocks.index')
            ->name('qa_stocks.index');
        

});

require __DIR__.'/settings.php';

