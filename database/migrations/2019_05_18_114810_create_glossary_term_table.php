<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlossaryTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glossary_term', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('glossary_id')->unsigned();
            $table->bigInteger('term_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('glossary_term', function (Blueprint $table) {
            $table->foreign('glossary_id')->references('id')->on('glossaries');
            $table->foreign('term_id')->references('id')->on('terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glossary_term');
    }
}
