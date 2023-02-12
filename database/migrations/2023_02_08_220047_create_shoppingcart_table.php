<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('shoppingcart', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->bigInteger('customer_user_id')->unsigned(); //admin
			$table->bigInteger('owner_user_id')->unsigned(); //cliente
			$table->bigInteger('product_id')->unsigned(); //producto
			$table->softDeletes();

			$table->foreign('customer_user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->foreign('owner_user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');

			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('shoppingcart');
    }
};
