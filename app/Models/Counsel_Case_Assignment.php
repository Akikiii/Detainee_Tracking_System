<?php

// Counsel_Case_Assignment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counsel_Case_Assignment extends Model
{
    protected $table = 'counsel_case_assignment';

    protected $fillable = [
        'team_id',
        'detainee_id',
        'assigned_group',
        'date_assigned',
    ];

    // Relationships
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function detainee()
    {
        return $this->belongsTo(Detainee::class, 'detainee_id');
    }
}

