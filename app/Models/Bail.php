<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bail extends Model
{
    protected $fillable = ['detainee_id', 'case_id', 'bail_type', 'amount', 'paid'];

    public function detainee()
    {
        return $this->belongsTo(Detainee::class);
    }

    public function case()
    {
        return $this->belongsTo(Cases::class);
    }
}

