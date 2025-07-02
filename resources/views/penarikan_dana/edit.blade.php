@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Penarikan Dana</h2>
    <form action="{{ route('penarikan_dana.update', $item->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_transaksi" class="form-label">ID Transaksi</label>
            <input type="text" class="form-control @error('id_transaksi') is-invalid @enderror" id="id_transaksi" name="id_transaksi" value="{{ old('id_transaksi', $item->id_transaksi) }}" required>
            @error('id_transaksi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" id="nama_pengguna" name="nama_pengguna" value="{{ old('nama_pengguna', $item->nama_pengguna) }}" required>
            @error('nama_pengguna')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" step="0.01" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah', $item->jumlah) }}" required>
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bank" class="form-label">Bank</label>
            <input type="text" class="form-control @error('bank') is-invalid @enderror" id="bank" name="bank" value="{{ old('bank', $item->bank) }}" required>
            @error('bank')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $item->tanggal->format('Y-m-d')) }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('penarikan_dana.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
