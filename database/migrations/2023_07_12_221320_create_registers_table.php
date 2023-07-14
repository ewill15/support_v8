<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->text('type')->nullable();
            $table->text('url')->nullable();
            $table->text('page')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->text('hash_password')->nullable();
            $table->boolean('status')->default(true);
            $table->date('date')->nullable();
            $table->text('description')->nullable(); 
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
        Schema::dropIfExists('registers');
    }
}
