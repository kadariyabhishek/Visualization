<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class viewer extends Model
{
    protected $table= "viewers";
    protected $fillable=[
        'name',
        'address',
        'sex',
        'experience',


    ];

}
