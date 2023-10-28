<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Member.php
class Member extends Model
{
    protected $fillable = ['user_id']; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

