<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counsel_Case_Assignment extends Model
{
    use HasFactory;

    protected $table = 'counsel_case_assignment';

    // Define the relationship to Detainee
    public function detainee()
    {
        return $this->belongsTo(Detainee::class);
    }
}
