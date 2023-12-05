<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $primaryKey = 'case_id';
    protected $fillable = ['detainee_id','case_id','case_name', 'violations', 'case_created', 'arrest_report', 'testimonies', 'status'];
    public function assignedTeams() {
        return $this->belongsToMany(Team::class, 'Counsel_Case_Assignment', 'case_id', 'team_id');
    }
    
    public function detainee() {
        return $this->belongsTo(Detainee::class, 'detainee_id');
    }

    public function event() {
        return $this->belongsTo(Event::class, 'id');
    }

}
