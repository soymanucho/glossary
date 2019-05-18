<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlossarySubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glossary_subject', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('glossary_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('glossary_subject', function (Blueprint $table) {
            $table->foreign('glossary_id')->references('id')->on('glossaries');
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glossary_subject');
    }
}
