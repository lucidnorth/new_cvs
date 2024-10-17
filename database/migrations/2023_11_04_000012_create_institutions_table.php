<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institutions');
            $table->string('address');
            $table->float('phone', 15, 2);
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
            $table->string('logo')->nullable();
        });
    }
}
