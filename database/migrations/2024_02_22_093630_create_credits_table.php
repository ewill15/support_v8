<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->text('reason');
            $table->decimal('total',6,2);
            $table->mediumInteger('init');
            $table->decimal('monthly fee',5,2);
            $table->tinyInteger('months to pay');
            $table->timestamps();
        });

        Schema::create('user_credits', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('credit_id')
            ->constrained('credits');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->tinyInteger('nro_fee');
            $table->text('observation');
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
        Schema::dropIfExists('credits');
    }
}
