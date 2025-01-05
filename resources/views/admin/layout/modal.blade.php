   <!------------- Add Price Modal this is  ---------------->
   



   <div class="modal fade" id="add_price" tabindex="-1" aria-labelledby="add_price_data" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="add_price_data">Add Price</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
         <form id="save_service_price"> 
             <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Service</label>
                        <select class="form-select" aria-label="Default select example" name="service_id">
                            <option selected>Open this select menu</option>
                           @if(isset($service)) 
                            @foreach($service as $service_value)
                            <option value="{{$service_value->id}}">{{$service_value->name}}</option>
                            @endforeach
                           @endif
                        </select>
                    </div> 

                    <div class="alert alert-danger" id="service_id-error">                                                                
                    </div>

                    <div class="form-group">
                        <label for="total_lebalinput">Total Price</label>
                        <input type="number" class="form-control" id="total_price" aria-describedby="price" placeholder="Total price" name="total_price">
                    </div>

                    <div class="alert alert-danger" id="total_price-error">                                               
                    </div>
                    <div class="form-group">
                        <label for="profit_lebalinput">Amount pay by Company</label>
                        <input type="number" class="form-control" id="Amount pay by company" placeholder="" name="apc">
                    </div>
                    <div class="alert alert-danger" id="apc-error">                                                 
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add </button> 
               </div>
        </form> 
      </div>
    </div>
  </div>
   

     <!------------- Add Request Modal ---------------->

     <div class="modal fade" id="add_request" tabindex="-1" aria-labelledby="add_price_data" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="add_price_data">Add Request</h1>
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
    


        <!------------- Add Service Modal ---------------->

     <div class="modal fade" id="add_service" tabindex="-1" aria-labelledby="add_price_data" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="add_price_data">Add Service</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
               <form id="service_submit"> 
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="service_name" class="form-label">Service Name</label>
                                <input type="text" class="form-control" id="service_name" placeholder="service name" name="service_name">
                              </div>
                              <div class="alert alert-danger" id="service_name-error">
                                                                  
                              </div>

                              <div class="mb-3">
                                <label for="department" class="form-label">Department </label>
                                <input type="text" class="form-control" id="department" placeholder="Department" name="department">
                              </div>
                              <div class="alert alert-danger" id="department-error">
                                                                  
                              </div>

                              <div class="mb-3">
                                <label for="description" class="form-label">Description </label>
                                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                              </div>    

                              <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="Status" name="status">
                                    <label class="form-check-label" for="Status">Status</label>
                                  </div>
                              </div> 
                    
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add </button>
                        </div>
              </form>
          </div>
        </div>
      </div>

 
      <!------------- Add  View Service offcanvas ---------------->


      <div class="offcanvas offcanvas-end" tabindex="-1" id="edit_service" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasRightLabel">Edit Service</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
                   
           <form id="edit_service_submit">
           <div id="edit_area">

           </div>
           </form> 
        </div>
      </div>