<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriorityLevel extends Model
{
    protected $table = 'priority_levels';

    protected $fillable = [
        'priority_name',
        'description'
    ];

    public function documents(){
        return $this->hasMany(Document::class, 'priority_lvl_id');
    }
}
