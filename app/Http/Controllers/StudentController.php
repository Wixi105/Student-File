<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('regno', 'asc')->filter()->paginate(15);
        return view('students.dashboard', compact('students'));
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function upload(Student $student, Request $request)
    {

        if ($request->hasFile('file_upload')) {

            $img = $request->file_upload;
            $fileName = time() . 'student_file' . $img->getClientOriginalName();
            $extension = explode(".", $fileName);
            $fileSize = $img->getSize();
            $fileExtension = end($extension);
            $userID = Auth::id();
            $storage_url = Storage::putFileAs('uploads', $img, $fileName);

            $arr = ['filename' => $fileName, 'filesize' => $fileSize, 'file extension' => $fileExtension, 'user_id' => $userID, 'path' => $storage_url];
            dd($arr);
            $img->move(public_path('upload'), $fileName);
            $storagePath = Storage::url($fileName);
        }

        // dd($request->file('file_upload'));

    }

}
