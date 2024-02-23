<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    protected $fillable = [
        "title", 
        "student_id"
    ];
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class, "student_id");
    }
}
