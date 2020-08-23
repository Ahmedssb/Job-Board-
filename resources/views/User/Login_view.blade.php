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

<!-- start sign  in   section -->
<div class="container" style="padding: 20px 0px;">
 
   <div class="col-md-10 offset-md-1 job-post"  >
          
                <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item nav-title">
          <a class="nav-link active" data-toggle="tab" href="#cand">Candidates</a>
        </li>
        <li class="nav-item nav-title">
          <a class="nav-link" data-toggle="tab" href="#company">Company</a>
        </li>

      </ul>

       <div class="tab-content">
                   <!-- start candidate login form--> 
           <div id="cand" class="container tab-pane active">
                    <form class="login-form" method="post" action="{{route('Login')}}" id="login_form">   
                       {{csrf_field()}}   
                      <div class="form-group ">
                            <label  >E-mail</label>
                            <input type="email" class="form-control  "  id="email" placeholder="fh@gmail.com" name="email">
                      </div>

                      <div class="form-group">
                            <label  >Password</label>
                            <input type="password" class="form-control  " id="password"   placeholder="...." name="password">
                      </div> 
                      <input type="submit" class="btn btn-primary " value="Log In"> <a href="#" class="forget-pass">Forget Password</a>
                   </form>
           </div>
        <!-- end candidate login form-->
        <!-- start company login form--> 
           <div id="company" class="tab-pane container fade">
                    <form class="login-form" method="post" action="{{route('Login')}}" id="company_login">      
                      <div class="form-group ">
                            <label  >E-mail</label>
                            <input type="email" class="form-control  "  id="company_email" placeholder="company@gmail.com" name="company_email">
                      </div>

                      <div class="form-group">
                            <label  >Password</label>
                            <input type="password" class="form-control  " id="company_pass"   placeholder="...." name="company_pass">
                      </div> 
                      <input type="submit" class="btn btn-primary " value="Log In"> <a href="#" class="forget-pass">Forget Password</a>
                   </form>
           </div>
        <!-- end company login form-->
           
           
       </div>      
 

   </div>   
    
    
</div>

<!-- end sign in  section -->
@endsection