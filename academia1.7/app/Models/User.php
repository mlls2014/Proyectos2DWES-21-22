<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Message;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

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
    ];

    public function courses ()
    {
        return $this->hasMany(Course::class,'teacher_id');
    }

    public function role ()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function enrollments ()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }

    public function sendMessages ()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function recMessages ()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }


    public function enrollmentCourses (){
        return $this->belongsToMany(Course::class,
                    'enrollments',
                    'user_id',
                    'course_id')->withPivot('status', 'created_at');
    }

}
