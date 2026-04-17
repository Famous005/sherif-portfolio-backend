<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::groupedByCategory()->get()
            ->groupBy('category');

        return response()->json($skills);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'category'    => 'required|string',
            'proficiency' => 'integer|min:0|max:100',
            'icon'        => 'nullable|string',
            'sort_order'  => 'integer',
        ]);
        return response()->json(Skill::create($data), 201);
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name'        => 'sometimes|string|max:100',
            'category'    => 'sometimes|string',
            'proficiency' => 'integer|min:0|max:100',
            'icon'        => 'nullable|string',
            'sort_order'  => 'integer',
        ]);
        $skill->update($data);
        return response()->json($skill);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill deleted.']);
    }
}
