<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class DownloadNumber extends Model
{
    protected $table='download_numbers';
    protected $fillable=[
        'cv_id'
    ];  //
}
