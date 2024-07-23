<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    public function up()
    {
        Schema::create('user_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 8, 2);
            $table->integer('searches_left')->default(0);
            $table->decimal('price_per_search', 8, 2)->nullable();
            $table->string('transaction_reference')->unique();
            $table->string('payment_status')->default('pending');
            $table->timestamp('expires_at')->nullable();
            $table->decimal('amount_given_to_institution', 8, 2)->default(0); // New field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_packages');
    }
}
