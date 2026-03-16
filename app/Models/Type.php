<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use SoftDeletes;
    protected $table = 'document_types';
    protected $fillable = [
        'type_name',
    ];

     public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('type_name', 'like', "%{$searchTerm}%");
        });
    }   
}
