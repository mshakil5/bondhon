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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id')->nullable();
            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('source')->nullable();
            $table->string('views')->nullable();
            $table->string('tag')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('type')->default(1); //1 = text blog, 2 = video blog
            $table->longText('link')->default(1); 
            $table->string('video')->nullable(); 
            $table->string('thumbnail')->nullable(); 
            $table->string('meta_tag')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
