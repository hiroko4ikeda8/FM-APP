<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // bigint, PRIMARY KEY, AUTO_INCREMENT
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // bigint, FOREIGN KEY
            $table->string('name', 255); // ここで unique() を外す
            $table->unsignedInteger('price'); // unsigned integer, NOT NULL
            $table->string('brand_name', 255)->nullable(); // NULLを許可, NOT NULL, メーカー名含む
            $table->string('description', 255); // varchar(255), NOT NULL
            $table->enum('condition', ['良好', '目立った傷や汚れなし', 'やや傷や汚れあり', '状態が悪い'])->notNull(); // enum, NOT NULL
            $table->string('image_path'); // 画像パスを追加
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
