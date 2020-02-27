
var   // get the div that show the job info 
job_details= document.getElementById('job_info'),
// get the div that list available jbs
job_listing = document.getElementById('job_listing'),
ineer_job_listing = document.getElementById('ineer_job_listing'),
job_container = document.getElementById('job_container'),
job_info = document.getElementById('job_info'),
div = document.createElement("div");


function showInfo(id){  

// change the class of job listing from col-md-8 to col-md-5 
job_listing.className = "col-md-5";
div.className = "col-md-5";

// change the dispaly of job details to block to show the job info 
job_details.setAttribute("style"," display: block;"); 

$.ajax({
    type:'get',
    url:'/job-details',
    data:{id:id},
    success:function(resp){
        var arr = resp.split("#");
        $('#job_title').text(arr[0]);
        $('#job_company').text(arr[1]);
        $('#job_date').text(arr[2]);
        $('#job_description').text(arr[3]);
        $('#job_location').text(arr[4]);
        $('#job_role').text(arr[5]);
        $('#job_type').text(arr[6]);
        $('#salary').text(arr[7]);
        $('#vacancies').text(arr[8]);

        var list = document.getElementById('job_skills');
            // As long as <ul> has a child node, remove it
            while (list.hasChildNodes()) {  
                list.removeChild(list.firstChild);
            }
        // if arrays contains skills the arr lenght will be greater than 8
        if(arr.length>8){
             for(i=9;i < arr.length-1 ;i++){
              list.innerHTML +="<li>" + arr[i]+ "</li>";
            } 
        }
      
    },error:function(){
        alert('error!!');
    }
});

}

// when close btn cliced hide the job info and change the job listing div class to col-md-8
function hideInfo(){  
    // change the dispaly of job details to block to hide the job info 
    job_details.setAttribute("style"," display: none;"); 

    // change the class of job listing from col-md-4 to col-md-8  
    job_listing.className = "col-md-8"; 
    div.className = "col-md-8";   


}


// deal with filteres 
$(document).ready(function(){

    var list =[];// array that contains all values that had been checked  
    var job_data =[];
    list.push('f2allf2');
    list.push('f3allf3');

 $('.cont_list').change(function() 
  {    
     
      // if checkbox checked then add it's value to the array 
    if(this.checked == true)
    {     
        var filter_id = $(this).val();
          list.push(filter_id);
          alert(list);
    }else {  // if checkbox unchecked delete it's value from the array
        if(this.checked  == false){
          var filter_id = $(this).val();
          // get index of the object 
          var index= findWithAttr(job_data, 'cont_id',filter_id);
              //console.log(index);
              // remove the element from the list array 
              removeElement(list,filter_id);
              job_data.splice(index, 1);
 
           }
         
       }

       if($(this).val().startsWith('f1')){
        if($(this).val().endsWith('f1')){
          }else{
          // if any of the countries values filter checked then uncheck (All)  
          document.getElementById("f1all").checked = false;
          removeElement(list,"f1allf1");
        }
    }else if($(this).val().startsWith('f2')){
        if($(this).val().endsWith('f2')){
          }else{
          // if any of the categories values filter checked then uncheck (All)  
          document.getElementById("f2all").checked = false;
          removeElement(list,"f2allf2");
        }
  }else{
   // if any of the type values filter checked then uncheck (All)  
    if($(this).val().endsWith('f3')){
          }else{
          // uncheck the all  
          document.getElementById("f3all").checked = false;
          removeElement(list,"f3allf3");
        }
  }

  /* varible count to count how many box checked for every filter 
  if none checked then All must be selectes */ 
  var cont_count=0;
      cat_count=0,
      type_count=0;
   for(i=0;i<list.length ;i++){
      // for every filter increase the count when any box selected 
    if(list[i].startsWith('f1')){
        cont_count++;
        }
   if(list[i].startsWith('f2')){
    cat_count++;
    }
    if(list[i].startsWith('f3')){
        type_count++;
        }
  }
// for every filter if count ==0 then push All value into the list array 
    if(cont_count==0){
        document.getElementById("f1all").checked = true;
        list.push('f1allf1')
    }
    if(cat_count==0){
        document.getElementById("f2all").checked = true;
        list.push('f2allf2')
    }
    if(type_count==0){
        document.getElementById("f3all").checked = true;
        list.push('f3allf3')
    }
         
        $.ajax({
            type:'get',
            url:'/job-filter',
            data:{list:list},
            dataType:"JSON",
            success:function(data){
                /*for($i=0;$i<list.length;i++){
                    document.getElementById(list[$i]).checked = true;
                }*/
              job_data = data;
             job_listing.setAttribute("style"," display: none;"); 
              div.className = "col-md-8 ";   
             job_container.insertBefore(div, job_info);
             // for each ajax request delete all div content and create it again
            var child = div.lastElementChild;  
            while (child) { 
                div.removeChild(child); 
                child = div.lastElementChild; 
            }
            // create jobs divs based on array lenght coming from json
            for(i=0;i<job_data.length ;i++){
                var  job_frame = document.createElement("div");
          
                job_frame.className = "job-frame job-details";  
                job_frame.innerHTML =" <h4 id='f_job_title'>"+job_data[i].title+"</h4>  <button id='"+job_data[i].id+"' onclick='showInfo("+job_data[i].id+")' value='"+job_data[i].id+"' class='job-frame-btn' ><a href='#'>Details</a></button> <h6>"+job_data[i].c_name+ "<span>"+job_data[i].created_at+"</span></h6> <p>"+job_data[i].des+"</p> <span class='job-location'>"+job_data[i].location+"</span> <span class='job-type'>"+job_data[i].type+"</span> " ;
                div.append(job_frame);
               }
              },error:function(){
                alert('error!!');
            }
        });
      
  });

});

// function to remove element from array based on it's value 
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}

// function to get element index of an array of objects or multi dim array based on it's value 
function findWithAttr(array, attr, value) {
    for(var i = 0; i < array.length; i += 1) {
        if(array[i][attr] == value) {
            return i;
      }
    }
    return -1;
}
