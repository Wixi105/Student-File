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
        $files = File::filter($student->studid)->get();
        return view("students.show", compact(['student', 'files']));
    }

    public function tempUpload(Student $student, Request $request)
    {
        $this->validate($request, [
            'file_upload' => 'required',
            'file_upload.*' => 'mimes:doc,pdf,docx,zip,png,jpg,bmp',
        ]);

        if ($request->hasFile('file_upload')) {

            $file = $request->file('file_upload');
            $fileName = now()->timestamp . '_STUFILE_' . $file->getClientOriginalName();
            $folder = $student->studid;

            $file->storePubliclyAs("/tmp/{$student->studid}", $fileName);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $fileName,
            ]);

            return $folder;
        }
        return '';
    }

    public function upload(Student $student)
    {

        $directory = $this->getDirectory($student);
        $files = Storage::files($directory);
        $file = $this->fetchFile($files, $student);

        $fileName = $file->getFilename();
        $extension = explode(".", $fileName);
        $fileSize = $file->getSize();
        $fileType = end($extension);
        $userID = Auth::id();
        $status = 1;
        $storage_url = Storage::url("/public/uploads/{$student->studid}/{$file->getFilename()}");
        $studid = $student->studid;

        $fileNameParts = explode("_", $fileName, 3);
        $fileNameActual = end($fileNameParts);

        $genFile = new File();
        $genFile->filename = $fileName;
        $genFile->filetype = $fileType;
        $genFile->filesize = $fileSize;
        $genFile->status = $status;
        $genFile->studid = $studid;
        $genFile->userid = $userID;
        $genFile->filename_actual = $fileNameActual;
        $genFile->storage_url = $storage_url;
        $genFile->save();

        // Storage::move("public/tmp/{$student->studid}/{$fileName}", "/uploads/{$student->studid}/{$fileName}");
        $file->move(public_path("storage/uploads/{$student->studid}"),$fileName);

        Storage::deleteDirectory("tmp");

        return back()->with('message', 'File Upload Successful');

    }

    // CREATED FUNCTIONS.
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
        if (count($files) > 0) {
            $lastFile = end($files);
            $filesPath = $lastFile;
            $dirnames = explode("/", $filesPath);
            $fileName = end($dirnames);
            // dd($dirnames);
            $filePath = storage_path("app/public/tmp/{$student->studid}/{$fileName}");
            // $filePath = Storage::get("tmp/{$student->studid}/{$fileName}");
            $fileObj = new \Symfony\Component\HttpFoundation\File\File($filePath);
            return $fileObj;
        }
    }

}
