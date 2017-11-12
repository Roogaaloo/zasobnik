<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question1')->nullable()->default(null);
            $table->string('question2')->nullable()->default(null);
            $table->string('question3')->nullable()->default(null);
            $table->string('question4')->nullable()->default(null);
            $table->string('question5')->nullable()->default(null);
            $table->string('question6')->nullable()->default(null);
            $table->string('question7')->nullable()->default(null);
            $table->string('question8')->nullable()->default(null);
            $table->string('question9')->nullable()->default(null);
            $table->string('question10')->nullable()->default(null);
            $table->string('question11')->nullable()->default(null);
            $table->string('question12')->nullable()->default(null);
            $table->string('question13')->nullable()->default(null);
            $table->string('question14')->nullable()->default(null);
            $table->string('question15')->nullable()->default(null);
            $table->string('question16')->nullable()->default(null);
            $table->string('question17')->nullable()->default(null);

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
        Schema::dropIfExists('t_form');
    }
}
