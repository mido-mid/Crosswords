<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslatorFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translator_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('translator_id')->unsigned();
            $table->foreignId('source_language')->constrained('languages');
            $table->foreignId('target_language')->constrained('languages');
            $table->integer('words')->default(45);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('translator_id')->references('id')->on('translators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translator_files');
    }
}
