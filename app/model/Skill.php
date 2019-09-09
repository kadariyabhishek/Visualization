<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'skill',
        'skillLevel',
        'about',
        'cv_id'
    ]; //
}
