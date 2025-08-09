@extends('layouts.app')

@section('content')

<button onclick="window.history.back()" class="btn btn-outline-secondary mb-3">
    <i class="bi bi-arrow-left"></i>
</button>


<div class="container py-4">
    <!-- Judul -->
    <div class="mb-4">
        <h2 class="fw-bold">📊 Dashboard</h2>
        <p class="text-muted">Selamat datang kembali, {{ Auth::user()->name }}! Berikut ringkasan data terbaru.</p>
    </div>

    <!-- Statistik Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $totalUsers ?? 0 }}</h5>
                        <small class="text-muted">Total Pengguna</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success text-white rounded-circle p-3 me-3">
                        <i class="bi bi-cart fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $totalOrders ?? 0 }}</h5>
                        <small class="text-muted">Total Pesanan</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-warning text-white rounded-circle p-3 me-3">
                        <i class="bi bi-cash-stack fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">Rp{{ number_format($totalIncome ?? 0) }}</h5>
                        <small class="text-muted">Pendapatan</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-danger text-white rounded-circle p-3 me-3">
                        <i class="bi bi-bar-chart-line fs-4"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $totalReports ?? 0 }}</h5>
                        <small class="text-muted">Laporan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('produk.index') }}" class="btn btn-primary">Kelola Pengguna</a>
    <a href="{{ route('produk.index') }}" class="btn btn-success">Kelola Produk</a>

<div class="container">
    <h2 class="mb-4">Kelola Produk Sparepart Motor Vario</h2>

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr class="text-center">
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $produk)
                <tr>
                    <td>
    @if($produk->gambar)
        <img src="{{ asset($produk->gambar) }}" 
             alt="{{ $produk->nama }}" 
             style="width: 80px; cursor: pointer;" 
             onclick="showImage('{{ asset($produk->gambar) }}')">
    @else
        Tidak ada gambar
    @endif
</td>

                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->deskripsi }}</td>
                    <td class="text-center">{{ $produk->stok }}</td>
                    <td>Rp{{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus produk ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada produk</td>
                </tr>
                @endforelse
            </tbody>
        </table>

<!-- Modal Popup -->
<div id="imageModal" 
     style="display:none; position: fixed; top:0; left:0; width:100%; height:100%; 
            background: rgba(0,0,0,0.7); justify-content:center; align-items:center; z-index:999;">
    
    <div style="position: relative; background: #fff; padding: 15px; border-radius: 8px; display: inline-block; text-align: center; max-width: 90%; max-height: 90%; overflow: auto;">
        
        <!-- Tombol X -->
        <span onclick="closeImage()" 
              style="position: absolute; top:5px; right:10px; cursor:pointer; font-size: 24px;">&times;</span>
        
        <!-- Gambar -->
        <img id="modalImage" 
             src="" 
             style="max-width: 100%; max-height: 70vh; height: auto; border-radius: 5px; margin-bottom: 15px;">
        
        <!-- Tombol -->
        <div>
            <a id="downloadLink" href="#" download class="btn btn-primary">Download</a>
            <button onclick="closeImage()" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>


    </div>
</div>
<script>
function showImage(src) {
    document.getElementById('modalImage').src = src;
    document.getElementById('downloadLink').href = src;
    document.getElementById('imageModal').style.display = 'flex';
}

function closeImage() {
    document.getElementById('imageModal').style.display = 'none';
}
</script>


@endsection
