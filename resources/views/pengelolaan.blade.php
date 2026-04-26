@extends('layouts.app')

@section('title', 'Pengelolaan - Long Black')

@section('navbar', true)
@section('footer', true)

@section('content')


<section class="page-section fade-page">
    <div class="container">

        <div class="section-header fade-up delay-1">
            <h1>Kelola Produk</h1>
            <p>Halo, admin. Berikut data produk cafe Long Black yang dapat kamu kelola.</p>
        </div>


        <div class="table-wrapper fade-up delay-3">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $index => $menu)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $menu['nama'] }}</td>
                            <td>{{ $menu['kategori'] }}</td>
                            <td>{{ $menu['harga'] }}</td>
                            <td>{{ $menu['stok'] }}</td>
                            <td>{{ $menu['status'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection