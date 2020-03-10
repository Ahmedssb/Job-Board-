<!Doctype html>

<html>

<head>
    
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta  content=""  >
    <title>Job Stock</title>
    
    <link rel="stylesheet" href="/User/css/main.css">
    <link rel="stylesheet" href="/User/css/listing.css">
    <link rel="stylesheet" href="/User/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="/User/images/jobStock.png" type="image/png" sizes="20x20">

    
</head>

<body>
<!-- start home section --> 
<div id="home">
 
  @include('Layouts.User.User_header') 
  @yield('landing')
  
</div> 
<! --end home section --> 
@if(Session::has('msg_err'))
    <div class="alert alert-danger" role="alert" style="text-align: center;">
                   <button type="button" class="close" data-dismiss="alert">x</button>
                   <h4> <i class="fa fa-ban"></i>Failed!</h4>
                    {{Session::get('msg_err')}}
    </div>
 @endif
@yield('content')

@include('Layouts.User.User_footer')

<script src="/User/js/jquery-3.4.1.js"></script>
 <script src="/User/js/popper.min.js"></script>
 <script src="/User/js/bootstrap.min.js"></script>   
 <script src="/User/js/main.js"></script>  
 <script src="/User/js/jquery.validate.min.js"></script>

      
<script>
// navbar background color change on scroll
jQuery(document).ready(function(){
    
      jQuery(window).scroll(function(){
        var scroll = jQuery(window).scrollTop();
          if (scroll > 300) {
          $("nav").css({"background-color": "#242424"});
          $(".nav-link").css({"color": "fff"});
          }
          else{
          $("nav").css({"background-color": "#fff"});
          $(".nav-link").css({"color": "#888C8A"});

          }
      })
})
    
  </script>

<script>
function showMore(par1,par2,par3) {
   
      var dots = document.getElementById(par1);
      var moreText = document.getElementById(par2);
      var btnText = document.getElementById(par3);

      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Show more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Show less"; 
        moreText.style.display = "inline";
      }
}
</script>

</body>


</html>