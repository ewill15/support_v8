<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleClotheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_clothes', function (Blueprint $table) {
            $table->id();
            $table->date('date_sale')->nullable();
            $table->text('description');
            $table->smallInteger('quantity')->default(1);
            $table->decimal('price',5,2);
            $table->boolean('type')->comment('1=Ingreso 0=Gasto');
            $table->boolean('pay_type')->comment('1=Efectivo 0=QR');
            $table->timestamps();
        });
        Schema::create('sale_money', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('money05')->default(0);
            $table->tinyInteger('money1')->default(0);
            $table->tinyInteger('money2')->default(0);
            $table->tinyInteger('money5')->default(0);
            $table->tinyInteger('money10')->default(0);
            $table->tinyInteger('money20')->default(0);
            $table->tinyInteger('money50')->default(0);
            $table->tinyInteger('money100')->default(0);
            $table->tinyInteger('money200')->default(0);
            $table->tinyInteger('type')->comment('1=init 2=daily 3=save');
            $table->date('day');
            $table->unsignedBigInteger('sale_clothe')->nullable();
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
        
        Schema::dropIfExists('sale_money');
        Schema::dropIfExists('sale_clothes');
    }
}
