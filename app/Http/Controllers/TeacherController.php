<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Policies\TeacherPolicy;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teachers = Teacher::where('organization_id', $user->organization_id)->get();
        return response()->json($teachers);
    }
    public function store(StoreTeacherRequest $request)
    {
        $this->authorize('create', Teacher::class);

        $user = Auth::user();
        $data = $request->validated();
        $data['organization_id'] = $user->organization_id;
        $teacher = Teacher::create($data);
        return response()->json($teacher, 201); // 201 Created
    }

    public function show(Teacher $teacher)
    {

        $this->authorize('view', $teacher);
        return response()->json($teacher);
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $this->authorize('update', $teacher);
        $data = $request->validated();
        $teacher->update($data);
        return response()->json($teacher);
    }

    public function destroy(Teacher $teacher)
    {
        $this->authorize('delete', Teacher::class);
        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted'], 204); // 204 No Content
    }
}
