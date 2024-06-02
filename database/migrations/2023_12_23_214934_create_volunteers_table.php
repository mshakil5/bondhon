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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name',191)->nullable();
            $table->string('email',191)->nullable();
            $table->string('phone',191)->nullable();
            $table->string('profession',191)->nullable();
            $table->string('print_name',191)->nullable();
            $table->string('date',191)->nullable();
            $table->longText('address')->nullable();
            $table->tinyInteger('status')->default('1')->nullable();
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
        Schema::dropIfExists('volunteers');
    }
};
