<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Job;
use App\Model\Country;
use App\Model\Category;
use App\Model\Skill;
use Illuminate\Support\Facades\DB;

class Main_cont extends Controller
{
    // return the available countries and  categories to the home page 
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

     // return all job availble based on the country and category user selected 
    public function findJobs(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
              $jobs = Job::where(['cont_id'=> $data['location'],'cat_id'=>$data['category']])->get();
              $countries = Country::all();
              $categories = Category::all();
             /* divide countries into two groups to make it easy
              to display show more show less in listing job page filter*/
              $countries_g1=$countries->slice(0,10);
              $countries_g2=$countries->slice(10);
                /* divide countries into two groups to make it easy
              to display show more show less in listing job page filter*/
              $categories_g1=$categories->slice(0,5);
               $categories_g2=$categories->slice(5);
             // send the jobs with their countries and category into the index view
             $arr['countries_g1']= $countries_g1;
             $arr['countries_g2']= $countries_g2;
             $arr['categories_g1']= $categories_g1;
             $arr['categories_g2']= $categories_g2;

             $arr['jobs'] = $jobs;

           
        }
        return view('User.JobListing_view',$arr);

    }
    

    // return job details when user click any job details button 
    public function jobDetails(Request $request ){

       $data = $request->all();
       $id = $data['id'];
       $jobDetails = Job::where(['id'=>$id])->first();
       $jobCat = Category::find($jobDetails->cat_id);
       $jobSkills = Skill::where(['job_id'=>$id])->get();
       echo $jobDetails->title;
       echo "#"; 
       echo $jobDetails->c_name;
       echo "#";
       echo $jobDetails->created_at;
       echo "#";
       echo $jobDetails->des;
       echo "#";
       echo $jobDetails->location;
       echo "#";
       echo $jobCat->name;
       echo "#";
       echo $jobDetails->type;
       echo "#";
       echo $jobDetails->salary;
       echo "#";
       echo $jobDetails->vacancies_num;
       echo "#";
       foreach($jobSkills as $skill){
        echo $skill->name;
        echo "#";
       }

      }


    // function ot return filtered jobs when  user check any of the filteres  
   public function filterJobs(Request $request){
     // get the filter array from the ajax request 
     $data = $request->input('list');
      // intilize all varible related to the query 
      $country="";
      $category =" and(";
      $type =" and(";
      $cont_count=1;
      $cat_count=1;
      $type_count=1;
      $countryAll=false;
      $categoryAll=false;
      $typeAll=false;

      for($i=0;$i<count($data);$i++){
                 /* if the data start with f1 then it will be for filter 1 countries */
                if(strpos($data[$i],'f1') === 0 ){
                  // if checkbox all selected (all countries)
                  if($data[$i]=="f1allf1"){
                    $country="";
                    $countryAll=true;
                  }else{
                    if($cont_count==1){
                      $country="( cont_id =".str_replace('f1','',$data[$i]);
                      }
                      else{
                      $country.=" or cont_id =".str_replace('f1','',$data[$i]);
                      }
                      $cont_count++;  
                  }
                 /* if the data start with f2 then it will be for filter 2 categories */
                }elseif(strpos($data[$i],'f2') === 0){
                 // if checkbox all selected (all categories)
                  if($data[$i]=="f2allf2"){
                    $category="";
                    $categoryAll=true;
                  }else{
                    if($cat_count==1){
                      $category.=" cat_id =".str_replace('f2','',$data[$i]);
                      }
                      else{
                      $category.=" or cat_id =".str_replace('f2','',$data[$i]);
                      }
                      $cat_count++;
                  }
                 /* if the data doesn't start with f1 nor f2 then it will be for filter 3 type */
                }else{
               // if checkbox all selected (all types)
                  if($data[$i]=="f3allf3"){
                    $type="";
                    $typeAll=true;
                  }else{
                    if($type_count==1){
                      $type.=" type =".str_replace('f3','',$data[$i]);
                      }
                      else{
                      $type.=" or type =".str_replace('f3','',$data[$i]);
                      }
                      $type_count++;
                  }
                 }
      } // end of the loop 
              
           // cehck for every filter if all not selected then adjust the query syntax in aproper way
              if($countryAll==false){
                $country.=")";            
              }

              if( $categoryAll==false){
                $category.=")";
                if( $country==""){
                  $category=str_replace('and','',$category);
                } 
              }

              if( $typeAll==false){
                $type.=")";
                if( ($country=="" and $category=="") ){
                  $type=str_replace('and','',$type);
                }
            }
          
    // if all country category and type filteres selected as all then jobs=select*jobs;

    $jobs="";
    if($country=="" and $category=="" and $type=="" ){
      $jobs =Job::all();
    }else{
      $q=$country.$category.$type;
      $jobs = DB::select(DB::raw("select * from jobs where $q"));
    }
     
    echo json_encode($jobs);
    
    }
}
