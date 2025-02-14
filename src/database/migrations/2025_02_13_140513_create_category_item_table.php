<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_item', function (Blueprint $table) {
            $table->id(); // id カラム (bigint) PRIMARY KEY
            $table->bigInteger('item_id')->unsigned(); // item_id カラム (bigint)
            $table->bigInteger('category_id')->unsigned(); // category_id カラム (bigint)
            $table->timestamps(); // created_at, updated_at カラム (timestamp)

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); // 外部キー制約 (items)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // 外部キー制約 (categories)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_item');
    }
}
