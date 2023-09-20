<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detainee extends Model
{
    use HasFactory;

    public function detaineeDetails()
    {
        return $this->hasOne(DetaineeDetails::class);
    }
    public function cases()
    {
        return $this->hasMany(Cases::class);
    }
}
