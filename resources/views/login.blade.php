@extends('layouts.app')

@section('title', 'Login Admin - Long Black')
@if(session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif
@section('content')
<section class="login-page fade-page">
    <div class="login-box fade-up delay-1">

        <div class="login-box-left">
            <img src="{{ asset('images/bglogin.jpg') }}">
        </div>

        <div class="login-box-right">
            <div class="login-form-wrapper fade-up delay-2">

                <div class="login-logo">
                    <img src="{{ asset('images/logoweb.png') }}">
                </div>


                <h2>Admin Login</h2>
                <p>Masuk untuk mengelola website Long Black</p>

                <form action="{{ route('login.process') }}" method="POST" class="login-form" autocomplete="off">
                     @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
                    </div>

                    <div class="form-group password-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Masukkan password" required autocomplete="new-password">
                            <button type="button" class="toggle-password" id="togglePassword">Lihat</button>
                        </div>
                    </div>

                    <button type="submit" class="login-btn">Log In</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection