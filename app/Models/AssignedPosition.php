<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedPosition extends Model
{
    protected $fillable = [
        'position_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

}
