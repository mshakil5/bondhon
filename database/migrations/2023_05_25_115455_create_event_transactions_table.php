<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('date',255)->nullable();
            $table->string('tran_no',255)->nullable();
            $table->string('tran_type',255)->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->double('amount',10,2)->nullable();
            $table->double('tips',10,2)->nullable();
            $table->double('commission',10,2)->nullable();
            $table->double('total_amount',10,2)->nullable();
            $table->string('payment_type',255)->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('token',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('tips_percent',255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('notification')->default(0);
            $table->boolean('show_name')->default(1);
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('event_transactions');
    }
};
