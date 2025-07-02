<?php

namespace App\Http\Controllers;

use App\Models\PenarikanDana;
use Illuminate\Http\Request;
use PDF; // untuk export PDF, nanti install package dompdf

class PenarikanDanaController extends Controller
{
    public function dashboard()
    {
        $totalTransactions = PenarikanDana::count();
        $totalAmount = PenarikanDana::sum('jumlah');
        $recentTransactions = PenarikanDana::orderBy('tanggal', 'desc')->limit(5)->get();

        return view('dashboard', compact('totalTransactions', 'totalAmount', 'recentTransactions'));
    }

    public function index()
    {
        $data = PenarikanDana::all();
        return view('penarikan_dana.index', compact('data'));
    }

    public function create()
    {
        return view('penarikan_dana.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|unique:penarikan_dana,id_transaksi',
            'nama_pengguna' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'bank' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        PenarikanDana::create($request->all());

        return redirect()->route('penarikan_dana.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = PenarikanDana::findOrFail($id);
        return view('penarikan_dana.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_transaksi' => 'required|unique:penarikan_dana,id_transaksi,'.$id.',id_transaksi',
            'nama_pengguna' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'bank' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $item = PenarikanDana::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('penarikan_dana.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = PenarikanDana::findOrFail($id);
        $item->delete();

        return redirect()->route('penarikan_dana.index')->with('success', 'Data berhasil dihapus');
    }

    public function exportPdf()
    {
        $data = PenarikanDana::all();
        $pdf = PDF::loadView('penarikan_dana.pdf', compact('data'));
        return $pdf->download('laporan_penarikan_dana.pdf');
    }
}
