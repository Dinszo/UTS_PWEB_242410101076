@extends('layouts.app')

@section('title', 'Dashboard - Long Black')

@section('navbar', true)
@section('footer', true)

@section('content')


<div class="dashboard-content fade-page">

    <div class="dashboard-header fade-up delay-1">
        <h1>Dashboard</h1>
        <p>Ringkasan pengelolaan Long Black Coffee Shop.</p>
    </div>

    <div class="stats-grid fade-up delay-2">
        @foreach ($stats as $item)
            <div class="stat-card">
                <h3>{{ $item['value'] }}</h3>
                <p>{{ $item['label'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="dashboard-bottom-grid fade-up delay-3">
    <div class="dashboard-section small-section">
        <div class="section-title-row">
            <h2>Menu Terbaru</h2>
        </div>

        <div class="simple-list">
            @if(count($latestMenus) > 0)
                @foreach ($latestMenus as $item)
                    <div class="simple-list-item">
                        <span>{{ $item['nama'] }}</span>
                        <small>{{ $item['kategori'] }}</small>
                    </div>
                @endforeach
            @else
                <p>Belum ada menu terbaru.</p>
            @endif
        </div>
    </div>

    <div class="dashboard-section small-section">
        <div class="section-title-row">
            <h2>Stok Menipis</h2>
        </div>

        <div class="simple-list">
            @if(count($lowStock) > 0)
                @foreach ($lowStock as $item)
                    <div class="simple-list-item stock-warning">
                        <span>{{ $item['nama'] }}</span>
                        <small>Sisa stok: {{ $item['stok'] }}</small>
                    </div>
                @endforeach
            @else
                <p>Semua stok aman.</p>
            @endif
        </div>
    </div>
</div>
@endsection