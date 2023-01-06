<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Worker extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'worker';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'state_of_origin', 'gender', 'qualification', 'year_of_birth',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
