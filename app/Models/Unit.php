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

    public function positions(){
        return $this->hasMany(Position::class, 'unit_id');
    }
}
