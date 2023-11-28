<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduationFee extends Model
{
    use HasFactory;

    public $fillable = [
        'student_id',
        'amount_due',
        'amount_paid',
        'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
