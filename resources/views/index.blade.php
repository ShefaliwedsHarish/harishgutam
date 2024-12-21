
@extends('layout.header')
@section('title')
  Home
@stop

@section('content')
@php 
// $config=config('path.craousal');

$config = config('APP_ENV') == 'live' ? config('live_path.craousal') : config('path.craousal');

@endphp 

<body>
<!-- Swiper -->
<div class="swiper homeslider">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="{{$config}}img1.jpg"> </div>
    <div class="swiper-slide"><img src="{{$config}}img2.jpg"></div>
    <div class="swiper-slide"><img src="{{$config}}img3.jpg"></div>
    <div class="swiper-slide"><img src="{{$config}}img4.jpg"></div>
    <div class="swiper-slide"><img src="{{$config}}img5.jpg"></div>
    <div class="swiper-slide"><img src="{{$config}}img6.jpg"></div>
  </div>
  {{-- <div class="swiper-pagination"></div> --}}
</div>

<div class="container">
  <div class="hs_details_data">
  <div class="row">
    <div class="col-sm-12 col-lg-6 col-xl-6">
      <h1> Welcome to HS Group </h1>
      <p class="hs_second">
        We are with you and waiting for your call
      </p>
      <p class="tird_second">
        Welcome to HSGroup, your one-stop destination for online services that cater to both your financial and 
        creative needs.Whether you’re looking to file your Income Tax Return (ITR) quickly and securely or design custom 
        T-shirts with your unique style, we’ve got you covered!Our platform offers seamless, user-friendly solutions 
        to help you manage your taxes with ease while exploring your creativity with high-quality, personalized apparel. 
        Experience hassle-free ITR filing and professional T-shirt printing, all in one place, at the click of a button!
      </p>
   </div>
   {{-- images part --}}
    <div class="col-sm-12 col-lg-6 col-xl-6">
      <div class="card home_images" style="width: 18rem;">
        <img src="{{$config}}img1.jpg" class="card-img-top" alt="...">
      </div>
      <div class="card home_images second_images" style="width: 18rem;">
        <img src="{{$config}}img1.jpg" class="card-img-top" alt="...">
      </div>
      <div class="card home_images thrid_images" style="width: 18rem;">
        <img src="{{$config}}img1.jpg" class="card-img-top" alt="...">
      </div>
    </div>
  </div>
</div> 
</div>

<div class="hs_reviews">
    {{-- <div class="hs_headingpart">
                 Reviews
    </div> --}}
    <div class="row">
      <div class="col">
        <section>
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-xl-8 text-center">
              <h3 class="mb-4">Review</h3>
              <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                quisquam eum porro a pariatur veniam.
              </p>
            </div>
          </div>
        
          <div class="row text-center d-flex align-items-stretch">
            <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
              <div class="card testimonial-card">
                <div class="card-up" style="background-color: #9d789b;"></div>
                <div class="avatar mx-auto bg-white">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                    class="rounded-circle img-fluid" />
                </div>
                <div class="card-body">
                  <h4 class="mb-4">Maria Smantha</h4>
                  <hr />
                  <p class="dark-grey-text mt-4">
                    <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet eos adipisci,
                    consectetur adipisicing elit.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-5 mb-md-0 d-flex align-items-stretch">
              <div class="card testimonial-card">
                <div class="card-up" style="background-color: #7a81a8;"></div>
                <div class="avatar mx-auto bg-white">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                    class="rounded-circle img-fluid" />
                </div>
                <div class="card-body">
                  <h4 class="mb-4">Lisa Cudrow</h4>
                  <hr />
                  <p class="dark-grey-text mt-4">
                    <i class="fas fa-quote-left pe-2"></i>Neque cupiditate assumenda in maiores
                    repudi mollitia architecto.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-0 d-flex align-items-stretch">
              <div class="card testimonial-card">
                <div class="card-up" style="background-color: #6d5b98;"></div>
                <div class="avatar mx-auto bg-white">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                    class="rounded-circle img-fluid" />
                </div>
                <div class="card-body">
                  <h4 class="mb-4">John Smith</h4>
                  <hr />
                  <p class="dark-grey-text mt-4">
                    <i class="fas fa-quote-left pe-2"></i>Delectus impedit saepe officiis ab
                    aliquam repellat rem unde ducimus.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

</div>





@stop