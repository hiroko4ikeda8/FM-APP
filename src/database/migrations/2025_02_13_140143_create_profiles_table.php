<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // id カラム (bigint) PRIMARY KEY
            $table->bigInteger('user_id')->unsigned(); // user_id カラム (bigint)
            $table->string('avatar')->nullable(); // avatar カラム (string) 画像のパスなど、nullable
            $table->string('name'); // name カラム (string) NOT NULL
            $table->string('postal_code', 8); // postal_code カラム (string(8)) NOT NULL
            $table->string('address'); // address カラム (string) NOT NULL
            $table->string('building_name')->nullable(); // building_name カラム (string) なしでも可 (nullable)
            $table->timestamps(); // created_at, updated_at カラム (timestamp)

            $table->primary('id'); // PRIMARY KEY の設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // 外部キー制約 (users)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
