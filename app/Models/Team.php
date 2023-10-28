<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Team.php
class Team extends Model
{
    public function members()
    {
        return $this->belongsToMany(User::class, 'team_user', 'team_id', 'user_id');
    }
}
