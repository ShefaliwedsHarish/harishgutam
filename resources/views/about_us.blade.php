
@extends('layout.header')

@section('title')
  About us
@stop

@section('content')
<body> 
  {{-- first section with images and color  --}}
  @include('layout.first_section')
    

  {{-- second section --}}
 <section class="hs_peragraph">  
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-sm-12 col-lg-6 col-xl-6">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium autem voluptate quod fugiat vitae error, dicta modi quasi accusamus sint sunt nostrum odit amet id cupiditate voluptates aperiam aliquam velit.
      </div>
      <div class="col-sm-12 col-lg-6 col-xl-6 hs_images ">
        <img src="https://media.istockphoto.com/id/1339686801/photo/cloud-computing.webp?s=2048x2048&w=is&k=20&c=NKi1-84KT0XpLKfN1-a6XX7Lp_mS54yz6n8KIrkCrko=">
      </div>
     </div>
  </div>
 </section>

 <section class="hs_peragraph">  
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-sm-12 col-lg-6 col-xl-6 hs_images ">
        <img src="https://media.istockphoto.com/id/1339686801/photo/cloud-computing.webp?s=2048x2048&w=is&k=20&c=NKi1-84KT0XpLKfN1-a6XX7Lp_mS54yz6n8KIrkCrko=">
      </div>
      
      <div class="col-sm-12 col-lg-6 col-xl-6">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium autem voluptate quod fugiat vitae error, dicta modi quasi accusamus sint sunt nostrum odit amet id cupiditate voluptates aperiam aliquam velit.
      </div>
      </div>
  </div>
 </section>

 <section class="hs_peragraph">  
  <div class="container text-center">
    <div class="row align-items-center">
      <div class="col-sm-12 col-lg-6 col-xl-6">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium autem voluptate quod fugiat vitae error, dicta modi quasi accusamus sint sunt nostrum odit amet id cupiditate voluptates aperiam aliquam velit.
      </div>
      <div class="col-sm-12 col-lg-6 col-xl-6 hs_images ">
        <img src="https://media.istockphoto.com/id/1339686801/photo/cloud-computing.webp?s=2048x2048&w=is&k=20&c=NKi1-84KT0XpLKfN1-a6XX7Lp_mS54yz6n8KIrkCrko=">
      </div>
     </div>
  </div>
 </section>

</div>
</body>
@stop