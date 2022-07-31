<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = ['filename', 'filesize', 'filetype', 'storage_url', 'studid', 'userid', 'status'];

    use HasFactory;
    public function student()
    {
        return $this->belongsTo(Student::class, 'studid');
    }

    public function fileURL()
    {
        return Storage::url($this->storage_url);
    }

    public function scopeFilter($query, $studid)
    {

        $query->where('status', 1);
        $query->where('studid', $studid);
        return $query;

    }

}
