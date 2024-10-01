<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> @yield('title','HSGroup')</title> 
        
         @include('layout.link')
    </head> 
    <body> 
      {{-- hs_navbar_part --}}

      <div class="hs_socialmedia">
        <div class="row">
          <div class="col-6"></div>
          <div class="col-6 social_media_part"></div>
        </div>
       </div>
      
     <div class="navbar_part"> 
        <nav class="navbar navbar-expand-lg  fixed-top change_header hs_navbar_part">
            <div class="container-fluid">
              <a class="navbar-brand  " href="#">HSGroup</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('about_us')}}">About</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Online Service
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Online Service</a></li>
                      <li><a class="dropdown-item" href="#">Itr </a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Printing</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contact_us')}}">Contact Us</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" data-bs-target="#login_user" data-bs-toggle="modal" href="#">Login</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contact_us')}}">Register</a>
                  </li>
        

                 
                </ul>
         
              </div>
            </div>
          </nav>
       </div>   

       {{-- model part --}}

      <div class="modal fade" id="login_user" aria-hidden="true" aria-labelledby="login_user" tabindex="-1">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Login User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <section class="vh-100">
                <div class="container py-5 h-100">
                  <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                      <form>
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="email" id="form1Example13" class="form-control form-control-lg" />
                          <label class="form-label" for="form1Example13">Email address</label>
                        </div>
              
                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="password" id="form1Example23" class="form-control form-control-lg" />
                          <label class="form-label" for="form1Example23">Password</label>
                        </div>
              
                        <div class="d-flex justify-content-around align-items-center mb-4">
                          <!-- Checkbox -->
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3"> Remember me </label>
                          </div>
                          <a href="#!" data-bs-toggle="modal" data-bs-target="#forgot_password">Forgot password?</a>
                        </div>
              
                        <!-- Submit button -->
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Sign in</button>
              
                        <div class="divider d-flex align-items-center my-4">
                          <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>
              
                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="{{route('google_login')}}"
                          role="button">
                          <i class="fab fa-google-f me-2"></i>Continue with Google
                        </a>
                      </form>
                    </div>
                  </div>
                </div>
              </section>

            </div>
            <div class="modal-footer">
               </div>
          </div>
        </div>
      </div>
        

      {{-- forgot password --}}

    
      
      <!-- Modal -->
      <div class="modal fade" id="forgot_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    {{-- endforgot --}}
      
      
      
      
      @yield('content')
    </body> 

    {{-- footer part  --}}
    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2020 Copyright:
          <a class="text-body" href="">HS</a>
        </div>
        <!-- Copyright -->
      </footer>
</html> 
