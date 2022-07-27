<?php

namespace App\Http\Controllers;

use App\Models\File;
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

            // $img->move(public_path('upload'), $fileName);

            $img = $request->file_upload;
            $fileName = time() . 'STU_FILE' . $img->getClientOriginalName();
            $extension = explode(".", $fileName);
            $fileSize = $img->getSize();
            $fileType = end($extension);
            $userID = Auth::id();
            $storage_url = Storage::putFileAs("uploads/{$student->studid}/", $img, $fileName);
            $status = 1;
            $studid = $student->studid;

            $file = new File();
            $file->filename = $fileName;
            $file->filetype = $fileType;
            $file->filesize = $fileSize;
            $file->storage_url = $storage_url;
            $file->status = $status;
            $file->studid = $studid;
            $file->userid = $userID;
            $file->save();

            // $arr = ['filename' => $fileName, 'filesize' => $fileSize, 'file extension' => $fileType, 'user_id' => $userID, 'path' => $storage_url, "status" => $status, "studid" => $studid];
            // dd($arr);
        }


    }

}
