<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GloballyController extends Controller
{

 
    public function service_form($data){
 
        $profit=$data->price ? $data->price->price-$data->price->total_price:0;
        $html = '
      
            <div class="mb-3">
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="edit_service_name" value="' . htmlspecialchars($data->name) . '" name="edit_service_name">
            </div>
            <div class="alert alert-danger" id="service_name-error"></div>
        
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" id="edit_department" value="' . htmlspecialchars($data->depart) . '" name="edit_department">
            </div>
            <div class="alert alert-danger" id="department-error"></div>
        
             <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="edit_description" rows="3" name="edit_description">' . htmlspecialchars($data->description) . '</textarea>
            </div>   

             <div class="mb-3">
                <label for="description" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="edit_totalprice" value="' . htmlspecialchars($data->price ? $data->price->price:0) . '" name="edit_totalprice">
             </div>   

             <div class="mb-3">
                <label for="description" class="form-label">Amount pay by Company</label>
                <input type="text" class="form-control" id="edit_apc" value="' . htmlspecialchars($data->price ? $data->price->total_price :0) . '" name="edit_apc">
            </div>   

            <div class="mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="edit_status" name="edit_status" ' . ($data->status ? 'checked' : '') . '>
                    <label class="form-check-label" for="edit_status">Status</label>
                </div>
            </div>                    
            <input type="submit" class="btn btn-primary" value="Edit">
       ';

        return $html;
    }
}
