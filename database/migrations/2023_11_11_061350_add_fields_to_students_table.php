<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('father_name');
            $table->string('grandfather_name');
            $table->string('mother');
            $table->string('placeofbirth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('father_name');
            $table->dropColumn('grandfather_name');
            $table->dropColumn('mother');
            $table->dropColumn('placeofbirth');
        });
    }
}
