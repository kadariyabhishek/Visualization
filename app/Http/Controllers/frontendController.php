<?php

namespace App\Http\Controllers;


use App\Experience;
use App\Model\AcademicQualification;
use App\Model\PersonalDetail;
use App\model\PersonalProfile;
use App\Model\Reference;
use App\Model\Skill;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;

class frontendController extends Controller
{
    private $attributes;

    public function dashboard()
    {
        //for gender visualization
        $all = array(DB::table('personal_details')->whereIn('gender', ['Male'])->count(), DB::table('personal_details')->whereIn('gender', ['Female'])->count());
        $month = array('Male', 'Female');



        //for age visualization
        $test['item'] = DB::table('personal_details')->pluck('dateOfBirth');
        $gg = $test['item'];
        foreach ($gg as $date) {
            $temp[] = Carbon::parse($date)->age;
        }
        $ageCount = array('18-24' => 0, '25-35' => 0, '36-45' => 0, '46+' => 0);//initializing the array of age-group
        if(!empty($temp)) {
            foreach ($temp as $val) {
                if ($val >= 18 && $val <= 24) {
                    $ageCount['18-24'] = $ageCount['18-24'] + 1;
                } elseif ($val >= 25 && $val <= 35) {
                    $ageCount['25-35'] = $ageCount['25-35'] + 1;
                } elseif ($val >= 36 && $val <= 45) {
                    $ageCount['36-45'] = $ageCount['36-45'] + 1;
                } elseif ($val >= 46) {
                    $ageCount['46+'] = $ageCount['46+'] + 1;
                }
            }
        }
        $ageCountArray=array();
        $ageCountData= array();
        foreach ($ageCount as $key => $value) {
            array_push($ageCountArray, $key);
            array_push($ageCountData, $value);
        }


//        print_r($ageCountArray);
//        print_r($ageCountData);

        //for industry visualization
        $count = DB::table('personal_profiles')
            ->select('jobCategory', DB::raw('COUNT(*) as count'))
            ->groupBy('jobCategory')
            ->orderBy('count')
            ->get();

        if (!empty($count)) {
            foreach ($count as $count_no) {

                $jobCat = $count_no->jobCategory;
                $jobCount = $count_no->count;
                $jobIndustry[$jobCat] = $jobCount;
            }
        }

        $jobCatData = array();
        $jobCatCount = array();
        foreach ($jobIndustry as $key => $value) {
            array_push($jobCatData, $key);
            array_push($jobCatCount, $value);
        }



        return view('pages.dashboard', ['Months' => $month, 'Data' => $all, 'Age' => $temp, 'IndustryCount' => $count,
            'jobCat' => $jobCatData, 'jobCatCount' => $jobCatCount,'AgeArray'=>$ageCountArray,'AgeData'=>$ageCountData]);
//        return view('pages.dashboard')->with('Months'=>$month, 'Data'=>$all);
    }

    //function to get Age according to range


    public function getAge()
    {
        //codes to getAge
        $test['item'] = DB::table('personal_details')->pluck('dateOfBirth');
        $gg = $test['item'];
        foreach ($gg as $date) {
            $temp[] = Carbon::parse($date)->age;
        }
        $ageCount = array('18-24' => 0, '25-35' => 0, '36-45' => 0, '46+' => 0);//initializing the array of age-group
        if(!empty($temp)) {
            foreach ($temp as $val) {
                if ($val >= 18 && $val <= 24) {
                    $ageCount['18-24'] = $ageCount['18-24'] + 1;
                } elseif ($val >= 25 && $val <= 35) {
                    $ageCount['25-35'] = $ageCount['25-35'] + 1;
                } elseif ($val >= 36 && $val <= 45) {
                    $ageCount['36-45'] = $ageCount['36-45'] + 1;
                } elseif ($val >= 46) {
                    $ageCount['46+'] = $ageCount['46+'] + 1;
                }
            }
        }
        $ageCountArray=array();
        $ageCountData= array();
        foreach ($ageCount as $key => $value) {
            array_push($ageCountArray, $key);
            array_push($ageCountData, $value);
        }


        print_r($ageCountArray);
        print_r($ageCountData);
//        dd($ageCount);

    }


    //for Industry Visualization {{users working }}
    public
    function getJobCategory()
    {

        $count = DB::table('personal_profiles')
            ->select('jobCategory', DB::raw('COUNT(*) as count'))
            ->groupBy('jobCategory')
            ->orderBy('count')
            ->get();

        if (!empty($count)) {
            foreach ($count as $count_no) {

                $jobCat = $count_no->jobCategory;
                $jobCount = $count_no->count;
                $jobIndustry[$jobCat] = $jobCount;
            }
        }

        $jobCatData = array();
        $jobCatCount = array();
        foreach ($jobIndustry as $key => $value) {
            array_push($jobCatData, $key);
            array_push($jobCatCount, $value);
        }
        print_r($jobCatData);
        print_r($jobCatCount);


//        $count = DB::table('personal_details')->where('gender', '=', '$genders->title')->count();
//        echo'<pre>';
//        print_r($count);
//        echo'</pre>';
//        dd($count);


    }


//    public function getGender(){
//
//        //count of male and female for
//        $male['item'] = DB::table('personal_details')->whereIn('gender', ['Male'])->count();
//        $female['item'] = DB::table('personal_details')->whereIn('gender', ['Female'])->count();
//
//        $male= json_decode($male['item']);
//        $female= json_decode($female['item']);
//        echo "<pre>";
//        print_r($male);
////        print_r($female);
//        echo "</pre>";
//
//    }
//for the gender visualization used in the index
    public
    function Chartjs()
    {

        $all = array(DB::table('personal_details')->whereIn('gender', ['Male'])->count(), DB::table('personal_details')->whereIn('gender', ['Female'])->count());
        $month = array('Male', 'Female');
        return view('pages.dashboard', ['Months' => $month, 'Data' => $all]);
    }

//for table visualization
    public
    function tables()
    {
        $datas['item'] = DB::table('personal_profiles')
            ->join('personal_details', 'personal_details.cv_id', '=', 'personal_profiles.cv_id')
            ->join('experiences', 'experiences.cv_id', '=', 'personal_details.cv_id')
            ->select('personal_details.fullName', 'personal_details.dateOfBirth', 'personal_details.email', 'personal_profiles.lookingFor', 'experiences.jobTitle',
                'experiences.current', 'personal_details.gender', 'experiences.jobTitle', 'experiences.jobSummary')
            //->where('experiences.cv_id','=','personal_profiles.cv_id')
            ->get();
        //for the age calculation
        $test['item'] = DB::table('personal_details')->pluck('dateOfBirth');
        $gg = $test['item'];
        foreach ($gg as $date) {
            $temp[] = Carbon::parse($date)->age;
//            array_push($dateOfBirthArray, $temp);
        }
        return view('pages.tables', $datas, ['Age' => $temp]);

        /** @var TYPE_NAME $dateOfBirth */


    }


}
