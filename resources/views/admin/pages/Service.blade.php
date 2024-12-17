@php
$route=config('path.admin')

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
        <th scope="col">Id</th>
        <th scope="col">Service Name </th>
        <th scope="col">Description</th>
        <th scope="col">Consumption</th>
        <th scope="col">Profit</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>

    </thead>

    <tbody>
        {{-- {{dd($service)}} --}}
    @if(isset($service))
    @foreach($service as $single_service)
      <tr>
        <th scope="row">{{$single_service->id}}</th>
        <td> {{$single_service->name}} </td>
        <td> {{$single_service->description}}  </td>
        <td>700</td>
        <td>50</td>
        <td>  <span class="badge rounded-pill text-bg-success">Active </span></td> 
        <td> <i class="bi bi-pencil-square" style="font-size:26px" data-id={{$single_service->id}}></i>
            <i class="bi bi-eye-fill" style="font-size:26px"></i>
             <i class="bi bi-trash" style="font-size:26px;color:#ff0000"></i></td> 

      </tr>
      @endforeach
      @endif
     

      
    </tbody>
  </table>
</div> 



@stop

