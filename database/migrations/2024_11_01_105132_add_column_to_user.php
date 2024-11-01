<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cellphone')->nullable();
            $table->smallInteger('guarantee')->nullable();
            $table->smallInteger('dob')->nullable();
            $table->boolean('status')->nullable()->comment('active, inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cellphone');
            $table->dropColumn('guarantee');
            $table->dropColumn('dob');
            $table->dropColumn('status');
        });
    }
}
