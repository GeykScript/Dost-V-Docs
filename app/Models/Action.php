<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'action_lists';
    protected $fillable = [
        'action_name'
    ];

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('action_name', 'like', "%{$searchTerm}%");
        });
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'action_id');
    }
}
