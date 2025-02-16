<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'course'
    ];

    use HasFactory;

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
