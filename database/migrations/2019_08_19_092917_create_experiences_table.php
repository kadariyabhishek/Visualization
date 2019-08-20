<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jobTitle');
            $table->string('companyName');
            $table->string('location');
            $table->string('startTime');
            $table->string('endTime')->nullable();
            $table->text('jobSummary');
            $table->string('current')->nullable();
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
        Schema::dropIfExists('experiences');
    }
}
