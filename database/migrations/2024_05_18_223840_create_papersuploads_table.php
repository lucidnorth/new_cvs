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
        Schema::create('papersuploads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->string('file');
            $table->string('image_path'); // Change 'image' to 'image_path'
            $table->unsignedBigInteger('user_id'); // Assuming you have a users table
            $table->timestamps();
            $table->softDeletes();
            
            // Foreign key constraint (optional, assuming a users table exists)
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papersuploads');
    }
};
