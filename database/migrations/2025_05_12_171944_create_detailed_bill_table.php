<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailedBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailed_bill', function (Blueprint $table) {
            $table->id();          
            $table->foreignId('bill_id')
            ->constrained('bills');
            $table->date('buy_date');
            $table->text('product');
            $table->text('price');
            $table->text('place');
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
        Schema::dropIfExists('detailed_bill');
    }
}
