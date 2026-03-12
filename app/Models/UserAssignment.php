<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAssignment extends Model
{
    protected $table = 'user_assignements';

    protected $fillable = [
        'user_id',
        'unit_id',
        'position',
        'end_date',
        'is_current',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function transactSender(){
        return $this->hasMany(Transactions::class, 'sender_id');
    }

    public function transactReceiver(){
        return $this->hasMany(Transactions::class, 'receiver_id');
    }

    public function document(){
        return $this->hasMany(Document::class, 'owner_id');
    }
}
