<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasanakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasanakus', function (Blueprint $table) {
            $table->id();
            $table->date('date_start')->nullable()  ;
            $table->string('name')->nullable();//nombre del passanak. it will be automatic
            $table->date('date_end')->nullable();
            $table->date('date_next')->nullable()->comment('fecha prox. entrega');
            $table->string('round')->default('semanal')->comment('semanal,mensual'); // week,month
            $table->unsignedMediumInteger('amount_total')->nullable(); //total que cada participant entrega
            $table->unsignedTinyInteger('participant_total')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(true)->comment('1=active','0=inactive');
            $table->boolean('automatic')->default(false);
            $table->smallInteger('year_end')->default(0);
            $table->timestamps();
        });

        Schema::create('user_pasanakus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->string('turn')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('comment')->default('');
            $table->unsignedTinyInteger('week_number')->nullable();
            $table->timestamps();
        });
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');  
            $table->timestamps();
        });
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');  
            $table->date('date')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->boolean('sended')->default(false);
            $table->string('type')->nullable()->comment('send notification times: one, many');
            $table->timestamps();
        });
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->mediumInteger('amount')->unsigned()->nullable();

            $table->foreignId('pasanaku_id')
                ->constrained('pasanakus')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('rounds',function(Blueprint $table){
            $table->id();
            $table->date('date')->nullable();
            $table->mediumInteger('order')->nullable();
            $table->timestamps();
        });
        Schema::create('round_pasanakus',function(Blueprint $table){
            $table->id();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');            
            $table->foreignId('round_id')
            ->constrained('rounds');
            $table->timestamps();
        });
        Schema::create('legends', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('short_name')->nullable();
            $table->string('name')->nullable();
            $table->string('color')->default('bg-primary text-white');
            $table->timestamps();
        });
        Schema::create('fee_pasanakus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->foreignId('type')
            ->constrained('legends');
            $table->tinyInteger('round');
            $table->timestamps();
        });
        Schema::create('user_penalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penalty_id')
            ->constrained('penalties');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->timestamps();
        });
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');
            $table->date('start_date')->nullable()->comment('fecha inicio antes de finalizacion pasanaku');
            $table->date('end_date')->nullable()->comment('fecha a realizar');
            $table->mediumInteger('fee')->default(5)->comment('pago de cuota');
            $table->text('description')->nullable()->comment('detalle del destino de cuotas');
            $table->timestamps();
        });
        Schema::create('user_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasanaku_id')
            ->constrained('pasanakus');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->timestamps();
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->boolean('create')->default(false);
            $table->boolean('read')->default(false);
            $table->boolean('update')->default(false);
            $table->boolean('delete')->default(false);
            $table->timestamps();
        });

        Schema::create('user_role_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_permission_id')
            ->constrained('user_permissions');
            $table->foreignId('user_id')
            ->constrained('users');
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
        Schema::dropIfExists('user_pasanakus');
        Schema::dropIfExists('pasanakus');
        Schema::dropIfExists('rules');
        Schema::dropIfExists('penalties');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('round_pasanakus');
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('legends');
        Schema::dropIfExists('fee_pasanakus');
        Schema::dropIfExists('user_penalties');
        Schema::dropIfExists('events');
        Schema::dropIfExists('user_events');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('user_role_permissions');
        Schema::dropIfExists('user_permissions');
    }
}
