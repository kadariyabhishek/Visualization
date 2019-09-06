<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $fillable = [
        'jobTitle',
        'companyName',
        'location',
        'startTime',
        'endTime',
        'jobSummary',
        'current',
        'cv_id'
    ]; //
}
