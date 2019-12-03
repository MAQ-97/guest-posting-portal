<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class   CreateBlogKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('blog_id')->unsigned();
            $table->bigInteger('keyword_id')->unsigned();

            $table->timestamps();
        });
        Schema::table('blog_keywords', function($table) {
            $table->foreign('blog_id')->references('id')->on('blogs') ->onDelete('cascade');
            $table->foreign('keyword_id') ->references('id')->on('keywords')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_keywords');
    }
}
