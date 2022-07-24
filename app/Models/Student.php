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
        }
        return $query;
    }
}
