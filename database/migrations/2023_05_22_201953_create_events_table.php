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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText('title')->nullable();
            $table->longText('organizer')->nullable();
            $table->string('category')->nullable();
            $table->string('event_type')->nullable();
            $table->longText('tagline')->nullable();
            $table->longText('venue_name')->nullable();
            $table->string('house_number',191)->nullable();
            $table->string('road_name',191)->nullable();
            $table->string('town',191)->nullable();
            $table->string('postcode',191)->nullable();
            $table->string('country',191)->nullable();
            $table->string('event_start_date',191)->nullable();
            $table->string('event_end_date',191)->nullable();
            $table->string('sale_start_date',191)->nullable();
            $table->string('sale_end_date',191)->nullable();
            $table->string('image',191)->nullable();
            $table->string('banner_image',191)->nullable();
            $table->longText('summery')->nullable();
            $table->longText('description')->nullable();
            $table->string('quantity',191)->nullable();
            $table->double('price',10,2)->nullable();
            $table->double('total_collection',10,2)->nullable();
            $table->integer('sold',191)->nullable();
            $table->integer('available',191)->nullable();
            $table->string('name_of_account')->nullable();
            $table->string('bank_account_country')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_sort_code')->nullable();
            $table->string('bank_account_class')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->string('bank_routing')->nullable();
            $table->string('iban')->nullable();
            $table->string('bank_verification_doc')->nullable();
            $table->string('ref_ids')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('terminate')->default(0);
            $table->tinyInteger('disable')->default(0);
            $table->tinyInteger('admin_notification')->default(0);
            $table->tinyInteger('user_notification')->default(0);
            $table->tinyInteger('user_status')->default(0);
            $table->boolean('homepage')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('events');
    }
};
