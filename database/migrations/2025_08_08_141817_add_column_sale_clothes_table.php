<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSaleClothesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_clothes', function (Blueprint $table) {
             $table->tinyInteger('week')->unsigned()->nullable()->comment('nro de semana de registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_clothes', function (Blueprint $table) {
            $table->dropColumn('week');
        });
    }
}
