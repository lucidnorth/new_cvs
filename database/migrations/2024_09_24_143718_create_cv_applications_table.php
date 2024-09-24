<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_applications', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Applicant's full name
            $table->string('message');  // User message
            $table->string('phone', 20);  // Phone number
            $table->string('country');  // Country
            $table->string('cv_path');  // Path to the CV file
            $table->timestamps();  // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv_applications');
    }
}
