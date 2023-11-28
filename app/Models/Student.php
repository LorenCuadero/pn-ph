<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Academic;
use App\Models\User;
use App\Models\Disciplinary;
use App\Models\Counterpart;
use App\Models\MedicalShare;
use App\Models\PersonalCashAdvance;
use App\Models\GraduationFee;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'birthdate',
        'address',
        'parent_name',
        'parent_contact',
        'payable_status',
        'account_status',
        'batch_year',
        'joined',
        'status',
    ];

    public function academics()
    {
        return $this->hasMany(Academic::class);
    }

    public function disciplinary()
    {
        return $this->hasMany(Disciplinary::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function counterpart()
    {
        return $this->hasMany(Counterpart::class);
    }

    public function medicalShare()
    {
        return $this->hasMany(MedicalShare::class);
    }

    public function personalCashAdvance()
    {
        return $this->hasMany(PersonalCashAdvance::class);
    }

    public function graduationFee()
    {
        return $this->hasMany(GraduationFee::class);
    }
}
