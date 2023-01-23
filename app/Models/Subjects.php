<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use DB;

class Subjects extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->belongsToMany(Subjects::class, 'teachers_subjects', 'teacher_id', 'subject_id');
    }

    public function books() {
        return $this->hasMany(Book::class,'subject_id');
    }

    protected $guarded = [];
}
