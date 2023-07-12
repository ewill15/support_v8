<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'username',
        // 'type',
        // 'password',
        // 'date',
        // 'description'
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('page')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('hash_password')->nullable();
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
