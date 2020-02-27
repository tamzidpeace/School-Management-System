<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_class_id');
            $table->integer('section_id');
            $table->integer('day_id');
            $table->integer('p1_subject_id');
            $table->integer('p1_teacher_id');
            $table->integer('p2_subject_id');
            $table->integer('p2_teacher_id');
            $table->integer('p3_subject_id');
            $table->integer('p3_teacher_id');
            $table->integer('p4_subject_id');
            $table->integer('p4_teacher_id');
            $table->integer('p5_subject_id');
            $table->integer('p5_teacher_id');
            $table->integer('p6_subject_id');
            $table->integer('p6_teacher_id');
            $table->integer('p7_subject_id');
            $table->integer('p7_teacher_id');
            $table->integer('p8_subject_id');
            $table->integer('p8_teacher_id');
            $table->integer('p9_subject_id');
            $table->integer('p9_teacher_id');
            $table->integer('p10_subject_id');
            $table->integer('p10_teacher_id');
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
        Schema::dropIfExists('class_routines');
    }
}
