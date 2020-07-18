<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_requisitions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tbl_product_id');
            $table->foreign('tbl_product_id')->references('id')->on('products');
            $table->bigInteger('tbl_user_id');
            $table->foreign('tbl_user_id')->references('id')->on('users');
            $table->double('quantity', 8, 2);
            $table->double('total_price',8,2);
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('product_requisitions');
    }
}
