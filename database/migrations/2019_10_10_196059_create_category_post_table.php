<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            // $table->increments('id');
            $table->primary(['post_id', 'category_id']);
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

            $table->foreign('post_id')->references('id')-> 
            on('posts')->onDelete('cascade') ->onUpdate('cascade');

            $table->foreign('category_id')->references('id')-> 
            on('categories')->onDelete('cascade') ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
