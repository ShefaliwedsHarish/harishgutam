@php
// $route=config('path.admin')
$route=env('APP_ENV') == 'live' ? config('live_path.admin') : config('path.admin');

@endphp
@extends('admin.layout.header')
@section('title')
  HSAdmin
@stop

@section('content')

<div class="show_table_details">

<div class="button_area"> 
    <button type="button" class="btn btn-dark action_button" data-bs-toggle="modal" data-bs-target="#add_service">
        <i class="bi bi-plus" style="font-size:20px;color:#fff" ></i> Add Service</button>
</div> 

<table class="table ">
    <thead class="table-dark">
      <tr>
        {{-- <th scope="col">Id</th> --}}
        <th scope="col">Service Name </th>
        <th scope="col">Description</th>
        <th scope="col">Consumption</th>
        <th scope="col">Profit</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>

    </thead>

    <tbody class="service_data">
        {{-- {{dd($service)}} --}}
    @if(isset($service))
    @foreach($service as $single_service)
      @php 
      $profit=$single_service->price ? $single_service->price->price-$single_service->price->total_price:0
      @endphp 
      <tr id="row_{{$single_service->id}}">
        {{-- <th scope="row">{{$single_service->id}}</th> --}}
        <td> {{$single_service->name}} </td>
        <td> {{$single_service->description}}  </td>
        <td> {{ $single_service->price ? $single_service->price->total_price : 0 }}</td>
        <td> {{ $profit }}</td>
        <td>  @if($single_service->status==1)
        <span class="badge rounded-pill text-bg-success">Active </span>
        @else 
        <span class="badge rounded-pill text-bg-danger">Inactive </span>
        @endif 
        </td> 
        <td> <i class="bi bi-pencil-square service_edit" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit_service" aria-controls="offcanvasRight" style="font-size:26px" data-eid={{$single_service->id}} data-ser="Service"></i>
            <i class="bi bi-eye-fill view_service" style="font-size:26px" data-vid={{$single_service->id}}></i>
             <i class="bi bi-trash delete_service" style="font-size:26px;color:#ff0000" data-did={{$single_service->id}} data-ser="Service"></i></td> 

      </tr>
      @endforeach
      @endif
     

      
    </tbody>
  </table>
</div> 






@stop

