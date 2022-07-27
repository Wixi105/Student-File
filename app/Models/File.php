<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['filename', 'filesize', 'filetype', 'storage_url', 'studid', 'userid', 'status'];

    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class, 'studid');
    }
}
