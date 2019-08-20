<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lookingFor');
            $table->string('availableFor');
            $table->string('jobCategory');
            $table->string('expectedSalary');
            $table->string('careerObjective');
            $table->integer('cv_id')->unsigned()->nullable();

            $table->timestamps();
//            $table->foreign('cv_id')->references('id')->on('personal_details')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_profiles');
    }
}
