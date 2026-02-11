<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Classroom;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('role', '!=', 'ADMIN')->get();
        return view('pages.admin.users.index', compact('users'));
    }
    public function create()

    {
        $classrooms = Classroom::all();
        return view('pages.admin.users.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|string|min:6',
            'role'         => 'required|in:TEACHER,STUDENT',
            'classroom_id' => 'nullable|exists:classrooms,id',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully!');
    }



    public function show($id)
    {
        //
    }
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }
}
