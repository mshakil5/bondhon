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
        Schema::create('event_withdraw_reqs', function (Blueprint $table) {
            $table->id();
            $table->string('date',255)->nullable();
            $table->string('req_no',255)->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('event_name',255)->nullable();
            $table->double('amount',10,2)->nullable();
            $table->longText('note',255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('user_notification')->default(0);
            $table->tinyInteger('admin_notification')->default(0);
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
        Schema::dropIfExists('event_withdraw_reqs');
    }
};
