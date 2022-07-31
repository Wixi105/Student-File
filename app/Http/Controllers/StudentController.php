<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Student;
use App\Models\TemporaryFile;
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
        return view("students.show", compact('student'));
    }

    public function tempUpload(Student $student, Request $request)
    {
        $this->validate($request, [
            'file_upload' => 'required',
            'file_upload.*' => 'mimes:doc,pdf,docx,zip,png,jpg,bmp',
        ]);
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = now()->timestamp . '_STU_FILE_' . $file->getClientOriginalName();
            $folder = $student->studid;
            $file->storeAs("tmp/{$student->studid}", $fileName);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $fileName,
            ]);

            return $folder;
        }
        return '';
    }

    public function upload(Request $request, Student $student)
    {

        $directory = $this->getDirectory($student);
        $files = Storage::files($directory);
        $file = $this->fetchFile($files, $student);

        $fileName = now()->timestamp . '_STU_FILE_' . $file->getFilename();
        $extension = explode(".", $fileName);
        $fileSize = $file->getSize();
        $fileType = end($extension);
        $userID = Auth::id();
        $status = 1;
        $storage_url = storage_path("app/tmp/{$student->studid}/{$file->getFilename()}");
        $studid = $student->studid;

        $genFile = new File();
        $genFile->filename = $fileName;
        $genFile->filetype = $fileType;
        $genFile->filesize = $fileSize;
        $genFile->status = $status;
        $genFile->studid = $studid;
        $genFile->userid = $userID;
        $genFile->storage_url = $storage_url;
        $genFile->save();

        Storage::move("tmp/{$student->studid}/{$file->getFilename()}", "uploads/{$student->studid}/{$file->getFilename()}");
        Storage::deleteDirectory("tmp");

        return back()->with('message', 'File Uploaded Successfully');

    }

    protected function getDirectory($student)
    {
        $directories = Storage::directories('tmp');
        foreach ($directories as $directory) {
            $dirnames = explode("/", $directory);
            $student_id = end($dirnames);
            if ($student_id == $student->studid) {
                return $directory;
            }
        }
    }

    protected function fetchFile($files, $student)
    {
        if ($files[0]) {
            $filesPath = $files[0];
            $dirnames = explode("/", $filesPath);
            $fileName = end($dirnames);
            $filePath = storage_path("app/tmp/{$student->studid}/{$fileName}");
            // $filePath = Storage::get("tmp/{$student->studid}/{$fileName}");
            $fileObj = new \Symfony\Component\HttpFoundation\File\File($filePath);
            return $fileObj;
        }
    }

}
