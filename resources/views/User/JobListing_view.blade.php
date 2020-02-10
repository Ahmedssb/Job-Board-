@extends('Layouts.User.User_app')

@section('landing')
  <!-- start landing page -->
  <div class="landing-browse">
        <div class="home-wrap">     
           <div class="home-inner">
            </div> 
            
        </div>
          
       </div>
    <!-- end landing page -->
  <!-- start landing page ccaption -->
 <div class="caption-browse center-block text-center justify-content-center">
   <h3>Your job is waiting</h3>   
    

 </div>

 @endsection

 @section('content')

 
<!-- start jobs   section -->
    
<div id="jobs">
    <div class="container-fluid justify-content-center" style=" text-align: center;padding:0 3%">
        <h3 class="page-title">Information Jobs in Saudi</h3>
     <div class="row justify-content-center">
         
              <!-- sart filter section -->
         <div class="col-md-4  "  style="background-color: #fff" >
             
                 <!-- location filter -->
                   <div class="filter-type"   >

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">country</label>
                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                      </div>

                       <div>
                           <ul>
                               <a  href="#"><li>Saudi Arabia</li></a>
                               <a  href="#"><li>Kuwait</li></a>
                               <a  href="#"><li>UAE</li></a>
                               <a  href="#"><li>Oman</li></a>
                               <a  href="#"><li>Jordan</li></a>
                               <a  href="#"><li>Baharin</li></a>
                               <span id="loc-dots">...</span><span id="loc-more" class="more">
                               <a  href="#"><li>Saudi Arabia</li></a>
                               <a  href="#"><li>Kuwait</li></a>
                               <a  href="#"><li>UAE</li></a>
                               <a  href="#"><li>Oman</li></a>
                               <a  href="#"><li>Jordan</li></a>
                               <a  href="#"><li>Baharin</li></a>
                               </span>
                               <button onclick="showMore('loc-dots','loc-more','loc-btn')"  id="loc-btn" class="more-btn">Show more</button>
                           </ul>
                       </div>

                    </div>
             <!-- end location filter -->

                 <!-- category filter -->
                   <div class="filter-type" >

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Information Techonolgy</option>
                            <option value="1">Adminstration</option>
                            <option value="2">Sales</option>
                            <option value="3">Engneering</option>
                          </select>
                      </div>

                       <div>
                           <ul>
                               <a  href="#"><li>Accounting and Auditing</li></a>
                               <a  href="#"><li>Managment</li></a>
                               <a  href="#"><li>Teaching and Acadmics</li></a>
                               <a  href="#"><li>Consulting</li></a>
                               <a  href="#"><li>Safety</li></a>
                               <a  href="#"><li>Finance</li></a>
                               <span id="cat-dots">...</span><span id="cat-more"  class="more">
                               <a  href="#"><li>Managment</li></a>
                               <a  href="#"><li>Teaching and Acadmics</li></a>
                               <a  href="#"><li>Consulting</li></a>
                               <a  href="#"><li>Safety</li></a>
                               </span>
                               <button onclick="showMore('cat-dots','cat-more','cat-more-btn')" id="cat-more-btn" class="more-btn">Show more</button>

                           </ul>
                       </div>

                    </div>
             <!-- end category filter -->

                  <!-- type filter -->
                   <div class="filter-type" >

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Type</label>
                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">Full time</option>
                            <option value="2">Part Time</option>
                            <option value="2">Conract</option>
                           </select>
                      </div>

                  </div>
             <!-- end type filter -->
             
         </div>
         <!-- end filter section -->
         
         <!-- sart job listin -->
         <div class="col-md-8 ">
               @foreach($jobs as $job)
                <div class="job-container"  style="background-color:#fff">
                        <h4>{{$job->title}}</h4> <button><a href="#">Details</a></button>
                       <h6>{{$job->c_name}} <span>{{$job->created_at}}</span></h6>
                       <p>
                       {{$job->des}}                       </p>
                       <span class="job-location">{{$job->location}}</span>    <span class="job-type">{{$job->type}}</span>  
                    
               </div>
             @endforeach
             
                 
         </div>
         <!--end job listing -->
    
    </div>
    <div class="pag-div" >
        <ul class="pagination   justify-content-center">
          <li class="page-item"><a class="page-link circle-link pre"  href="#" >Previous</a></li>
          <li class="page-item  circle-item"><a class="page-link circle-link" href="#" >1</a></li>
          <li class="page-item circle-item"><a class="page-link circle-link" href="#">2</a></li>
          <li class="page-item circle-item"><a class="page-link circle-link" href="#">3</a></li>
          <li class="page-item circle-item   "><a  class="page-link circle-link nex" href="#">Next</a></li>
        </ul>
    </div> 
        
        
</div>
 
    
</div>    
<!-- end jobs section -->

@endsection

