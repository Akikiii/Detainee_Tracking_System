<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    
    protected $table = 'user_details'; // Specify the table name

    protected $fillable = [
        'user_id',
        'education_qualifications',
        'practice_areas',
        'work_experience',
        'professional_affiliations',
        'cases_handled',
        'languages_spoken',
        'office_hours_open',
        'office_hours_close',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
