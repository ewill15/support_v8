<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('invoice_number');
            $table->string('control_code')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price',5,2)->default(0);
            $table->integer('company_id')->unsigned()->default(1);
            $table->integer('user_id')->unsigned()->default(1);
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
        Schema::dropIfExists('bills');
    }
}
