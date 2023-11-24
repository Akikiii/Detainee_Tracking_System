<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// CaseEvent.php

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{protected $table = 'case_events';
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

    protected $dates = ['event_date', 'created_at', 'updated_at'];


    // Define the relationship with the 'cases' table
    public function case()
    {
        return $this->belongsTo(Cases::class, 'case_id', 'case_id');
    }
}

