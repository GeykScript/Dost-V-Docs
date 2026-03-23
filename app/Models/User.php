<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'suffix',
        'email',
        'password',
        'profile_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function getFullNameAttribute()
    {
        return $this->first_name
            . ($this->middle_initial ? ' ' . $this->middle_initial : '')
            . ' ' . $this->last_name
            . ($this->suffix ? ' ' . $this->suffix : '');
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('first_name', 'like', "%{$searchTerm}%")
                ->orWhere('last_name', 'like', "%{$searchTerm}%")
                ->orWhere('username', 'like', "%{$searchTerm}%");
        });
    }

    public function userAssignments(){
        return $this->hasMany(UserAssignment::class, 'user_id');
    }


public function currentAssignment()
{
    return $this->hasOne(UserAssignment::class)
        ->where('is_current', true)
        ->where('unit_id', 2)
        ->with('unit');
}

}
