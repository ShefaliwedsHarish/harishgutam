@php
    $route = env('APP_ENV') == 'live' ? config('live_path.admin') : config('path.admin');
 @endphp

@extends('admin.layout.header')
@section('title')
  HSAdmin
@stop

@php 
// $config=config('path.craousal');

$config = env('APP_ENV') == 'live' ? config('live_path.craousal') : config('path.craousal');

@endphp 
@section('content')

<style> 
img.card-img-top {
    /* margin-top: 43px; */
    height: 331px;
}

.col {
    margin-top: 10px;
}
.delete_slider {

    margin-left: 251px;
    border: none;
    position: absolute;


}
</style>


<div class="show_table_details">
<div class="button_area">    
 
    <button type="button" class="btn btn-dark action_button" data-bs-toggle="modal" data-bs-target="#add_image"><i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Image</button>
</div> 

<table class="table ">
    <thead class="table-dark">
      <tr>
        <th scope="col " style="text-align:center;">Slider Images</th>
        </tr>
    </thead> 
  </table>

            <div class="hs_slierpart">

            <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="{{$config}}img1.jpg" class="card-img-top" alt="...">
                              <button class="delete_slider">
                                <i class="bi bi-trash image_detete" style="font-size:26px;color:#ff0000" data-did="1" data-ser="Slider"></i>
                                <i class="bi bi-eye-fill view_images" style="font-size:26px" data-vid="1"></i>
                            </button>
                            </div>
                          
                        </div>
                       

                        <div class="col ">
                            <div class="card" style="width: 18rem;">
                                    <img src="{{$config}}img2.jpg" class="card-img-top" alt="...">
                                    <button class="delete_slider">
                                    <i class="bi bi-trash image_detete" style="font-size:26px;color:#ff0000" data-did="1" data-ser="Slider"></i>
                                    <i class="bi bi-eye-fill view_images" style="font-size:26px" data-vid="1"></i>
                                 </button>
                                </div>
                               </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                    <img src="{{$config}}img3.jpg" class="card-img-top" alt="...">
                                    <button class="delete_slider">
                                    <i class="bi bi-trash image_detete" style="font-size:26px;color:#ff0000" data-did="1" data-ser="Slider"></i>
                                <i class="bi bi-eye-fill view_images" style="font-size:26px" data-vid="1"></i>
   
                              </button>
                            </div>
                           </div>

                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="{{$config}}img4.jpg" class="card-img-top" alt="...">
                                <button class="delete_slider">
                                <i class="bi bi-trash" style="font-size:26px;color:#ff0000" data-did="1" data-ser="Service"></i>
                              </button>
                            </div>
                           </div>
                        <div class="col ">
                            <div class="card" style="width: 18rem;">
                                    <img src="{{$config}}img5.jpg" class="card-img-top" alt="...">
                                    <button class="delete_slider">
                                    <i class="bi bi-trash image_detete" style="font-size:26px;color:#ff0000" data-did="1" data-ser="Slider"></i>
                                <i class="bi bi-eye-fill view_images" style="font-size:26px" data-vid="1"></i>
                 </button>
                                </div>
                               </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                    <img src="{{$config}}img6.jpg" class="card-img-top" alt="...">
                                    <button class="delete_slider">
                                    <i class="bi bi-trash image_detete" style="font-size:26px;color:#ff0000" data-did="1" data-ser="Slider"></i>
                                <i class="bi bi-eye-fill view_images" style="font-size:26px" data-vid="1"></i>
                           </button>
                            </div>

                            </div>
                    </div>
            </div>      
            </div> 
</div> 



@stop

