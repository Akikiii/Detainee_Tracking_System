<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $primaryKey = 'case_id';
    protected $fillable = ['case_id','case_name', 'violations', 'case_created', 'arrest_report', 'testimonies', 'status'];
    
    public function detainee() {
        return $this->belongsTo(Detainee::class, 'detainee_id');
    }

}
