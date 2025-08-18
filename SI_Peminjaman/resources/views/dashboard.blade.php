@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"><i class="fa fa-home"></i> Dashboard</h2>
    <p>Selamat datang kembali, <b>HADI SLIBAW</b>!</p>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Pengguna</h5>
                <p class="display-6">50</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Pesanan</h5>
                <p class="display-6">120</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>Total Produk</h5>
                <p class="display-6">30</p>
            </div>
        </div>
    </div>

    <div class="card p-3 shadow-sm">
        <h5><i class="fa fa-list"></i> Aktivitas Terbaru</h5>
        <ul>
            <li><b>User Ani</b> baru mendaftar</li>
            <li>Pesanan <b>#123</b> berhasil diproses</li>
            <li>Produk <b>Laptop</b> ditambahkan ke katalog</li>
        </ul>
    </div>
</div>
@endsection
