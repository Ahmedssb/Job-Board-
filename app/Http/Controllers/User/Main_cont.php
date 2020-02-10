<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Job;
use App\Model\Country;
use App\Model\Category;

class Main_cont extends Controller
{
    //

    public function index(){

            $jobs = Job::latest()->limit(2)->get();
           $countries = Country::all();
           $categories = Category::all();
           // send the jobs with their countries and category into the index view
           $arr['countries']= $countries;
           $arr['categories']= $categories;
           $arr['jobs']= $jobs;
        return view('User.Index_view',$arr);
    }


    public function findJobs(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
          // $data= preg_replace('/ " " /', ' ',$data);
          // dd($data['location']);
             $jobs = Job::where(['cont_id'=> $data['location'],'cat_id'=>$data['category']])->get();
             $arr['jobs'] = $jobs;
        }
        return view('User.JobListing_view',$arr);

    }
}
