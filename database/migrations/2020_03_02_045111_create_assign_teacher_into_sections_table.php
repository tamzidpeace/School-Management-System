<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignTeacherIntoSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_teacher_into_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('school_class_id');
            $table->integer('section_id');
            $table->integer('teacher_id');
            //$table->unique(['school_class_id', 'section_id', 'teacher_id']);
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
        Schema::dropIfExists('assign_teacher_into_sections');
    }
}
