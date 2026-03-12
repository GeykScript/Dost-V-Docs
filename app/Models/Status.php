<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
        'status_name',
        'status_description'
    ];


    public function documents(){
        return $this->hasMany(Document::class, 'status_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'status_id');
    }
}
