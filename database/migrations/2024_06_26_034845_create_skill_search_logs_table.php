<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillSearchLogsTable extends Migration
{
    public function up()
    {
        Schema::create('skill_search_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('search_term');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skill_search_logs');
    }
}
