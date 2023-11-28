<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalShare extends Model
{
    use HasFactory;

    public $fillable = [
        'student_id',
        'medical_concern',
        'total_cost',
        'amount_paid',
        'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
