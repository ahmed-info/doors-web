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
        Schema::create('products', function (Blueprint $table) {
            //$table->id();
            $table->increments('prodID');
            $table->unsignedBigInteger('subcategory_id');//
            //$table->foreign('subcategory_id')->references('subID')->on('sub_categories');//
            $table->string('title'); //
            $table->longText('description')->nullable();//
            $table->string('image1')->nullable();// image
            $table->string('image2')->nullable();// image
            $table->string('image3')->nullable();// image
            $table->string('image4')->nullable();// image
            $table->string('image5')->nullable();// image

            $table->string('market')->nullable();//////
            $table->string('capacity')->nullable();//
            $table->string('unit')->nullable();//
            $table->integer('quantity')->nullable();//
            $table->integer('salesCounter')->nullable()->default(0);//
            $table->boolean('showIsHome')->nullable()->default(true);// show is home
            $table->boolean('isBestSeller')->nullable();////
            $table->boolean('selectForYou')->nullable()->default(false);// select for you
            $table->boolean('activeOrNot')->nullable();
            $table->integer('supplier_id')->nullable();//
            $table->string('deliveryTime')->nullable();//
            $table->string('sku')->nullable();//
            $table->string('barcode')->nullable();//
            $table->decimal('price',8,2)->nullable();//
            $table->decimal('priceDiscount',8,2)->nullable();//
            $table->string('originCountry')->nullable();
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
};
