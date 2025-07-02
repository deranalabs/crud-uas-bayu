@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi bi-graph-up-arrow"></i>
                    Total Transaksi
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalTransactions ?? 0 }}</h5>
                    <p class="card-text">Jumlah total transaksi penarikan dana.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi bi-cash-stack"></i>
                    Total Jumlah
                </div>
                <div class="card-body">
                    <h5 class="card-title">Rp {{ number_format($totalAmount ?? 0, 2, ',', '.') }}</h5>
                    <p class="card-text">Total nominal penarikan dana.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header d-flex align-items-center gap-2">
                    <i class="bi bi-clock-history"></i>
                    Transaksi Terbaru
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $recentTransactions->count() ?? 0 }}</h5>
                    <p class="card-text">Jumlah transaksi terbaru.</p>
                </div>
            </div>
        </div>
    </div>

    <h3>5 Transaksi Terbaru</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Pengguna</th>
                <th>Jumlah</th>
                <th>Bank</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentTransactions as $item)
            <tr>
                <td>{{ $item->id_transaksi }}</td>
                <td>{{ $item->nama_pengguna }}</td>
                <td>Rp {{ number_format($item->jumlah, 2, ',', '.') }}</td>
                <td>{{ $item->bank }}</td>
                <td>{{ $item->tanggal->format('d-m-Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada transaksi terbaru.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
