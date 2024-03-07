<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPapersTable extends Migration
{
    public function up()
    {
        Schema::table('papers', function (Blueprint $table) {
            $table->unsignedBigInteger('paper_title_id')->nullable();
            $table->foreign('paper_title_id', 'paper_title_fk_9079812')->references('id')->on('users');
        });
    }
}
