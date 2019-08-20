<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicQualification extends Model
{
    protected $table = 'academic_qualifications';
    protected $fillable = [
        'institute',
        'location',
        'startTime',
        'subject',
        'grade',
        'endTime',
        'attending',
        'cv_id'
    ]; //
}
