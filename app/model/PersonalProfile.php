<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PersonalProfile extends Model
{
    protected $table = 'personal_profiles';
    protected $fillable = [
        'lookingFor',
        'availableFor',
        'jobCategory',
        'expectedSalary',
        'careerObjective',
        'cv_id'
    ]; //
}
