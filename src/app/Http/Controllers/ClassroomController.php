<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
class ClassroomController extends Controller
{
 
    public function index()
    {
        $classrooms = Classroom::all();
        return view('pages.admin.classrooms.index',compact('classrooms'));
        
    }
    public function create()
    {
        return view('pages.admin.classrooms.create');
    }

    public function store(Request $request , Classroom $classroom)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'promotion_year' => 'nullable|string|max:255',
        ]);

        $classroom->create($data);
        return redirect()
            ->route('admin.classrooms.index')
            ->with('success', 'Classroom created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function destroy(Request $request, Classroom $classroom)
    {
        $classroom->delete();
        return redirect()
            ->route('admin.classrooms.index')
            ->with('success', 'Classroom deleted successfully!');
    }

    public function asignTeacher(Classroom $classroom)
    {
        $teachers = User::where('role', 'TEACHER')->get();
        return view('pages.admin.classrooms.assignTeacher', compact('classroom', 'teachers'));
    }
    
    public function asignTeacherStore(Request $request, Classroom $classroom)
    {
        $data = $request->validate([
            'teacher_id' => 'required|exists:users,id',
        ]);

        $teacher = User::find($data['teacher_id']);
        $classroom->teachers()->attach($teacher);
        $classroom->save();

        return redirect()
            ->route('admin.classrooms.index')
            ->with('success', 'Teacher assigned to classroom successfully!');
    }
}
