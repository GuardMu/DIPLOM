<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_requests', function (Blueprint $table) {
            $table->id();
            $table->string('tags');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_requests');
    }
}

