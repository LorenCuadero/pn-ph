<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illmuniate\Support\Facades\Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'email', 'email');
    }

    public function studentName()
    {
        return $this->hasOne(Student::class, 'id');
    }

    // static function getEmailForPasswordReset($email){
    //     return self::where('email', $email)->first();
    // }

    // static function getRememberToken($remember_token){
    //     return self::where('remember_token', '=', $remember_token)->first();
    //     // dd($remember_token);
    // }

    // public function getRememberTokenName()
    // {
    //     return 'remember_token';
    // }

    // public function getEmailForPasswordReset()
    // {
    //     return 'remember_token';
    // }
}
