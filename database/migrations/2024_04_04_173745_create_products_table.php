<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name',1000);
            $table->string('ref',1000);
            $table->string('picture');
            $table->foreignId('store_id')->constrained()->onDelete('cascade');
            $table->integer('price');
            $table->integer('quantity');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('primary_desc');
            $table->string('full_desc');
            $table->integer('discount')->default(null);
            $table->date('satrtOn')->default(null);
            $table->date('endOn')->default(null);
            $table->boolean('accepted')->default(false);
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
