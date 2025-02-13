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
            $table->string('name')->unique(); // string, UNIQUE, NOT NULL
            $table->unsignedInteger('price'); // unsigned integer, NOT NULL
            $table->string('description', 255); // varchar(255), NOT NULL
            $table->enum('condition', ['良好', '目立った傷や汚れ無し', 'やや傷や汚れあり', '状態が悪い'])->notNull(); // enum, NOT NULL
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
