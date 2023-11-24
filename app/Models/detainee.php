<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detainee extends Model
{
    use HasFactory;
    protected $primaryKey = 'detainee_id';

    protected $fillable = [
        'detainee_id',
        'first_name',
        'last_name',
        'middle_name',
        'email_address',
        'home_address',
        'contact_number',
        // ... other fields ...
    ];


    public function detaineeDetails()
    {
        return $this->hasOne(DetaineeDetails::class, 'detainee_id', 'detainee_id');
    }
    
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
    public function counselCaseAssignment()
    {
        return $this->hasOne(Counsel_Case_Assignment::class, 'detainee_id', 'detainee_id');
    }

}
