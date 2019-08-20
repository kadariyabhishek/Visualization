<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institute')->nullable();
            $table->string('subject')->nullable();
            $table->string('grade')->nullable();
            $table->string('location')->nullable();
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();
            $table->string('attending')->nullable();
            $table->integer('cv_id')->unsigned()->nullable();
            $table->timestamps();

          //  $table->foreign('cv_id')->references('id')->on('personal_details')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_qualifications');
    }
}
