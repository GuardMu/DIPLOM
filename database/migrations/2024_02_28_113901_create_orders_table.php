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
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('master_id');
            $table->text('description');
            $table->unsignedBigInteger('order_type'); // Тип заказа
            $table->string('order_code'); // Код заказа
            $table->dateTime('received_at'); // Дата получения
            $table->dateTime('completed_at')->nullable(); // Дата выполнения, может быть null
            $table->timestamps();


            // Внешние ключи
            $table->foreign('master_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_type')->references('id')->on('type_orders')->onDelete('cascade');
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
