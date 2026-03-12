<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'document_id',
        'sender_id',
        'receiver_id',
        'action_id',
        'status_id',
        'parent_id',
        'remarks',
        'file_directory',
        'file_link',
        'received_at',
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class, 'parent_id');
    }

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function document(){
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function sender(){
        return $this->belongsTo(UserAssignment::class);
    }

    public function receiver(){
        return $this->belongsTo(UserAssignment::class);
    }

    public function action(){
        return $this->belongsTo(Action::class, 'action_id');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
