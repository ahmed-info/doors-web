<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        \DB::statement("
            CREATE VIEW product_view 
            AS
            SELECT products.*, sub_categories.subID,sub_categories.subTitle,sub_categories.image  FROM products
INNER JOIN sub_categories ON products.subcategory_id = sub_categories.subID
        ");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_view');
    }
};
