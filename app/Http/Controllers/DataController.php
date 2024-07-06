<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DataController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel datas
        $data = Data::all();
        $total_kasus = $data->sum('jumlah_kasus');

        // Hitung Persentase
        $data = $data->map(function ($item) use ($total_kasus) {
            $item->persentase = $total_kasus > 0 ? ($item->jumlah_kasus / $total_kasus) * 100 : 0;
            return $item;
        });
        
        // Mengirim data ke view
        return view('welcome', compact('data'));
    }

    public function superadminindex(){
        // Mengambil semua data dari tabel datas
        $data = Data::all();
        $total_kasus = $data->sum('jumlah_kasus');

        // Hitung Persentase
        $data = $data->map(function ($item) use ($total_kasus) {
            $item->persentase = $total_kasus > 0 ? ($item->jumlah_kasus / $total_kasus) * 100 : 0;
            return $item;
        });
        
        // Mengirim data ke view
        return view('data.index', compact('data'));
    }

    public function show($id)
    {
        // Mengambil data dari tabel datas berdasarkan ID
        $data = Data::findOrFail($id);

        return view('data.detail', compact('data'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data baru
        return view('data.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'kecamatan' => 'required|string',
            'jumlah_kasus' => 'required|integer',
            'info' => 'nullable|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        // Simpan data baru ke dalam tabel datas
        Data::create([
            'kecamatan' => $request->kecamatan,
            'jumlah_kasus' => $request->jumlah_kasus,
            'info' => $request->info,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('data.superadminindex')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Mengambil data dari tabel datas berdasarkan ID untuk diedit
        $data = Data::findOrFail($id);

        return view('data.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dari form
        $request->validate([
            'kecamatan' => 'required|string',
            'jumlah_kasus' => 'required|integer',
            'info' => 'nullable|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        // Update data yang ada dalam tabel datas berdasarkan ID
        $data = Data::findOrFail($id);
        $data->update([
            'kecamatan' => $request->kecamatan,
            'jumlah_kasus' => $request->jumlah_kasus,
            'info' => $request->info,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('data.superadminindex')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data dari tabel datas berdasarkan ID
        $data = Data::findOrFail($id);
        $data->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('data.superadminindex')
            ->with('success', 'Data berhasil dihapus.');
    }
}
