<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legend_clothes',function(Blueprint $table){
            $table->id();
            $table->string('code');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('inventary', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('size',3)->nullable()->comment('0m,3m,6m,9m,12m,24m,3a-14a');
            $table->double('buy_price',4,2)->nullable();
            $table->double('sale_price',4,2)->nullable();
            $table->string('code',7)->nullable();
            $table->date('date_in')->nullable();
            $table->double('date_out')->nullable();
            $table->foreignId('legend_id')
            ->constrained('legend_clothes');
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
        Schema::dropIfExists('inventary');
    }
}
