<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'unit_name',
        'description',
        'abbreviation',
    ];


    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('unit_name', 'like', "%{$searchTerm}%")
                ->orWhere('description', 'like', "%{$searchTerm}%")
                ->orWhere('abbreviation', 'like', "%{$searchTerm}%");
        });
    }


    public function positions(){
        return $this->hasMany(Position::class, 'unit_id');
    }
}
