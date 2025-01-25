<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->unsignedBigInteger('parentID')->nullable(); // For subcategories
            $table->timestamps();

            // Add index for `parent_id` to improve performance on lookups
            $table->index('parentID');

            // Add foreign key constraint for `parent_id`
            $table->foreign('parentID')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
