<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_package_institutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_package_id');
            $table->unsignedBigInteger('institution_id');
            $table->decimal('amount_given_to_institution', 8, 2);
            $table->timestamps();
        
            $table->foreign('user_package_id')->references('id')->on('user_packages')->onDelete('cascade');
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_package_institutions');
    }
};
