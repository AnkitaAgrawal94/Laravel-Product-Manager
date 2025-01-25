<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

}
