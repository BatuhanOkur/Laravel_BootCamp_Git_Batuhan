<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->json('products');
            $table->integer('user_id')->unsigned();
            $table->integer('count');
            $table->decimal('total');
            $table->string('address');
            $table->string('city');
            $table->boolean('is_delivered')->default(false);
            $table->timestamps();
            $table->softDeletes(); //Kesinlikle eklenmeli.

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
