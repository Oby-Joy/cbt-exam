<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Name extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['attempt_counter']; 
    public $count = '';

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function getIdAttribute($value){
        $attemptCount = ExamAttempt::where(['exam_id' => $value, 'student_id' => auth()->user()->id])->count();
        $this->count = $attemptCount; 
        return $value;
    }

    public function getAttemptCounterAttribute(){
        return $this->count;
    }
}
