<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->belongsToMany(Subjects::class, 'teachers_subjects', 'teacher_id', 'subject_id');
    }

    protected $guarded = [];
}
