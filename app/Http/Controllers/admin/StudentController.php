<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $studentsCount = Student::all();
        $student = Student::find(1);

        return view('admin-panel.student.index', compact('studentsCount', 'student'));
    }

    // to create students count
    public function store(Request $request) {
        $request->validate([
            'count' => 'required',
        ]);

        Student::create([
            'count' => $request->count,
        ]);

        return back()->with('successMsg', 'You have successfully created!');
    }

    // to update students count
    public function update(Request $request, $id) {
        $request->validate([
            'count' => 'required',
        ]);

       $student = Student::find($id);

       $student->update([
        'count' => $student->count + $request->count,
       ]);

       return back();
    }
}
