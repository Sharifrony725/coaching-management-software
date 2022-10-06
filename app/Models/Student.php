<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name', 'school_id', 'class_id', 'father_name', 'father_mobile', 'father_profession', 'mother_name', 'mother_mobile', 'mother_profession', 'email_address', 'sms_mobile',
        'date_of_admission', 'student_photo', 'address','status','user_id', 'encrypt_password', 'password'
    ];
}
