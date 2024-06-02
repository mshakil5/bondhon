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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('left_title',255)->nullable();
            $table->longText('left_description')->nullable();
            $table->string('right_header',255)->nullable();
            $table->string('right_title1',255)->nullable();
            $table->string('right_description1',255)->nullable();
            $table->string('right_title2',255)->nullable();
            $table->string('right_description2',255)->nullable();
            $table->string('right_title3',255)->nullable();
            $table->string('right_description3',255)->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('sliders');
    }
};
