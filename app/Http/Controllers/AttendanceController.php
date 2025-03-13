<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        return response()->json($attendances);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'group_id' => 'required|integer',
            'student_id' => 'required|integer',
            'lesson_id' => 'required|integer',
            'date' => 'required',
            'day' => 'required',
            'status' => 'required',
        ]);

        $attendance = Attendance::create($validated);
        return response()->json($attendance, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        return response()->json($attendance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendance = Attendance::findOrFail($id);

        $validated = $request->validate([
            'group_id' => 'integer',
            'student_id' => 'integer',
            'lesson_id' => 'integer',
            'date' => 'string',
            'day' => 'string',
            'status' => 'string',
        ]);

        $attendance->update($validated);
        return response()->json($attendance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return response()->json(null, 204);
    }

    /**
     * Get attendances by student ID.
     */
    public function getByStudent(string $studentId)
    {
        $attendances = Attendance::where('student_id', $studentId)->get();
        return response()->json($attendances);
    }

    /**
     * Get attendances by group ID.
     */
    public function getByGroup(string $groupId)
    {
        $attendances = Attendance::where('group_id', $groupId)->get();
        return response()->json($attendances);
    }

    /**
     * Get attendance statistics.
     */
    public function statistics()
    {
        $stats = [
            'present' => Attendance::where('status', 'Present')->count(),
            'absent' => Attendance::where('status', 'Absent')->count(),
            'total' => Attendance::count()
        ];

        return response()->json($stats);
    }
}
