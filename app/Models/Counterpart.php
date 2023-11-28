<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counterpart extends Model
{
    use HasFactory;

    public $fillable = [
        'student_id',
        'month',
        'year',
        'amount_due',
        'amount_paid',
        'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
