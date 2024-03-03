<?php

namespace App\Http\Controllers;

use App\Models\Databarang;
use Illuminate\Http\Request;

class DatabarangController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string',
            'merek' => 'required|string',
            'ruang' => 'required|string',
            'status' => 'required|string',
        ]);

        $databarang = Databarang::create($data);

        return response()->json(['message' => 'Data barang berhasil ditambahkan', 'data' => $databarang], 201);
    }

    public function update(Request $request, Databarang $databarang)
    {
        $data = $request->validate([
            'nama_barang' => 'required|string',
            'merek' => 'required|string',
            'ruang' => 'required|string',
            'status' => 'required|string'
        ]);

        $databarang->update($data);

        return response()->json(['message' => 'Data barang berhasil diupdate', 'data' => $databarang], 200);
    }

    public function destroy(Databarang $databarang)
    {
        $databarang->delete();

        return response()->json(['message' => 'Data barang berhasil dihapus'], 200);
    
    }
}
