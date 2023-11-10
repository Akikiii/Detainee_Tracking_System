<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Member.php
class Member extends Model
{

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

