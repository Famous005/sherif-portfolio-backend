<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return response()->json(Education::ordered()->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'degree'      => 'required|string|max:255',
            'field'       => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'grade'       => 'nullable|string',
            'start_year'  => 'required|string',
            'end_year'    => 'nullable|string',
            'is_current'  => 'boolean',
            'description' => 'nullable|string',
            'sort_order'  => 'integer',
        ]);
        return response()->json(Education::create($data), 201);
    }

    public function update(Request $request, Education $education)
    {
        $data = $request->validate([
            'degree'      => 'sometimes|string|max:255',
            'field'       => 'sometimes|string|max:255',
            'institution' => 'sometimes|string|max:255',
            'grade'       => 'nullable|string',
            'start_year'  => 'sometimes|string',
            'end_year'    => 'nullable|string',
            'is_current'  => 'boolean',
            'description' => 'nullable|string',
            'sort_order'  => 'integer',
        ]);
        $education->update($data);
        return response()->json($education);
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return response()->json(['message' => 'Education deleted.']);
    }
}
