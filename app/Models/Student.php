<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;

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
}
