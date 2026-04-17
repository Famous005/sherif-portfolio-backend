<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /** Public: all projects (with optional category filter) */
    public function index(Request $request)
    {
        $query = Project::ordered();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        return response()->json($query->get());
    }

    /** Public: featured projects only */
    public function featured()
    {
        return response()->json(Project::featured()->ordered()->get());
    }

    /** Public: single project */
    public function show(Project $project)
    {
        return response()->json($project);
    }

    /** Admin: create */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'description'      => 'required|string',
            'long_description' => 'nullable|string',
            'tech_stack'       => 'required|array',
            'tech_stack.*'     => 'string',
            'category'         => 'required|string',
            'image_url'        => 'nullable|url',
            'github_url'       => 'nullable|url',
            'live_url'         => 'nullable|url',
            'featured'         => 'boolean',
            'sort_order'       => 'integer',
        ]);

        $project = Project::create($data);
        return response()->json($project, 201);
    }

    /** Admin: update */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title'            => 'sometimes|string|max:255',
            'description'      => 'sometimes|string',
            'long_description' => 'nullable|string',
            'tech_stack'       => 'sometimes|array',
            'tech_stack.*'     => 'string',
            'category'         => 'sometimes|string',
            'image_url'        => 'nullable|url',
            'github_url'       => 'nullable|url',
            'live_url'         => 'nullable|url',
            'featured'         => 'boolean',
            'sort_order'       => 'integer',
        ]);

        $project->update($data);
        return response()->json($project);
    }

    /** Admin: delete */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Project deleted.']);
    }
}
