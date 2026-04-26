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

        <div class="form-card fade-up delay-2">
            <h2>Tambah Produk</h2>
            <form action="{{ route('pengelolaan.tambah') }}" method="POST" class="product-form">
                @csrf
                <input type="text" name="nama" placeholder="Nama produk" required>
                <input type="text" name="kategori" placeholder="Kategori" required>
                <input type="text" name="harga" placeholder="Harga, contoh Rp25.000" required>
                <input type="number" name="stok" placeholder="Stok" required>
                <button type="submit" class="btn">Tambah Produk</button>
            </form>
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
                            <td>
                                <div class="action-group">
                                    <form action="{{ route('pengelolaan.stok.tambah', $menu['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-small">+ Stok</button>
                                    </form>

                                    <form action="{{ route('pengelolaan.stok.kurang', $menu['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-small btn-outline">- Stok</button>
                                    </form>

                                    <details class="edit-dropdown">
                                        <summary class="btn-small">Edit</summary>
                                        <form action="{{ route('pengelolaan.edit', $menu['id']) }}" method="POST" class="edit-form">
                                            @csrf
                                            <input type="text" name="nama" value="{{ $menu['nama'] }}" required>
                                            <input type="text" name="kategori" value="{{ $menu['kategori'] }}" required>
                                            <input type="text" name="harga" value="{{ $menu['harga'] }}" required>
                                            <input type="number" name="stok" value="{{ $menu['stok'] }}" required>
                                            <button type="submit" class="btn-small">Simpan</button>
                                        </form>
                                    </details>

                                    <form action="{{ route('pengelolaan.hapus', $menu['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-small btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection