<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use DB;
class Chapter extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function books() {
        return $this->belongsTo(Book::class,'book_id');
    }
}
