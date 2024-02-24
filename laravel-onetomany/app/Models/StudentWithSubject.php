<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentWithSubject extends Model
{

    protected $fillable=[
        'name',
        'course',
        'code',
        'title',
        'student_id'
    ];

    use HasFactory;

    
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }
        
}
