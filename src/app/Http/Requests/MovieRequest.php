<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'year' => 'required|string',
            'rated' => 'required|string',
            'released' => 'required|date',
            'runtime' => 'required|string',
            'genre' => 'required|string',
            'director' => 'required|string',
            'writer' => 'required|string',
            'actors' => 'required|string',
            'plot' => 'required|string',
            'language' => 'required|string',
            'country' => 'required|string',
            'awards' => 'nullable|string',
            'poster' => 'required|url',
            'metascore' => 'required|integer',
            'imdb_rating' => 'required|numeric',
            'imdb_votes' => 'required|string',
            'imdb_id' => 'required|string|unique:movies,imdb_id',
            'type' => 'required|string',
            'images' => 'nullable|array',
            // 'images.*' => 'url',
        ];
    }
}