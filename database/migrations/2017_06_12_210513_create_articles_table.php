<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('href')->unique();
            $table->text('perex');
            $table->text('text');
            $table->text('image');
            $table->string('date')->default(null);
            $table->integer('category');
            $table->integer('related')->default(0);
            $table->integer('views')->default(0);
            $table->integer('status');
            $table->integer('hp_status');
            $table->timestamps();
            $table->date('publish_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
