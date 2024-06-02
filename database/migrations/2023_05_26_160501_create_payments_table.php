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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('donation_type_id')->unsigned()->nullable();
            $table->foreign('donation_type_id')->references('id')->on('donation_types')->onDelete('cascade');
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('payer_email');
            $table->float('amount', 10, 2);
            $table->string('currency');
            $table->string('payment_status');
            $table->string('name')->nullable();
            $table->string('donate')->nullable();
            $table->string('taxpayer')->nullable();
            $table->string('others')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('prodeccingfee')->nullable();
            $table->string('comment')->nullable();
            $table->string('donating_cause')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('user_notification')->default(0);
            $table->boolean('admin_notification')->default(0);
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
        Schema::dropIfExists('payments');
    }
};
