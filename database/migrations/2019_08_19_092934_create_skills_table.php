<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->integer('id');
            $table->string('skill');
            $table->string('skillLevel');
            $table->text('about')->nullable();
            $table->integer('cv_id')->unsigned()->nullable();
            $table->timestamps();

           // $table->foreign('cv_id')->references('id')->on('personal_details')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
