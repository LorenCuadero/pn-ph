<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Disciplinary extends Model {
    use HasFactory;

    protected $fillable = [
        'verbal_warning_description',
        'verbal_warning_date',
        'written_warning_description',
        'written_warning_date',
        'provisionary_description',
        'provisionary_date',
        'student_id',
    ];

    public function student() {
        return $this->belongsTo( Student::class );
    }
}
