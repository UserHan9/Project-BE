<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use App\Models\DataPeminjaman;

class ServisController extends Controller
{

    public function index()
    {
        // Ambil semua data servis beserta relasi data peminjaman
        $servis = Servis::with('dataPeminjaman')->get();

        // Kembalikan data dalam format JSON
        return response()->json([
            'message' => 'Data servis berhasil diambil',
            'data' => $servis
        ], 200);
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'kerusakan' => 'required|string',
            'deskripsi' => 'required|string',
            'mulai' => 'nullable|date',
            'selesai' => 'nullable|date',
            'teknisi' => 'nullable|string',
            'biaya' => 'nullable|string',
            'data_peminjaman_id' => 'required|exists:data_peminjaman,id',
        ]);

        // Buat objek servis baru
        $servis = Servis::create($data);

        // Dapatkan data peminjaman yang terkait dengan servis yang baru saja dibuat
        $dataPeminjaman = DataPeminjaman::findOrFail($data['data_peminjaman_id']);

        // Kembalikan respons dengan data servis dan data peminjaman
        return response()->json([
            'message' => 'Data servis berhasil ditambahkan',
            'data' => [
                'kerusakan' => $servis->kerusakan,
                'deskripsi' => $servis->deskripsi,
                'mulai' => $servis->mulai,
                'selesai' => $servis->selesai,
                'teknisi' => $servis->teknisi,
                'biaya' => $servis->biaya,
                'data_peminjaman' => $dataPeminjaman
            ]
        ], 201);
    }
}
