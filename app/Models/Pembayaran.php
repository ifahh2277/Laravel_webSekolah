<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'siswa_id',
        'jenis_pembayaran',
        'jumlah',
        'tanggal_bayar',
        'bulan',
        'tahun',
        'status',
        'keterangan',
        'bukti_pembayaran',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah' => 'decimal:2',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function getFormattedJumlahAttribute()
    {
        return 'Rp ' . number_format($this->jumlah, 0, ',', '.');
    }

    public function scopeLunas($query)
    {
        return $query->where('status', 'lunas');
    }

    public function scopeBelumLunas($query)
    {
        return $query->where('status', 'belum_lunas');
    }

    public function scopeTahunIni($query)
    {
        return $query->where('tahun', date('Y'));
    }
}