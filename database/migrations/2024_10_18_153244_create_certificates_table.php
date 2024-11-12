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
            $table->string('certificate_number')->unique();
            $table->string('student_identification')->unique();
            $table->string('qualification_type');
            $table->string('programme');
            $table->string('class');
            $table->date('year_of_entry');
            $table->date('year_of_completion');
            $table->string('photo')->nullable();  // Store the photo path
            $table->unsignedBigInteger('institution_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
