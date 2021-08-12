<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->boolean('adult');
            $table->string('backdrop_path');
            $table->text('genre_ids');
            $table->bigInteger('themoviedb_id');
            $table->string('original_language');
            $table->string('original_title');
            $table->text('overview');
            $table->float('popularity');
            $table->string('poster_path');
            $table->date('release_date');
            $table->string('title');
            $table->boolean('video');
            $table->float('vote_average');
            $table->bigInteger('vote_count');
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
        Schema::dropIfExists('movies');
    }
}
