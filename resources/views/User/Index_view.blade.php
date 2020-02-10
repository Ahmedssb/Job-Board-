@extends('Layouts.User.User_app')

@section('landing')
  <!-- start landing page -->
  <div class="landing">
        <div class="home-wrap">     
           <div class="home-inner">
            </div> 
            
        </div>
          
       </div>
    <!-- end landing page -->
  <!-- start landing page ccaption -->
 <div class="caption center-block text-center justify-content-center">
   <h3>Your job is waiting</h3>   
    <table class="table-bordered " style="width: 70%;margin-left: 17%;"  >
      <tbody>
      <tr>
            <td  >
            <form action="{{route('Jobs')}}" method="post"   enctype="multipart/form-data" class="" name="filter"      >
                                    {{csrf_field()}}
                <div class="col-auto my-1">
                           <select name="category" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                           @foreach($categories as $cat)
                            <option  value="{{$cat->id}}" >{{$cat->name}}</option>
          
                            @endforeach
                          </select>
                      </div>
            </td>
           <td >
                  <div class="col-auto my-1">
                           <select name="location" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                           @foreach($countries as $cont)
                             <option value="{{$cont->id}}" {{$cont->id== 191 ? "selected" : ""}}>{{$cont->country_name}}</option>
                           @endforeach
                          </select>
                      </div> 
           </td>
         </tr>
     </tbody>
     
     </table> 
     <button type="submit" class="btn btn-success">Search</button>
     </form>        
 </div>
 @endsection

 @section('content')

 <!-- start miidel section -->
    
<div id="middle" >
    
    <div class="container " style="text-align: center;" > 
       <div class="row  justify-content-center flex-row" >
          <h3   class="middle-title"  >How It works</h3>
        </div> 
        
        <div class="row justify-content-center"  >
          
           <div class="col-md-4  text-center">
               <div class="card" style="width: 18rem;">
                   <span  class="card-img-top"><i class="fa fa-user" aria-hidden="true" style="font-size: 100px;color:#26baee;"></i></span>
                     <h3 class="card-title">1</h3>
                     <div class="card-body">
                       <h5 class="card-title">Creat An Account</h5>
                       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
               </div>   
           </div>
            
           <div class="col-md-4 text-center">
                <div class="card" style="width: 18rem;">
                   <span  class="card-img-top"><i class="fa fa-search" aria-hidden="true" style="font-size: 100px;color:#26baee;"></i></span>
                     <div class="card-body">
                       <h3 class="card-title">2</h3>
                       <h5 class="card-title">Search Jobs</h5>
                       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
               </div>
            
           </div>
           <div class="col-md-4 text-center">
               <div class="card" style="width: 18rem;">
                   <span  class="card-img-top"><i class="fa fa-check-square" aria-hidden="true" style="font-size: 100px;color:#26baee;"></i></span>
                     <div class="card-body">
                       <h3 class="card-title">3</h3>
                       <h5 class="card-title"> Save and Apply</h5>
                       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
               </div>
            
           </div>
   
        </div>
       
    </div>    
       
   </div>
   <!-- end middle section -->
   
   <!-- start latest job section -->
       
    <div id="jobs" >
       <div class="container-fluid justify-content-center" style="text-align: center;    background-color: #f8f9fa;
">
           <h3 class="jobs-title" >Latest job</h3>
           
           @foreach($jobs as $job)
           <div class="row justify-content-center">
              <div class="job-card">
                 <span>{{$job->created_at}}</span>
                  <h4>{{$job->title}}</h4>
                  <h6>{{$job->c_name}}</h6>
                  <p>
                  {{$job->des}}.
                  </p>
                  <span class="job-location">{{$job->location}}</span>    <span class="job-type">{{$job->type}}</span>
              </div>
           </div>
           @endforeach
            
           
           <button class="view-btn">View All</button>
           
       </div>
       
    </div>
   <!--end latest jobs section -->
    @endsection    

 