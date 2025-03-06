<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $params = $request->validate([
                'keyword' => 'nullable|string',
                'year' => 'nullable|integer',
                'type' => 'nullable|string',
                'country' => 'nullable|string',
                'page' => 'nullable|integer',
                'limit' => 'nullable|integer',
            ]);
            $limit = isset($params['limit']) ? $params['limit'] : 10;
            $movies = Movie::query()
                ->when(isset($params['keyword']), function ($query) use ($params) {
                    $query->where('title', 'like', '%' . $params['keyword'] . '%');
                })
                ->when(isset($params['year']), function ($query) use ($params) {
                    $query->where('year', $params['year']);
                })
                ->when(isset($params['type']), function ($query) use ($params) {
                    $query->where('type', $params['type']);
                })
                ->when(isset($params['country']), function ($query) use ($params) {
                    $query->where('country', $params['country']);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($limit);

            return view('movies.index', compact('movies'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Get data failed'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        $fields = $request->validated();
        try {
            $movie = Movie::create($fields);

            return redirect()->route('movies.show', ['id' => $movie->id]);
            // return response()->json([
            //     'data' => $movie,
            //     'message' => 'Create movie successfully'
            // ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            return view('movies.create');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function edit(Request $request)
    {
        try {
            return view('movies.edit');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $movie = Movie::findOrFail($id);
            return view('movies.show', compact('movie'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Get data failed'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, string $id)
    {
        $fields = $request->validated();
        try {
            $movie = Movie::findOrFail($id);
            $movie->update($fields);
            return response()->json([
                'data' => $movie,
                'message' => 'Update movie successfully'
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Update movie failed'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $movie = Movie::findOrFail($id);
            $movie->delete();
            return response()->json([
                'message' => 'Delete movie successfully'
            ], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Delete movie failed'], 500);
        }
    }
}