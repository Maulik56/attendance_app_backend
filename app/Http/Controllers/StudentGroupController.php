<?php

namespace App\Http\Controllers;

use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = StudentGroup::all();
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'nullable|integer',
            'instructor_id' => 'nullable|integer',
            'cw_uid' => 'nullable|string',
            'group_name' => 'required|string',
            // Add other validations as needed
        ]);

        $group = StudentGroup::create($validated);
        return response()->json($group, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = StudentGroup::findOrFail($id);
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = StudentGroup::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'nullable|integer',
            'instructor_id' => 'nullable|integer',
            'cw_uid' => 'nullable|string',
            'group_name' => 'string',
            // Add other validations as needed
        ]);

        $group->update($validated);
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $group = StudentGroup::findOrFail($id);
        $group->delete();
        return response()->json(null, 204);
    }

    /**
     * Get a group with its attendances.
     */
    public function withAttendances(string $id)
    {
        $group = StudentGroup::with('attendances')->findOrFail($id);
        return response()->json($group);
    }
}
