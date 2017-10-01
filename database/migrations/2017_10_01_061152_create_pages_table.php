<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('perex', 250)->nullable();
            $table->string('url');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->date('publish_at');
            $table->integer('status');
            $table->integer('hp_status');
            $table->integer('user_id')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->string('og_title')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_image')->nullable();

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
        Schema::dropIfExists('pages');
    }
}
