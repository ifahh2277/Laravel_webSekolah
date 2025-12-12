<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::where('status', 'aktif')->count();
        $totalSiswaAktif = Siswa::where('status', 'aktif')->count();
        $totalSiswaNonaktif = Siswa::where('status', 'nonaktif')->count();
        
        $totalPembayaranBulanIni = Pembayaran::whereMonth('tanggal_bayar', date('m'))
            ->whereYear('tanggal_bayar', date('Y'))
            ->sum('jumlah');
        
        $pembayaranLunas = Pembayaran::lunas()
            ->tahunIni()
            ->count();
        
        $pembayaranBelumLunas = Pembayaran::belumLunas()
            ->tahunIni()
            ->count();
        
        // Grafik pembayaran per bulan
        $pembayaranPerBulan = Pembayaran::select(
                DB::raw('MONTH(tanggal_bayar) as bulan'),
                DB::raw('SUM(jumlah) as total')
            )
            ->whereYear('tanggal_bayar', date('Y'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();
        
        // Siswa terbaru
        $siswaTerbaru = Siswa::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Pembayaran terbaru
        $pembayaranTerbaru = Pembayaran::with('siswa')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboardAdmin', compact(
            'totalSiswa',
            'totalSiswaAktif',
            'totalSiswaNonaktif',
            'totalPembayaranBulanIni',
            'pembayaranLunas',
            'pembayaranBelumLunas',
            'pembayaranPerBulan',
            'siswaTerbaru',
            'pembayaranTerbaru'
        ));
    }
}