<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('term_id')->unsigned();
            $table->bigInteger('dest_term_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('translations', function (Blueprint $table) {
            $table->foreign('term_id')->references('id')->on('terms');
            $table->foreign('dest_term_id')->references('id')->on('terms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translations');
    }
}
