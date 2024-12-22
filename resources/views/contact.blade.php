@extends('layout.header')

@section('title')
    Contact us
@stop

@section('content')

    <body>
        @include('layout.first_section')
        @php 
        // $route=config('path.assets')
        $route = env('APP_ENV') == 'live' ? config('live_path.assets') : config('path.assets');
        @endphp
         
        <section>
                    <div class="row">
                    <div class="col-sm-12 col-lg-6 col-xl-6">
                     <div class="hs_heading">
                         <h6> Contact Us </h6>
                         <h1> Fast, friendly, and reliable support - that's what we're all about! </h1> 
                         <p> We would love to hear from you! If you have any questions, comments, or feedback, please don’t hesitate to get in touch with us.</p>
                         <p> If you need immediate assistance with an order, please contact us directly at our WhatsApp number 77009-47009</p>
                         <p>Thank you for using HSGroup. We hope to hear from you soon!</p>
                         <img src="{{$route}}/contact.png">
                     </div>
                        
                      

                    </div>
                    <div class="col-sm-12 col-lg-6 col-xl-6 ">                    
                      <div class="hs_form_part">
                        <div class="hs_contact_part">
                            <form style="width: 26rem;">
                                <!-- Name input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form4Example1" class="form-control" />
                                    <label class="form-label" for="form4Example1">Name</label>
                                </div>

                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form4Example2" class="form-control" />
                                    <label class="form-label" for="form4Example2">Phone number</label>
                                </div>

                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="form4Example2" class="form-control" />
                                    <label class="form-label" for="form4Example2">Email address</label>
                                </div>

                                <!-- Message input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                                    <label class="form-label" for="form4Example3">Message</label>
                                </div>

                                <!-- Submit button -->
                                <button data-mdb-ripple-init type="button"
                                    class="btn btn-primary btn-block mb-4">Send</button>
                            </form>
                       
                        </div>
                      </div> 
                    </div>
                </div>
  
        </section>



        </div>
    </body>
@stop
