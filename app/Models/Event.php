<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'case_events';
    protected $fillable = [
        'case_id', 
        'event_type',
        'event_date',
        'description',
        'related_entity',
        'event_location',
        'event_outcome',
        'event_notes',
    ];
    use HasFactory;

    // Define the relationship with the Case model
    public function case()
    {
        return $this->belongsTo(Cases::class);
    }
}
