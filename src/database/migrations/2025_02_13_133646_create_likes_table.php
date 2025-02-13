<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id(); // id カラム (bigint) PRIMARY KEY
            $table->bigInteger('user_id')->unsigned(); // user_id カラム (bigint) 
            $table->bigInteger('item_id')->unsigned(); // item_id カラム (bigint)
            $table->timestamps(); // created_at, updated_at カラム (timestamp)

            $table->primary('id'); // PRIMARY KEY の設定
            $table->unique(['user_id', 'item_id']); // user_id と item_id の組み合わせに UNIQUE 制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // 外部キー制約 (users)
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); // 外部キー制約 (items)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
