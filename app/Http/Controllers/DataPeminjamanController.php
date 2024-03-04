<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPeminjaman;

class DataPeminjamanController extends Controller
{


    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'data_barang_id' => 'required|exists:data_barang,id',
        ]);
    
        $peminjaman = DataPeminjaman::create($data);
    
        // Mengambil informasi barang berdasarkan ID yang dipinjam
        $barang = $peminjaman->barang;
    
        // Membuat array respons dengan informasi yang diminta
        $response = [
            'nama' => $peminjaman->nama,
            'kelas' => $peminjaman->kelas,
            'nama_barang' => $barang->nama_barang,
            'merek' => $barang->merek,
            'ruang' => $barang->ruang,
            'status' => 'Dipinjam'
        ];
    
        return response()->json(['message' => 'Data peminjaman berhasil ditambahkan', 'data' => $response], 201);
    }


    public function update(Request $request, $id)
    {
        $peminjaman = DataPeminjaman::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'data_barang_id' => 'required|exists:data_barang,id',
        ]);

        $peminjaman->update($data);

        // Mengambil informasi barang berdasarkan ID yang dipinjam
        $barang = $peminjaman->barang;

        // Membuat array respons dengan informasi yang diminta
        $response = [
            'nama' => $peminjaman->nama,
            'kelas' => $peminjaman->kelas,
            'nama_barang' => $barang->nama_barang,
            'merek' => $barang->merek,
            'ruang' => $barang->ruang,
            'status' => 'Dipinjam'
        ];

        return response()->json(['message' => 'Data peminjaman berhasil diupdate', 'data' => $response], 200);
    }

    public function destroy($id)
    {
        $peminjaman = DataPeminjaman::findOrFail($id);
        $peminjaman->delete();

        return response()->json(['message' => 'Data peminjaman berhasil dihapus'], 200);
    }
}

