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

    public function tempUpload(Student $student, Request $request)
    {
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = now()->timestamp . '_STU_FILE_' . $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs("uploads/tmp/{$student->studid}" . $folder, $fileName);
            return $folder;
        }
        return '';
    }

    public function upload(Student $student, Request $request)
    {

        $this->validate($request, [
            'file_upload' => 'required',
            'file_upload.*' => 'mimes:doc,pdf,docx,zip,png,jpg,bmp',
        ]);

        if ($request->hasFile('file_upload')) {

            // $img->move(public_path('upload'), $fileName);
            foreach ($request->file('file_upload') as $file) {

                $fileName = now()->timestamp . '_STU_FILE_' . $file->getClientOriginalName();
                $extension = explode(".", $fileName);
                $fileSize = $file->getSize();
                $fileType = end($extension);
                $userID = Auth::id();
                $storage_url = Storage::putFileAs("uploads/{$student->studid}", $file, $fileName);
                $status = 1;
                $studid = $student->studid;

                // $arr = ['filename' => $fileName, 'filesize' => $fileSize, 'file extension' => $fileType, 'user_id' => $userID, 'path' => $storage_url, "status" => $status, "studid" => $studid];
                // dd($arr);

                $file = new File();
                $file->filename = $fileName;
                $file->filetype = $fileType;
                $file->filesize = $fileSize;
                $file->storage_url = $storage_url;
                $file->status = $status;
                $file->studid = $studid;
                $file->userid = $userID;
                $file->save();
            }

        }
        return back()->with('File Added Successfully');

    }

}
