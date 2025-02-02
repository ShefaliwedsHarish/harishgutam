<style> 
#banner {
    background: linear-gradient(to right, #c19b81c7, #d56624ab, #f76a0854), url(/booking/slide2.png);
    background-position: right;
    background-size: contain;
    background-repeat: no-repeat;
}

.section-padding {
    padding: 60px 0;
    height:225px;
  }
  body.booking_body {
     background-color: #ff6c061a;
}
.section-title {
    margin-left: 45%;
    margin-top: 16px;
    font-style: italic;
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body class="booking_body">
<section id="banner" class="section-padding">    
</section>

      <section id="form_part" class="form_part_section">   
                              <div class="section-title">
                                  <h2 class="title"><span class="base-color">Fill Your </span>Details</h2>
                              </div> 

                      <div class="container">
                        <div class="row">
                          <div class="col-6">
                             <div class="form_part">
                             <form>
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Email address</label>
                                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                             </form>
                          </div>
                          <div class="col-6">
                          </div>
                        </div>
                      </div> 
      </section>
  </body>