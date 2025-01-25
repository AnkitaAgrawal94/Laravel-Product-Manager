# Laravel Project: Product and Category Management

This project demonstrates managing products and categories in Laravel, including creating categories and products via Laravel Tinker.

---

## **Setup**

1. **Install Dependencies**:
   ```bash
   composer install
   ```

2. **Configure Database**:
   Update your `.env` file:
   ```env
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

3. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

---

## **Using Laravel Tinker**

To create categories and products via Tinker:

1. Open Tinker:
   ```bash
   php artisan tinker
   ```

2. Execute the following code to create multiple categories and products:

```php
use App\Models\ProductCategory;
use App\Models\Product;

// Create categories
$socksCategory = ProductCategory::create(['name' => 'Socks']);
$otherCategory = ProductCategory::create(['name' => 'Others']);

// Create products for 'Socks' category
Product::create([
    'name' => 'Old Sock',
    'price' => 10.00,
    'description' => 'An old sock.',
    'product_category_id' => $socksCategory->id,
    'created_at' => now()->subYears(3),
    'active' => true,
]);

Product::create([
    'name' => 'New Sock',
    'price' => 15.00,
    'description' => 'A new sock.',
    'product_category_id' => $socksCategory->id,
    'active' => true,
]);

// Create a product for 'Others' category
Product::create([
    'name' => 'Other Item',
    'price' => 25.00,
    'description' => 'A miscellaneous item.',
    'product_category_id' => $otherCategory->id,
    'active' => true,
]);
```

---

## **Expected Outcome**

1. Two categories (`Socks` and `Others`) will be added to the `product_categories` table.
2. Three products (e.g., `Old Sock`, `New Sock`, `Other Item`) will be added to the `products` table, with appropriate relationships.

---

## **Verification**

- Check the `product_categories` and `products` tables in your database to confirm the entries.

---

## **Troubleshooting**

1. **Database not found**: Ensure migrations have been run:
   ```bash
   php artisan migrate
   ```

2. **Connection error**: Verify `.env` database credentials.

---

For more details, visit the [Laravel Documentation](https://laravel.com/docs). Let me know if further refinements are needed!