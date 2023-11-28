<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Academic extends Model {
    use HasFactory;

    protected $fillable = [
        'course_code',
        'first_sem_1st_year',
        'second_sem_1st_year',
        'first_sem_2nd_year',
        'second_sem_2nd_year',
        'gpa',
        'student_id',
    ];

    public function student() {
        return $this->belongsTo( Student::class );
    }
}
