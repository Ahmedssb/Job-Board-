<! -- start nav -->
    <nav class="navbar navbar-expand-md  navbar-light   fixed-top justify-content-center custom-nav">
        <div class="container-fluid">
        <a  class="navbar-brand  " href="index.html"><img src="/User/images/jobStock.png" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class=" collapse navbar-collapse " id="menu">

              <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('Home')}}"  style="color:#888C8A   ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{route('PostJob')}}"  style="color:#888C8A   ">Post Job</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Logout')}}" style="color: #888C8A">Log Out</a>
                    </li>
                    @else 
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Register')}}" style="color: #888C8A">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Login')}}" style="color: #888C8A">Sign in</a>
                    </li>
                   @endauth
               </ul>

            </div> 

        </div>
    
    </nav>
  <!--end nav -->