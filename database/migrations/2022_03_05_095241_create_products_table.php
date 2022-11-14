<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable()->default(null);
            $table->text('slug')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->longtext('content')->nullable()->default(null);
            $table->text('price')->nullable()->default(null);
            $table->text('code')->nullable()->default(null);
            $table->text('googlemaps')->nullable();
            $table->unsignedBigInteger('viewed')->nullable()->default(null);
            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->unsignedInteger('status')->nullable()->default(Product::STATUS_ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
