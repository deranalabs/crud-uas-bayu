@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Penarikan Dana</h2>
    <a href="{{ route('penarikan_dana.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <a href="{{ route('penarikan_dana.export_pdf') }}" class="btn btn-danger mb-3">Export PDF</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Pengguna</th>
                <th>Jumlah</th>
                <th>Bank</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->id_transaksi }}</td>
                <td>{{ $item->nama_pengguna }}</td>
                <td>{{ number_format($item->jumlah, 2, ',', '.') }}</td>
                <td>{{ $item->bank }}</td>
                <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('penarikan_dana.edit', $item->id_transaksi) }}" class="btn btn-sm btn-success">Edit</a>
                    <form action="{{ route('penarikan_dana.destroy', $item->id_transaksi) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@endsection
