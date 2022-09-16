<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id' , 'batch_name' , 'student_capacity' ,'status'
    ];
//     public function ClassModel(): HasMany
//     {
//         return $this->hasMany(ClassModel::class);
//     }
}

