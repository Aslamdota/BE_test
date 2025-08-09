@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
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

    <a href="{{ route('users.index') }}" class="btn btn-primary">Kelola Pengguna</a>
    <a href="{{ route('produk.index') }}" class="btn btn-success">Kelola Produk</a>


    <!-- Chart dan Tabel -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3">Grafik Penjualan</h5>
                <canvas id="salesChart" height="150"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3">Ringkasan Pesanan</h5>
                <ul class="list-group list-group-flush">
                    @foreach($latestOrders ?? [] as $order)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $order->product_name }}</span>
                            <span class="badge bg-primary">Rp{{ number_format($order->total) }}</span>
                        </li>
                    @endforeach
                    @if(empty($latestOrders))
                        <li class="list-group-item text-muted">Belum ada pesanan terbaru</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($chartLabels ?? []) !!},
        datasets: [{
            label: 'Penjualan',
            data: {!! json_encode($chartData ?? []) !!},
            borderColor: '#0d6efd',
            backgroundColor: 'rgba(13,110,253,0.1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true }
        }
    }
});
</script>
@endsection
