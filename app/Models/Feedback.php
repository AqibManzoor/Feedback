<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table='feedbacks';

    public function created_by(){
  
        return $this->hasOne(\App\Models\User::class,'id','user_id');
  
    }  
    public function comments(){
  
        return $this->hasMany(\App\Models\Comment::class,'feedback_id','id');
  
    }  
    public function votes()
    {
        return $this->hasMany(\App\Models\Vote::class,'feedback_id','id');
    }
}

