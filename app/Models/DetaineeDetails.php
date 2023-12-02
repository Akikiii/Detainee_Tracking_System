<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetaineeDetails extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'detainee_id';

    protected $fillable = [
        'gender',
        'mother_name',
        'father_name',
        'spouse_name',
        'related_photos',
        'crime_history',
        'max_detention_period',
        'detention_begin',
        'birthday',
        'emergency_contact_number',
        'emergency_contact_name',
    ];

    public function detainee()
    {
        return $this->belongsTo(Detainee::class, 'detainee_id');
    }
}
