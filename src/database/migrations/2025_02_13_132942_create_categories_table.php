<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // id カラム (bigint) PRIMARY KEY
            $table->string('name')->unique(); // name カラム (string) UNIQUE
            $table->timestamps(); // created_at, updated_at カラム (timestamp)

            $table->index('name'); // name カラムにインデックスを追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
