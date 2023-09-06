<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $fillable = ['case_name', 'violations', 'case_created', 'arrest_report', 'testimonies', 'status'];

}
