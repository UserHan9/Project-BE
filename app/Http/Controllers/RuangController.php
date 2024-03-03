<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;


class RuangController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data masukan
        $data = $request->validate([
            'room' => 'required|string|unique:ruang,room',
        ]);

        // Buat objek ruang baru
        $ruang = Ruang::create($data);

        // Kembalikan respons yang menyatakan ruang berhasil dibuat
        return response()->json(['message' => 'Ruang berhasil dibuat', 'data' => $ruang], 201);
    }
}
