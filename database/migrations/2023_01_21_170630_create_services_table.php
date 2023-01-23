<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('service_id')->nullable();
            $table->integer('month_id')->unsigned();
            $table->integer('year')->unsigned()->nullable();
            $table->string('amount')->nullable();
            $table->integer('user_id')->unsigned();            
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('month_id')->on('months')->references('id');
            $table->foreign('service_id')->on('services')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
