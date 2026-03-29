<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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



    // When creating, updating, or deleting a unit, Unit Cache Cleared
    protected static function booted()
    {
        static::created(fn()  => Cache::forget('units'));
        static::updated(fn()  => Cache::forget('units'));
        static::deleted(fn()  => Cache::forget('units'));
    }


    // Cache method to retrieve all units with caching
    public static function allCached()
    {
        return Cache::remember('units', now()->addWeek(), function () {
            Log::info('Cache Failed — querying DB. Should only appear once per week.');
            return static::all();
        });
    }

}
