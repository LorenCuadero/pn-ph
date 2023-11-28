<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosingOfAccount extends Model
{
    use HasFactory;

    protected $fillable = [
      'student_id',
      'status',
    ];
}
