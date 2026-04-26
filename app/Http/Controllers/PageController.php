<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
{
    $username = $request->username;
    $password = $request->password;

    if ($username === 'admin' && $password === 'admin123') {
        session(['username' => $username]);
        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Username atau Password salah!');
}

public function showDashboard()
{
    $username = session('username', 'admin');

    if (!session()->has('menus')) {
        session(['menus' => $this->getDefaultMenus()]);
    }

    $menus = session('menus', []);

    $stats = [
        ['label' => 'Total Menu', 'value' => count($menus)],
        ['label' => 'Best Seller', 'value' => 'Long Black Classic'],
        ['label' => 'Stok Tersedia', 'value' => array_sum(array_column($menus, 'stok'))],
    ];

    $lowStock = array_filter($menus, function ($menu) {
        return $menu['stok'] <= 5;
    });

    $latestMenus = array_slice(array_reverse($menus), 0, 3);

    return view('dashboard', compact('username', 'stats', 'lowStock', 'latestMenus'));
}

    public function profile(Request $request)
    {
        $username = $request->username ?? session('username', 'admin');

        $profile = [
            'nama' => $username,
            'role' => 'Admin Coffee Shop',
            'email' => strtolower(str_replace(' ', '', $username)) . '@longblack.com',
            'telepon' => '0812-3456-7890',
        ];

        return view('profile', compact('username', 'profile'));
    }

    private function getDefaultMenus()
    {
        return [
            ['id' => 1, 'nama' => 'Long Black Classic', 'kategori' => 'Coffee', 'harga' => 'Rp24.000', 'stok' => 25, 'status' => 'Tersedia'],
            ['id' => 2, 'nama' => 'Caramel Latte', 'kategori' => 'Milk Based', 'harga' => 'Rp29.000', 'stok' => 18, 'status' => 'Tersedia'],
            ['id' => 3, 'nama' => 'Black Velvet', 'kategori' => 'Signature', 'harga' => 'Rp32.000', 'stok' => 10, 'status' => 'Terbatas'],
            ['id' => 4, 'nama' => 'Mocha Midnight', 'kategori' => 'Signature', 'harga' => 'Rp31.000', 'stok' => 0, 'status' => 'Habis'],
        ];
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->username ?? session('username', 'admin');

        if (!session()->has('menus')) {
            session(['menus' => $this->getDefaultMenus()]);
        }

        $menus = session('menus');

        return view('pengelolaan', compact('username', 'menus'));
    }

    public function tambahProduk(Request $request)
    {
        $menus = session('menus', $this->getDefaultMenus());

        $newId = count($menus) > 0 ? max(array_column($menus, 'id')) + 1 : 1;

        $stok = (int) $request->stok;
        $status = $stok <= 0 ? 'Habis' : ($stok <= 10 ? 'Terbatas' : 'Tersedia');

        $menus[] = [
            'id' => $newId,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $stok,
            'status' => $status,
        ];

        session(['menus' => $menus]);

        return redirect()->route('pengelolaan');
    }

    public function editProduk(Request $request, $id)
    {
        $menus = session('menus', $this->getDefaultMenus());

        foreach ($menus as &$menu) {
            if ($menu['id'] == $id) {
                $stok = (int) $request->stok;
                $menu['nama'] = $request->nama;
                $menu['kategori'] = $request->kategori;
                $menu['harga'] = $request->harga;
                $menu['stok'] = $stok;
                $menu['status'] = $stok <= 0 ? 'Habis' : ($stok <= 10 ? 'Terbatas' : 'Tersedia');
            }
        }

        session(['menus' => $menus]);

        return redirect()->route('pengelolaan');
    }

    public function hapusProduk($id)
    {
        $menus = session('menus', $this->getDefaultMenus());

        $menus = array_values(array_filter($menus, function ($menu) use ($id) {
            return $menu['id'] != $id;
        }));

        session(['menus' => $menus]);

        return redirect()->route('pengelolaan');
    }

    public function tambahStok($id)
    {
        $menus = session('menus', $this->getDefaultMenus());

        foreach ($menus as &$menu) {
            if ($menu['id'] == $id) {
                $menu['stok'] += 1;
                $menu['status'] = $menu['stok'] <= 10 ? 'Terbatas' : 'Tersedia';
            }
        }

        session(['menus' => $menus]);

        return redirect()->route('pengelolaan');
    }

    public function kurangStok($id)
    {
        $menus = session('menus', $this->getDefaultMenus());

        foreach ($menus as &$menu) {
            if ($menu['id'] == $id) {
                if ($menu['stok'] > 0) {
                    $menu['stok'] -= 1;
                }

                $menu['status'] = $menu['stok'] <= 0 ? 'Habis' : ($menu['stok'] <= 10 ? 'Terbatas' : 'Tersedia');
            }
        }

        session(['menus' => $menus]);

        return redirect()->route('pengelolaan');
    }

    public function logout()
    {
    session()->flush(); // hapus semua session
    return redirect()->route('login');
    }
}