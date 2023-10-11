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
            $table->tinyInteger('count_password')->default(0)->comment('count pwd change');
            $table->boolean('status')->default(true)->comment('true: in use  false: not in use');
            $table->date('date')->nullable()->comment('date last change');
            $table->text('description')->nullable()->comment('description use username & password'); 
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
