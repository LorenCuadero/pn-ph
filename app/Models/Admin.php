<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'department',
        'age',
        'gender',
        'address',
        'civil_status',
        'contact_number',
        'email',
        'password'
    ];
}
