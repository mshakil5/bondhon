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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname',255)->nullable();
            $table->string('clientid',255)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('is_type')->default(0);
            $table->string('house_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('town')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('r_name')->nullable();
            $table->string('r_position')->nullable();
            $table->string('r_phone')->nullable();
            $table->string('r_photo')->nullable();
            $table->string('r_address')->nullable();
            $table->string('photo')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_sortcode')->nullable();
            $table->double('balance',10,2)->nullable();
            $table->double('overdrawn_amount',10,2)->nullable();
            $table->string('admin_notify')->nullable();
            $table->string('agent_notify')->nullable();
            $table->string('notification')->nullable();
            $table->string('about')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('whatsapp')->nullable();
            $table->boolean('status')->default(1);
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
