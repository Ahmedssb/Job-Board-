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
     <div class="row justify-content-center" id="job_container">
         
              <!-- sart filter section -->
         <div class="col-md-3  "  style="background-color: #fff" >
             
                 <!-- location filter -->
                   <div class="filter-type"   >

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">By Country</label>
                      </div>

                       <div>
                                <a  href="#"><input type="checkbox" class="cont_list" id="f1all" value="f1allf1"  > All</a>
   
                                 @foreach($countries_g1 as $cont1)
                                 <a  href="#" ><input type="checkbox" class="cont_list" name="cont_list[]" value="{{'f1'.$cont1->id}}" id="{{'f'.$cont1->id}}">{{$cont1->country_name}}</a>
                                 @endforeach
                                 <span id="loc-dots">...</span><span id="loc-more" class="more">
                                 @foreach($countries_g2 as $cont2)
                                <a  href="#" ><input type="checkbox" value="{{'f1'.$cont2->id}}" class="cont_list" name="cont_list[]"  id="{{'f1'.$cont2->id}}"  >{{$cont2->country_name}}</a>
                                @endforeach
                               </span>
                               <button onclick="showMore('loc-dots','loc-more','loc-btn')"  id="loc-btn" class="more-btn">Show more</button>
                        </div>

                    </div>
             <!-- end location filter -->

                 <!-- category filter -->
                   <div class="filter-type" >

                      <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">By Category</label>
                         
                      </div>

                       <div>
                       <a  href="#"><input type="checkbox" class="cont_list" id="f2all" value="f2allf2" checked> All</a>
                           @foreach($categories_g1 as $cat1)
                                <a  href="#"><input type="checkbox" class="cont_list" id="{{'f2'.$cat1->id}}" value="{{'f2'.$cat1->id}}"  > {{$cat1->name}}</a>
                          @endforeach
                               <span id="cat-dots">...</span><span id="cat-more"  class="more">
                          @foreach($categories_g2 as $cat2)
                                     <a  href="#"><input type="checkbox" class="cont_list" id="{{'f2'.$cat2->id}}" value="{{'f2'.$cat2->id}}" > {{$cat2->name}}</a>
                          @endforeach
                               </span>
                               <button onclick="showMore('cat-dots','cat-more','cat-more-btn')" id="cat-more-btn" class="more-btn">Show more</button>

                        </div>

                    </div>
             <!-- end category filter -->

                  <!-- type filter -->
                   <div class="filter-type"  style="overflow: hidden">

                   <div class="col-auto my-1">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">By Type</label>
                         
                      </div>

                      <div>
                                <a  href="#"><input type="checkbox" class="cont_list" id="f3all" value="f3allf3" checked > All</a>
                                <a  href="#"><input type="checkbox" class="cont_list" id="full" value="f3Full Time"  > Full Time</a>
                                <a  href="#"><input type="checkbox" class="cont_list" id="pat" value="f3Part Time"  > Part Time</a>
                                <a  href="#"><input type="checkbox" class="cont_list" id="contract" value="f3Contract"  > Contract</a>
                                <a  href="#"><input type="checkbox" class="cont_list" id="interenship" value="f3Internship"  > Internship</a>

                        </div>

                  </div>
             <!-- end type filter -->
             
         </div>
         <!-- end filter section -->
         
         <!-- sart job listin -->
      
          <div class="col-md-8 " id="job_listing">
               @foreach($jobs as $job)
                <div class="job-frame job-details"  style="background-color:#fff">
                        <h4 id="f_job_title">{{$job->title}}</h4>  <button id="{{$job->id}}" onclick="showInfo({{$job->id}})" value="{{$job->id}}" class="job-frame-btn" ><a href="#">Details</a></button>
                       <h6>{{$job->c_name}} <span>{{$job->created_at}}</span></h6>
                       <p>
                       {{$job->des}}                       </p>
                       <span class="job-location">{{$job->location}}</span>    <span class="job-type">{{$job->type}}</span>  
                    
               </div>
             @endforeach
             
                 
         </div>
         <!--end job listing -->
             <!-- sart job details -->
    <div class="col-md-4  details-div"  id="job_info" >   
            <div class=" job-container job-details"  style="background-color:#fff">
                       <div class="details-div1">
                            <button  class="div1-btn1" ><span onclick="hideInfo()" id="close_btn"  aria-hidden="true">×</span></button>
                             <h5 id="job_title">Web developer</h5>
                           <h6 id="job_company">Company name <span id="job_date">12/2019</span></h6>
                           <button class="div1-btn2"  data-toggle="modal" data-target="#jobApply" id="job_apply_btn">Apply</button>
                           @auth
                          <!-- start Modal -->
                        <div class="modal fade" id="jobApply" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content" >
                              <div class="modal-header">
                                <h5 class="" style="color: #2784fc">Apply To job</h5>
                               <button type="button" class="close" style="color: #2784fc" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body modal-input-div">
                                  <label>name *</label>
                                 <input type="text" required>
                                   <label>E-mail*</label>
                                 <input type="email"  required>
                                  <label>Phone</label>
                                 <input type="phone"  required>
                                  <label>CV *</label>
                                  <input type="file" placeholder="Upload"   required>

                              </div>
                              <div class="modal-footer">
                             <button type="submit" class="btn  btn-block" style="background-color: #2784fc;color:#fff"><span class="glyphicon glyphicon-off"></span> Apply</button>

                              </div>
                            </div>

                          </div>
                        </div>
                         @endauth
                       <!-- end modal -->

                      </div>   
                       <div class="details-div2" >
                         <h6>Job Description </h6>
                           <p id="job_description">
                              We are seeking a .NET developer responsible for building/maintaining .NET applications using ASP.Net, VB.net, jQuery and Web Services. Your primary responsibility will be to maintain and develop our application.
                           </p>
                           
                           <h6>Skills</h6>
                           <ul style="text-align: left"  id="job_skills">
                              
                           </ul>
                           
                         <h6>job Details</h6>
                         <table  class="details-table">
                           <tr >
                               <td  >Job Location </td>
                               <td id="job_location">Riyadh</td>
                           </tr>
                           <tr>
                               <td>Job Role </td>
                               <td id="job_role">Information Technology</td>
                           </tr>
                           <tr>
                               <td>Employment Type </td>
                               <td id="job_type">Full Time </td>
                           </tr>
                           <tr>
                               <td>Salary </td>
                               <td id="salary">1000$ </td>
                           </tr>
                          <tr>
                               <td>Num of vacancies </td>
                               <td id="vacancies">1 </td>
                           </tr>
                         </table>   
                           
                     </div>
               </div>     
        
</div>
    </div>
   
        
        
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
<!-- end jobs section -->

@endsection

