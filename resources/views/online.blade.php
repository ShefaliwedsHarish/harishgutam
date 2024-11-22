@extends('layout.header')

@section('title', 'Online Service')

@section('content')
<head>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; color: #333; }
        .container { max-width: 1000px; margin: auto; padding: 20px; }
        .header { text-align: center; padding: 10px; background-color: #007bff; color: white; }
        .service-card { background: #fff; padding: 15px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top: 20px; }
        .service-card h2 { color: #007bff; }
        .contact { margin-top: 30px; text-align: center; }
    </style>
</head>
<div class="header">
    <h1>Online Service</h1>
    <p>Your e-filing Partner</p>
</div>

<div class="container">
    <h2>Our Services</h2>

    @foreach($services as $key=>$service)
    
        <div class="service-card">
            <h2>{{ $service['name'] }}</h2>
            @isset($service['description'])
                <p>{{ $service['description'] }}</p>
            @endisset

            @isset($service['link_url1'])
                <a href="{{ $service['link_url1'] }}" class="btn btn-primary">{{ $service['link_text1'] }}</a>
            @endisset

            @isset($service['link_url2'])
                <a href="{{ $service['link_url2'] }}" class="btn btn-primary">Get Started</a>
            @endisset
        </div>
    @endforeach

    <div class="contact">
        <button type="button" class="btn btn-link">Contact Us</button>
    </div>
</div>
@endsection
