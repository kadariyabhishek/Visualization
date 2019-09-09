<?php

namespace App\Http\Controllers;




use App\DownloadNumber;
use App\model\AcademicQualification;
use App\model\Experience;
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
        $genderCount = array(DB::table('personal_details')->whereIn('gender', ['Male'])->count(), DB::table('personal_details')->whereIn('gender', ['Female'])->count());
        $gender = array('Male', 'Female');



        //for age visualization
        $test['item'] = DB::table('personal_details')->pluck('dateOfBirth');
        $gg = $test['item'];
        foreach ($gg as $date) {
            $temp[] = Carbon::parse($date)->age;
        }

        $ageCount = array('18-22' => 0, '23-27' => 0, '28-31' => 0,'32-36'=>0,'37-41'=>0,'42-46'=>0, '47+' => 0);//initializing the array of age-group

            foreach ($temp as $val) {

                    if ($val >= 18 && $val <= 22) {
                        $ageCount['18-22'] = $ageCount['18-22'] + 1;
                    } elseif ($val >= 23 && $val <= 27) {
                        $ageCount['23-27'] = $ageCount['23-27'] + 1;
                    } elseif ($val >= 28 && $val <= 31) {
                        $ageCount['28-31'] = $ageCount['28-31'] + 1;
                    } elseif ($val >= 32 && $val <= 36) {
                        $ageCount['32-36'] = $ageCount['32-36'] + 1;
                    } elseif ($val >= 37 && $val <= 41) {
                        $ageCount['37-41'] = $ageCount['37-41'] + 1;
                    } elseif ($val >= 42 && $val <= 46) {
                        $ageCount['42-46'] = $ageCount['42-46'] + 1;
                    } elseif ($val >= 47) {
                        $ageCount['47+'] = $ageCount['47+'] + 1;
                    }

            }

        $ageCountArray=array();
        $ageCountData= array();
        foreach ($ageCount as $key => $value) {
            if (!empty($value)) {
                array_push($ageCountArray, $key);
                array_push($ageCountData, $value);
            }
        }
        //max no for the x-axis in visualization
        $maxNo= max($ageCountData);


        //for industry data visualization

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
        //for calculating percentage to display in the label
        $total= array_sum($jobCatCount);
        $percentageArray= array();
        foreach ($jobCatCount as $key => $value) {
            $percentage= $value/$total*100;
            array_push($percentageArray,$percentage);
        }

        //to visualize the candidates who are looking for job

        $interestedCandidateCount = array(DB::table('looking_fors')->whereIn('choice', ['Interested'])->count(), DB::table('looking_fors')->whereIn('choice', ['Not Interested'])->count());
        $LookingFor= array('Interested', 'Not Interested');


        //to visualize level of JOB looking for

        $jobLevelCount= array(DB::table('personal_profiles')->whereIn('LookingFor',['Senior Level'])->count(),DB::table('personal_profiles')->whereIn('LookingFor',['Mid Level'])->count(),
            DB::table('personal_profiles')->whereIn('lookingFor',['Entry Level'])->count());
        $jobLevel=array('Senior Level','Mid Level','Entry level');


        //to count the downloads no

//        $downloads=DownloadNumber::where('cv_id')->count();
        $downloads=DB::table('download_numbers')->count();

        //to count the interested people for job

        $jobSearchCount= DB::table('personal_profiles')->whereIn('interestedInJob',['Yes'])->count();



        return view('pages.dashboard', ['Gender' => $gender, 'GenderCount' => $genderCount  , 'Age' => $temp, 'IndustryCount' => $count,
            'jobCat' => $jobCatData, 'jobCatCount' => $jobCatCount,'percentage'=>$percentageArray,'AgeArray'=>$ageCountArray,'AgeData'=>$ageCountData,'MaxCount'=>$maxNo,
            'InterestedCandidateCount'=>$interestedCandidateCount,'LookingFor'=>$LookingFor,'JobLevelCount'=>$jobLevelCount,'JobLevel'=>$jobLevel,'Downloads'=>$downloads,'JobSearchCount'=>$jobSearchCount]);
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
        $ageCount = array('18-22' => 0, '23-27' => 0, '28-31' => 0,'32-36'=>0,'37-41'=>0,'42-46'=>0, '47+' => 0);//initializing the array of age-group

            foreach ($temp as $val) {
                if ($val >= 18 && $val <= 22) {
                    $ageCount['18-22'] = $ageCount['18-22'] + 1;
                } elseif ($val >= 23 && $val <= 27) {
                    $ageCount['23-27'] = $ageCount['23-27'] + 1;
                } elseif ($val >= 28 && $val <= 31) {
                    $ageCount['28-31'] = $ageCount['28-31'] + 1;
                } elseif ($val >= 32 && $val <= 36) {
                    $ageCount['32-36'] = $ageCount['32-36'] + 1;
                } elseif ($val >= 37 && $val <= 41) {
                    $ageCount['37-41'] = $ageCount['37-41'] + 1;
                } elseif ($val >= 42 && $val <= 46) {
                    $ageCount['42-46'] = $ageCount['42-46'] + 1;
                } elseif ($val >= 47) {
                    $ageCount['47+'] = $ageCount['47+'] + 1;
                }
            }

        $ageCountArray=array();
        $ageCountData= array();

            foreach ($ageCount as $key => $value) {
                if(!empty($value)) {
                array_push($ageCountArray, $key);
                array_push($ageCountData, $value);
            }
        }
            $maxNo= max($ageCountData);
            print_r($maxNo);

        print_r($ageCountArray);
        print_r($ageCountData);
//        dd($ageCount);

    }


    //for Industry Visualization {{users working }}
    public function getJobCategory()
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
        //to put the values of JobCategory and JobCategoryCount in Array
        foreach ($jobIndustry as $key => $value) {
            array_push($jobCatData, $key);
            array_push($jobCatCount, $value);
        }
        print_r($jobCatCount);
        //for calculating percentage to display in the label
        $total= array_sum($jobCatCount);
        $percentageArray=array();
        foreach ($jobCatCount as $key => $value) {
           $percentage= $value/$total*100;
           array_push($percentageArray,$percentage);

        }

//        $number= count();

        echo $total;

 }




//    }


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
    public function Chartjs()
    {

        $all = array(DB::table('personal_details')->whereIn('gender', ['Male'])->count(), DB::table('personal_details')->whereIn('gender', ['Female'])->count());
        $month = array('Male', 'Female');
        return view('pages.dashboard', ['Months' => $month, 'Data' => $all]);
    }

//for table visualization
    public
    function tables()
    {
        $datas['item'] = DB::table('personal_details')
            ->join('personal_profiles', 'personal_profiles.cv_id', '=', 'personal_details.id')
            ->select('personal_details.fullName', 'personal_details.dateOfBirth', 'personal_details.email','personal_details.mobileNo', 'personal_profiles.lookingFor',
                'personal_profiles.expectedSalary', 'personal_details.gender','personal_profiles.cv_id','personal_profiles.preferredLocation')
            ->get();







//        $tile1= Experience::all();


//        $questions=DB::table('experiences')
//             ->join('experiences', 'experiences.id', '=', 'personal_profiles.cv_id')
//            ->select(DB::raw('experiences.cv_id'),'experiences.jobTitle')
//            ->groupBy('experiences.cv_id')
//            ->get();
//
//        dd($questions);



//        $datas['item'] = DB::table('personal_profiles')
//            ->join('personal_details', 'personal_details.id', '=', 'personal_profiles.cv_id')
//            ->join('experiences', 'experiences.cv_id', '=', 'personal_details.id')
//            ->select('personal_details.fullName', 'personal_details.dateOfBirth', 'personal_details.email', 'personal_profiles.lookingFor',
//                'personal_profiles.expectedSalary','experiences.jobTitle',
//                'experiences.current', 'personal_details.gender', 'experiences.jobTitle', 'experiences.jobSummary')
//            //->where('experiences.cv_id','=','personal_profiles.cv_id')
//
//            ->get();




       // for the age calculation
        $test['item'] = DB::table('personal_details')->pluck('dateOfBirth');
        $gg = $test['item'];
        foreach ($gg as $date) {
            $temp[] = Carbon::parse($date)->age;
        }

        return view('pages.tables', $datas, ['Age' => $temp]);

    }

//    public function getExperience($cv_id){
//        $dt = Carbon::now();
////        $end = array(DB::table('experiences')->pluck('endTime')->whereIn('endTime','!=','Current'));
//        $start=Experience::all();
//        $end = DB::table('experiences')->whereNotIn('endTime',['Current'])->get();
//        foreach ($end as $value){
//            $endTime[]=$value->endTime;
//        }
//        return $endTime;
//        $getExp= Experience::where('cv_id',$cv_id1)
//        ->get();
//        return view('tables')->with('getExp',$getExp);
////
//
//    }


//function to get the experience table
    public function getTitle($id)
    {
        $track_id= $id;
        $item['item']=Experience::where('cv_id',$track_id)->get();//gets the array of data
        $item['name']=PersonalDetail::where('id',$track_id)->first();//only gets the first data

        return view('test',$item);


//        return view('test',$questions);

    }
    //function to get the education details
    public function getEducation($id){

        $track_id=$id;
//        $item['item']=AcademicQualification::where('cv_id',$track_id)->get();
    $item['item']=AcademicQualification::where('cv_id',$track_id)->get();
        $item['name']=PersonalDetail::where('id',$track_id)->first();//only gets the first data

        return view('pages.education',$item);
    }



}
