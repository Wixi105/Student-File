<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;
class File extends Model implements Auditable
{

    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = ['filename', 'filesize', 'filetype', 'storage_url', 'studid', 'userid', 'status'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studid');
    }

    public function fileURL()
    {
        return Storage::url($this->filename);
    }

    public function scopeFilter($query, $studid)
    {

        $query->where('status', 1);
        $query->where('studid', $studid);
        return $query;

    }

}
