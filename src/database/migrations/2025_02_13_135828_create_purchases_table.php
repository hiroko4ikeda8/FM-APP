<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // id カラム (bigint) PRIMARY KEY
            $table->bigInteger('user_id')->unsigned(); // user_id カラム (bigint)
            $table->bigInteger('item_id')->unsigned(); // item_id カラム (bigint)
            $table->bigInteger('shipping_address_id')->unsigned(); // shipping_address_id カラム (bigint)
            $table->enum('payment_method', ['コンビニ払い', 'カード払い']); // payment_method カラム (enum)
            $table->integer('total_price'); // total_price カラム (integer)
            $table->timestamps(); // created_at, updated_at カラム (timestamp)

            $table->primary('id'); // PRIMARY KEY の設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // 外部キー制約 (users)
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); // 外部キー制約 (items)
            $table->foreign('shipping_address_id')->references('id')->on('shipping_addresses')->onDelete('cascade'); // 外部キー制約 (shipping_addresses)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
