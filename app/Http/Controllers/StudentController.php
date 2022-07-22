<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('fname', 'asc')->paginate(15);
        return view('dashboard', compact('students'));
    }

}
