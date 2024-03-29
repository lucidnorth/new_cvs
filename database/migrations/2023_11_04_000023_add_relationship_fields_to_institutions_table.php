<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInstitutionsTable extends Migration
{
    public function up()
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_9168068')->references('id')->on('users');
        });
    }
}
