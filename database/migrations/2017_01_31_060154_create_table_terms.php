<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->integer('song_id')->unsigned();
            $table->foreign('song_id')
                ->references('id')->on('songs')
                ->onDelete('cascade');
            $table->integer('line_number')->unsigned();
            $table->integer('term_number')->unsigned();
            $table->string('text', 100);
            $table->string('lang', 10);
            $table->timestamps();
            $table->primary(['song_id', 'line_number', 'term_number', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
