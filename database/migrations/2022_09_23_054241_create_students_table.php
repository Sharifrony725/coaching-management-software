<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->integer('school_id');
            $table->integer('class_id');
            $table->string('father_name');
            $table->string('father_mobile')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('email_address')->nullable();
            $table->string('sms_mobile');
            $table->date('date_of_admission');
            $table->string('student_photo')->nullable();
            $table->text('address')->nullable();
            $table->enum('status',['1','2','3']);
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
