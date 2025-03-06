<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://gist.githubusercontent.com/saniyusuf/406b843afdfb9c6a86e25753fe2761f4/raw/523c324c7fcc36efab8224f9ebb7556c09b69a14/Film.JSON';

        $response = Http::get($url);

        if ($response->successful()) {
            $movies = $response->json();

            foreach ($movies as $movie) {
                Movie::create([
                    'title' => $movie['Title'],
                    'year' => $movie['Year'],
                    'rated' => $this->sanitizeValue($movie['Rated']),
                    'released' => $this->sanitizeValue($movie['Released']),
                    'runtime' => $this->sanitizeValue($movie['Runtime']),
                    'genre' => $this->sanitizeValue($movie['Genre']),
                    'director' => $this->sanitizeValue($movie['Director']),
                    'writer' => $this->sanitizeValue($movie['Writer']),
                    'actors' => $this->sanitizeValue($movie['Actors']),
                    'plot' => $this->sanitizeValue($movie['Plot']),
                    'language' => $this->sanitizeValue($movie['Language']),
                    'country' => $this->sanitizeValue($movie['Country']),
                    'awards' => $this->sanitizeValue($movie['Awards']),
                    'poster' => $this->sanitizeValue($movie['Poster']),
                    'metascore' => $this->sanitizeValue($movie['Metascore']),
                    'imdb_rating' => $this->sanitizeValue($movie['imdbRating']),
                    'imdb_votes' => $this->sanitizeValue($movie['imdbVotes']),
                    'imdb_id' => $movie['imdbID'],
                    'type' => $movie['Type'],
                    'images' => json_encode($movie['Images']),
                ]);
            }
        } else {
            $this->command->error('Failed to fetch movie data.');
        };
    }

    private function sanitizeValue($value)
    {
        return $value === 'N/A' ? null : $value;
    }
}