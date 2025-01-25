<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Product;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('products:mark-inactive', function () {
    $cutoffDate = now()->subYears(2);

    // Update only active products with category name 'Socks' and created more than 2 years ago
    $productsUpdated = Product::where('active', true) // Only consider active products
        ->whereHas('category', function ($query) {
            $query->where('name', 'Socks');
        })
        ->where('created_at', '<', $cutoffDate)
        ->update(['active' => false]);

    $this->info("{$productsUpdated} active products have been marked as inactive.");
})->describe('Mark products as inactive if category is Socks, they are more than 2 years old, and still active.');
