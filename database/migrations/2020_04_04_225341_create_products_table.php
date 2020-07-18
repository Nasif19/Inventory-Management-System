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
            $table->string('name');
            $table->double('quantity', 8, 2);
            $table->string('unit');
            $table->double('price', 8, 2);
            $table->unsignedBigInteger('tbl_type_id')->nullable();
            $table->foreign('tbl_type_id')->references('id')->on('types');
            $table->bigInteger('tbl_brand_id')->nullable();
            $table->foreign('tbl_brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('tbl_category_id');
            $table->foreign('tbl_category_id')->references('id')->on('categories');
            $table->bigInteger('tbl_storage_id');
            $table->foreign('tbl_storage_id')->references('id')->on('storages');
            $table->string('image')->nullable();
            $table->string('status')->default('on');
            $table->tinyInteger('is_delete')->default(0);
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
