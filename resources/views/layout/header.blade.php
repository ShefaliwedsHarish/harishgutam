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
                    <a class="nav-link" data-bs-target="#register_from" data-bs-toggle="modal" href="#">Register</a>
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
              
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" data-bs-target="#register_from" data-bs-toggle="modal">Register</button>
              
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
      <div class="modal top fade" id="forgot_password" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
     <div class="modal-dialog" style="width: 300px;">
         <div class="modal-content text-center">
             <div class="modal-header h5 text-white bg-primary justify-content-center">
                 Password Reset
             </div>
             <div class="modal-body px-5">
                 <p class="py-2">
                     Enter your email address and we'll send you an email with instructions to reset your password.
                 </p>
                 <div data-mdb-input-init class="form-outline">
                     <input type="email" id="typeEmail" class="form-control my-3" />
                     <label class="form-label" for="typeEmail">Email input</label>
                 </div>
                 <a href="#" data-mdb-ripple-init class="btn btn-primary w-100">Reset password</a>
                 <div class="d-flex justify-content-between mt-4">
                  <a class="nav-link" data-bs-target="#login_user" data-bs-toggle="modal" href="#">Login</a>
                     <a class=""data-bs-target="#register_from" data-bs-toggle="modal"  href="#">Register</a>
                 </div>
             </div>
         </div>
     </div>
 </div>

    {{-- endforgot --}}
      

    {{-- Regester form  --}}

    <div class="modal fade" id="register_from" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registration</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
        <section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Welcome HS Group </h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="form3Example1m" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="form3Example1n" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1n">Last name</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="number" id="form3Example1m1" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m1">Phone Number </label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="email" id="form3Example1n1" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1n1">Email</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="password" id="form3Example1m1" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1m1">Password  </label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="password" id="form3Example1n1" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example1n1">Conform Password</label>
                    </div>
                  </div>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="file" id="form3Example8" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example8">Profile</label>
                </div>



                <div class="d-flex justify-content-end pt-3">
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg" data-bs-target="#login_user" data-bs-toggle="modal">Login</button>
                  <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit form</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> --}}
          </div>
        </div>
      </div>
    </div>

    {{-- end register form --}}
      
      
      
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
