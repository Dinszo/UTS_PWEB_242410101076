@extends('layouts.app')

@section('title', 'Profile - Long Black')

@section('navbar', true)
@section('footer', true)

@section('content')


<section class="profile-section fade-page">
    <div class="profile-card fade-up delay-2">
        <div class="profile-avatar fade-up delay-3">
            <img src="{{ asset('images/iconprofile.jpg') }}" alt="avatar">
        </div>

        <h2>Admin Profile</h2>
        <p>Informasi akun admin Long Black</p>

        <div class="profile-info">
            <div class="info-item">
                <span>Nama</span>
                <strong>{{ $profile['nama'] }}</strong>
            </div>

            <div class="info-item">
                <span>Email</span>
                <strong>{{ $profile['email'] }}</strong>
            </div>

            <div class="info-item">
                <span>Role</span>
                <strong>{{ $profile['role'] }}</strong>
            </div>

            <div class="info-item">
                <span>Telepon</span>
                <strong>{{ $profile['telepon'] }}</strong>
            </div>
        </div>

        <div class="logout-section">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</section>

@endsection