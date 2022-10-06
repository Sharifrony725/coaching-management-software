<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_type_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'class_id', 'type_id', 'batch_id', 'roll', 'status'
    ];
}

