<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $table = 'personal_details';
    protected $fillable = [
        'fullName',
        'email',
        'mobileNo',
        'website',
        'image',
        'address',
        'dateOfBirth',
        'gender'
    ]; //
}
