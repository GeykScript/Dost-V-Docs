<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'position_name'
    ];

    public function assignedPositions(){
        return $this->hasMany(AssignedPosition::class, 'position_id');
    } 

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
