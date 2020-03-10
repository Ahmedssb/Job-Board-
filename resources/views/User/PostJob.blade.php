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
<!-- start post job   section -->
<div class="container" style="padding: 20px 0px;">

      <div class="col-md-10 offset-md-1 job-post" >
      <h3 > Post a job</h3>

         <form>
              <div class="form-group">
                <label for="exampleFormControlInput1">Job Titile</label>
                <input type="text" class="form-control"   placeholder="job title">
              </div>
             
              <div class="form-group">
                <label for="exampleFormControlInput1">Company Name</label>
                <input type="text" class="form-control"   placeholder="Name">
              </div>
             
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control"   rows="5"></textarea>
              </div>
             
              <div class="form-group" id="skills">
                <label >Skills</label>  <label style="float: right"><button type="button" class="add-skills-btn" id="add_skills">+</button></label>
                <input type="text" class="form-control"   placeholder="skill">
              </div>
             
              <div class="form-group">
                <label  >Job Type</label>
                <select class="form-control"  >
                  <option>Full Time</option>
                  <option>Part Time</option>
                  <option>Internship</option>
                  <option>Contract</option>
                 </select>
              </div>
             
              <div class="form-group">
                <label  >Location</label>
                <select class="form-control"  >
                  <option>Saudi Arabia</option>
                  <option>Jordan</option>
                  <option>Bahrain</option>
                  <option>Kuwait</option>
                 </select>
              </div>
             
             <div class="form-group">
                <label  >City</label>
                <input type="text" class="form-control"   placeholder="Cty">
              </div>
             
            <div class="form-group">
                <label  >Role</label>
                <select class="form-control"  >
                  <option>Information Technology</option>
                  <option>Accounting</option>
                  <option>Engneering</option>
                  <option>sales</option>
                 </select>
              </div>
             
              <div class="form-group">
                <label  >Salary</label>
                <input type="number" class="form-control"   placeholder="$1000">
              </div>
             
              <div class="form-group">
                <label  >Num of Vacancies</label>
                <input type="number" class="form-control"   placeholder="2">
              </div>
             
             <button type="submit" class="btn btn-primary post-btn">Post</button>
      </form>

      </div>   
 </div>

<!-- end post job  section -->
@endsection


