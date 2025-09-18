<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progress';     // اسم الجدول
    protected $primaryKey = 'id';      // المفتاح الأساسي
    public $timestamps = false;        // لو الجدول مافيهوش created_at / updated_at

    protected $fillable = [
        'course_id', 
        'instructor_id', 
        'student_id', 
        'progress', 
        'notes'
    ];
    
}