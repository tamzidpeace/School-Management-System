<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class_routine_id');
            $table->integer('period_id');
            $table->integer('day_id');
            $table->string('p1_subject')->nullable();
            $table->string('p1_teacher')->nullable();
            $table->string('p2_subject')->nullable();
            $table->string('p2_teacher')->nullable();
            $table->string('p3_subject')->nullable();
            $table->string('p3_teacher')->nullable();
            $table->string('p4_subject')->nullable();
            $table->string('p4_teacher')->nullable();
            $table->string('p5_subject')->nullable();
            $table->string('p5_teacher')->nullable();
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
        Schema::dropIfExists('periods_details');
    }
}
