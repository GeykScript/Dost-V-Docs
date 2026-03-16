<?php

namespace App\Models;


use App\Models\User;
use App\Models\Unit;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class UserAssignment extends Model
{
    protected $table = 'user_assignments';

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
        return $this->hasMany(Transaction::class, 'sender_id');
    }

    public function transactReceiver(){
        return $this->hasMany(Transaction::class, 'receiver_id');
    }

    public function document(){
        return $this->hasMany(Document::class, 'owner_id');
    }
}
