<?php

// Team.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Team.php

class Team extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(Member::class, 'team_id'); // assuming 'team_id' is the foreign key in the members table
    }
}

