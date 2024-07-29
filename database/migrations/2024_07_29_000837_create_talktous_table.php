<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalktousTable extends Migration
{
    public function up()
    {
        Schema::create('talktous', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('recipient');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('talktous');
    }
}

