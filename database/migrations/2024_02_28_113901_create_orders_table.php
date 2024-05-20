<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->string('client_name');
            $table->string('client_number');
            $table->unsignedBigInteger('master_id')->nullable();
            $table->string('status')->nullable();
            $table->string('tags');
            $table->text('description');
            $table->string('order_code');
            $table->string('full_price');
            $table->timestamps();

            // Внешние ключи
            $table->foreign('master_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
//написать миграцию про типы
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
