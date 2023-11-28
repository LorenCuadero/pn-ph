<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalCashAdvance extends Model
{
    use HasFactory;

    public $fillable = [
        'student_id',
        'amount_due',
        'amount_paid',
        'purpose',
        'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
