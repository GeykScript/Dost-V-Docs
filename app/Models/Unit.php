<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use SoftDeletes;
    protected $table = 'units';
    
    protected $fillable = [
        'unit_name',
        'description',
        'abbreviation',
        'deleted_at',
    ];


    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('unit_name', 'like', "%{$searchTerm}%")
                ->orWhere('description', 'like', "%{$searchTerm}%")
                ->orWhere('abbreviation', 'like', "%{$searchTerm}%");
        });
    }


    public function userAssignments(){
        return $this->hasMany(UserAssignment::class, 'unit_id');
    }

    public function activeUserAssignments()
    {
        return $this->hasMany(UserAssignment::class, 'unit_id')
                    ->whereNull('end_date');
    }
}
