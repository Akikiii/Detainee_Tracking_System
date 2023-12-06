<?php
namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = [
        'case_id',
        'event_id',
        'user_id',
        'commentText',
    ];

    public function case()
    {
        return $this->belongsTo(Cases::class, 'case_id');
    }

    public function caseEvent()
    {
        return $this->belongsTo(Event::class, 'event_type');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
