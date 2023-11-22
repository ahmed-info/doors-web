<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->unsignedBiginteger('order_userid')->unsigned();
            $table->foreign('order_userid')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('order_pricedelivery')->nullable();
            $table->double('order_price',8,0);
            $table->double('order_totalprice',8,0);
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
        Schema::dropIfExists('orders');
    }
};
