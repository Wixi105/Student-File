<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students_db';

    public function file()
    {
        return $this->hasMany(File::class, 'studid');
    }

    protected function getFnameAttribute($value)
    {
        return $value ?? "NONE";
    }

    public function scopeFilter($query)
    {
        if ($search = request('search')) {
            $query->where('fname', 'LIKE', "%{$search}%");
            $query->orWhere('lname', 'LIKE', "%{$search}%");
            $query->orWhere('regno', 'LIKE', "%{$search}%");
            $query->orWhere('dob', 'LIKE', "%{$search}%");
            $query->orWhereRaw("concat(fname, ' ', trim(lname)) like '%{$search}%' ");
            $query->orWhereRaw("concat(fname, ' ', mname, ' ', lname) like '%{$search}%' ");

        }
        return $query;
    }

    // public function getRouteKeyName()
    // {
    //     return 'regno';
    // }
}
