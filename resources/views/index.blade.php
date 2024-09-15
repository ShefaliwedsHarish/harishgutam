
@extends('layout.header')
@section('title')
  Home
@stop

@section('content')

<body>
<!-- Swiper -->
<div class="swiper homeslider">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="/slider/img1.jpg"> </div>
    <div class="swiper-slide"><img src="/slider/img2.jpg"></div>
    <div class="swiper-slide"><img src="/slider/img3.jpg"></div>
    <div class="swiper-slide"><img src="/slider/img4.jpg"></div>
    <div class="swiper-slide"><img src="/slider/img5.jpg"></div>
    <div class="swiper-slide"><img src="/slider/img6.jpg"></div>
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
    <div class="col-sm-12 col-lg-6 col-xl-6">

      <div class="card home_images" style="width: 18rem;">
        <img src="/slider/img1.jpg" class="card-img-top" alt="...">
      
      </div>

      <div class="card home_images second_images" style="width: 18rem;">
        <img src="/slider/img1.jpg" class="card-img-top" alt="...">
      </div>

      <div class="card home_images thrid_images" style="width: 18rem;">
        <img src="/slider/img1.jpg" class="card-img-top" alt="...">
      </div>
    </div>
  </div>
</div> 
</div>





@stop