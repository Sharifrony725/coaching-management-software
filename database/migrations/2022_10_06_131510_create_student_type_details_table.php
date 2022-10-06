<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTypeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_type_details', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('class_id');
            $table->integer('type_id');
            $table->integer('batch_id');
            $table->integer('roll');
            $table->enum('status',['1' , '2' ,'3']);
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
        Schema::dropIfExists('student_type_details');
    }
}
