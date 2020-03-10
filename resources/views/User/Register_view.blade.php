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
 <!-- start sign up   section -->
<div class="container" style="padding: 20px 0px;">
 
 <div class="col-md-10 offset-md-1 job-post"  >
        <h4 style="margin-bottom: 20px;">Creat An Account</h4>
      
     <div class="tab-content">
                 <!-- start candidate login form--> 
         <div id="r_cand" class="container tab-pane active">
                  <form class="login-form" method="post" action="{{route('Register')}}" id="register"> 
                     {{csrf_field()}}
                     <div class="form-group ">
                          <label  >Full Name</label>
                          <input type="text" class="form-control  "  id="name"  name="name">
                    </div>
                    <div class="form-group ">
                          <label  >E-mail</label>
                          <input type="email" class="form-control  "  id="email"  name="email">
                    </div>

                    <div class="form-group">
                          <label  >Password</label>
                          <input type="password" class="form-control  " id="pass"     name="pass">
                    </div> 
                    
                     <div class="form-group">
                          <label  >Confirm Password</label>
                          <input type="password" class="form-control  " id="confirm"    name="confirm">
                    </div> 
                    <label  >Account Type</label>

                    <div class="form-group">
                       <label class="radio-inline">
                              <input type="radio" name="account_type" id="account_cand" value="0" checked>Candidate
                        </label>
                        <label class="radio-inline">
                              <input type="radio" name="account_type" id="account_comp" value="1">Company
                        </label>
                    </div>
                      
                    <input type="submit" class="btn btn-primary " value="Register">  
                 </form>
         </div>
      <!-- end candidate login form-->
       
         
         
     </div>      


 </div>   
  
  
</div>

<!-- end sign up  section -->
@endsection