<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    protected $table = 'servis';

    protected $fillable = ['kerusakan', 'deskripsi', 'mulai', 'selesai', 'teknisi', 'biaya', 'data_peminjaman_id'];

    public function dataPeminjaman()
    {
        return $this->belongsTo(DataPeminjaman::class, 'data_peminjaman_id');
    }
}
