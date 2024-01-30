<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetaineeDetails extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'detainee_id';

    protected $guarded = [
       
    ];

    public function detainee()
    {
        return $this->belongsTo(Detainee::class, 'detainee_id');
    }
}
