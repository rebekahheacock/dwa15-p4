@extends('layouts.master')

@section('title', 'Join Summitteer today.')

@section('content')

    <div class="centerbox">
        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method='POST' action='/register'>
            {!! csrf_field() !!}

            <div class='form-group'>
                <label for='username'>User Name*</label>
                <input type='text' class='form-control' name='username' id='username' value='{{ old('username') }}'>
            </div>

            <div class='form-group'>
                <label for='first_name'>First Name</label>
                <input type='text' class='form-control' name='first_name' id='first_name' value='{{ old('first_name') }}'>
            </div>

            <div class='form-group'>
                <label for='last_name'>Last Name</label>
                <input type='text' class='form-control' name='last_name' id='last_name' value='{{ old('last_name') }}'>
            </div>

            <div class='form-group'>
                <label for='email'>Email*</label>
                <input type='text' class='form-control' name='email' id='email' value='{{ old('email') }}'>
            </div>

            <div class='form-group'>
                <label for='password'>Password*</label>
                <input type='password' class='form-control' name='password' id='password'>
            </div>

            <div class='form-group'>
                <label for='password_confirmation'>Confirm Password*</label>
                <input type='password' class='form-control' name='password_confirmation' id='password_confirmation'>
            </div>

            <button type='submit' class='btn btn-primary'>Register</button>

        </form>

        <p>Have an account? <a href='login'>Log in &raquo;</a></p>

    </div>

@stop