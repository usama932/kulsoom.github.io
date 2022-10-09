<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'class_id', 'section_id', 'date', 'attendance'];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class, 'class_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}  