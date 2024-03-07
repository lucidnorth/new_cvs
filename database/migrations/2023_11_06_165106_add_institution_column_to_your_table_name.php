<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstitutionColumnToYourTableName extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::table('certificates', function (Blueprint $table) {
                $table->string('institution')->after('existing_column_name'); // Change 'existing_column_name' to the actual column name after which you want to add the new column
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('institution');
        });
    }
};
