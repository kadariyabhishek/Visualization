<?php

namespace App\model;
use Carbon\Carbon;
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
//
    public function getAge(){
        $this->dateOfBirth->diff(Carbon::now())
            ->format('%y years, %m months and %d days');
    }


}
