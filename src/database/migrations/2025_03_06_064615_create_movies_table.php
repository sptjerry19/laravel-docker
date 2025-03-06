<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('year')->nullable();
            $table->string('rated')->nullable();
            $table->date('released')->nullable();
            $table->string('runtime')->nullable();
            $table->string('genre')->nullable();
            $table->string('director')->nullable();
            $table->string('writer')->nullable();
            $table->text('actors')->nullable();
            $table->text('plot')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->text('awards')->nullable();
            $table->string('poster')->nullable();
            $table->string('metascore')->nullable();
            $table->string('imdb_rating')->nullable();
            $table->string('imdb_votes')->nullable();
            $table->string('imdb_id')->nullable();
            $table->string('type')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};