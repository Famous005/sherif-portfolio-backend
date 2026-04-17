<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return response()->json(Experience::ordered()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'company'          => 'required|string|max:255',
            'location'         => 'nullable|string',
            'start_date'       => 'required|string',
            'end_date'         => 'nullable|string',
            'is_current'       => 'boolean',
            'responsibilities' => 'required|array',
            'responsibilities.*' => 'string',
            'sort_order'       => 'integer',
        ]);
        return response()->json(Experience::create($data), 201);
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'title'            => 'sometimes|string|max:255',
            'company'          => 'sometimes|string|max:255',
            'location'         => 'nullable|string',
            'start_date'       => 'sometimes|string',
            'end_date'         => 'nullable|string',
            'is_current'       => 'boolean',
            'responsibilities' => 'sometimes|array',
            'responsibilities.*' => 'string',
            'sort_order'       => 'integer',
        ]);
        $experience->update($data);
        return response()->json($experience);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json(['message' => 'Experience deleted.']);
    }
}
