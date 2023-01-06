<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'fname', 'lname', 'email', 'sog', 'command', 'apf', 'gender', 'date_of_enlistment', 'qual', 'year', 'cn', 'password',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
