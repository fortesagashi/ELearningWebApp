<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use DB;
class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subjects() {
        return $this->belongsTo(Subjects::class,'subject_id');
    }
    public function chapters() {
        return $this->hasMany(Chapter::class,'book_id');
    }
}
