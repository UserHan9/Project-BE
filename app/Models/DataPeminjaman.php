<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'data_peminjaman';

    protected $fillable = ['nama', 'kelas', 'data_barang_id'];

    public function barang()
    {
        return $this->belongsTo(DataBarang::class, 'data_barang_id');
    }
}
