<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'documents';
    protected $fillable = [
        'reference_number',
        'owner_id',
        'document_name',
        'category',
        'is_confidential',
        'description',
        'source_type',
        'deadline'
    ];

    protected $casts = [
    'deadline' => 'datetime',
];


    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function ($query) use ($searchTerm) {
            $query->where('reference_number', 'like', "%{$searchTerm}%")
                ->orWhere('document_name', 'like', "%{$searchTerm}%");
        });
    }


    public function user(){
        return $this->belongsTo(UserAssignment::class, 'owner_id');
    }

    public function priorityLevel(){
        return $this->belongsTo(PriorityLevel::class, 'priority_lvl_id');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'document_id');
    }
}
