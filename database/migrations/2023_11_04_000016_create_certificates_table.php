<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('certificate_number');
            $table->string('student_identification');
            $table->string('qualification_type');
            $table->string('programme');
            $table->string('class');
            $table->date('year_of_entry');
            $table->date('year_of_completion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
