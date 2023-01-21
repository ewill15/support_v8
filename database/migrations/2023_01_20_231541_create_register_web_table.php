<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_web', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('page')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('old_password')->nullable();
            $table->string('hash_password')->nullable();
            $table->boolean('status')->default(true);
            $table->date('date')->nullable();
            $table->date('date_old_password')->nullable();
            $table->text('description')->nullable();
            $table->integer('user_id')->unsigned()->default(1);
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_web');
    }
}
