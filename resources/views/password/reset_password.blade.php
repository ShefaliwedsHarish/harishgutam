@php
$route=config('path.admin')

@endphp
@extends('layout.header')
@section('title')
Reset Password
@stop

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .reset-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .reset-form h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .reset-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .reset-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .reset-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .reset-form button:hover {
            background-color: #45a049;
        }
        footer.bg-body-tertiary.text-center.text-lg-start {
            display: none;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: #fff;
            padding: 20px 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            color: #e74c3c;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .container p {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>



  @if(isset($user))


  
  <form class="reset-form" action="{{ route('password.reset_password') }}" method="POST">
        @csrf 
        <h2>Reset Password</h2>
        <label for="new-password">New Password</label>
        <input type="password" id="new-password" name="hs_password" required>
        @if($errors->has('hs_password'))
              <div class="error_forgot">{{ $errors->first('hs_password') }}</div>
        @endif
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="hs_confirmpassword" required>
        @if($errors->has('hs_confirmpassword'))
            <div class="error_forgot">{{ $errors->first('hs_confirmpassword') }}</div>
        @endif
        <input type="hidden" id="confirm-password" name="user_id" value="{{$user->id}}">
        <input type="hidden" id="confirm-password" name="user_token" value="{{$token}}">
        <button type="submit">Reset Password</button>
    </form>
    @elseif(isset($expire))
    <body>
        <div class="container">
            <h1>🚫 Expired Link</h1>
            <p>The link you used has expired. Please request a password reset again.</p>
            <p>If you continue to face issues, feel free to contact our support team.</p>
            <a href="#" class="btn">Contact Support</a>
        </div>
        
    </body>
    @elseif(isset($success))
    <body>
        <div class="container">
            <h1>✅ Password Successfully Changed</h1>
            <p>Your password has been changed. Please log in again.</p>
        </div>
    </body>
    @else
    <body>
        <div class="container">
            <h1>🚫 Access Denied</h1>
            <p>You do not have permission to access this link.</p>
            <p>Please verify the link or try again. If the issue persists, click below to contact support.</p>
            <a href="#" class="btn">Contact Support</a>
        </div>
    </body>
    {{-- <dialog open><span class="no_permission"> You have no permission to access<br>  account kinldy check link </span></dialog> --}}
 
  @endif



@stop
