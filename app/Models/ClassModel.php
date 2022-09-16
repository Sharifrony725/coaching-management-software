<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name' , 'status'
    ];
    // public function batches(): HasMany
    // {
    //     return $this->hasMany(Batch::class);
    // }
}
