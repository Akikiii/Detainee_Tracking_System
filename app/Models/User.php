<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'office_address',
        'contact_number',
        'gender',
        'education_qualifications',
        'practice_areas',
        'work_experience',
        'professional_affiliations',
        'cases_handled',
        'language_spoken',
        'office_hours_open',
        'office_hours_close',
        'role',

        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function assignedCases()
    {
        return $this->belongsToMany(Cases::class, 'Counsel_Case_Assignment', 'assigned_lawyer', 'case_id');
    }
    public function isAdmin()
    {
        return $this->role === 1;
    }
    
}
