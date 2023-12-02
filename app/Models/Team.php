<?php

// Team.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team_name', 'case_id', 'creation_date', 'description', 'status'];


    public function members()
    {
        return $this->hasMany(Member::class, 'team_id');
    }

    public function counselCaseAssignment()
    {
        return $this->hasOne(Counsel_Case_Assignment::class, 'team_id');
    }
}


