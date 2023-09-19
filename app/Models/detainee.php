<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'home_address',
        'contact_address',
        'email_address',
    ];

    protected $guarded = [];
    public function detaineeDetails()
    {
        return $this->hasOne(DetaineeDetails::class);
    }
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }


}
