<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuarentinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarentines', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('food')->nullable();
            $table->enum('type', ['breakfast','lunch', 'dinner','dessert']);
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
        Schema::dropIfExists('quarentines');
    }
}
