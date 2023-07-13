<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages',function(){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();            
            $table->string('word')->nullable();
            $table->string('pronuntiation')->nullable();
            $table->text('meaning')->nullable();
            $table->longText('example')->nullable();
            $table->enum('lang_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
        Schema::dropIfExists('dictionaries');
    }
}
