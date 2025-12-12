<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa')
            ->orderBy('tanggal_bayar', 'desc')
            ->paginate(20);
        
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Siswa::where('status', 'aktif')
            ->orderBy('nama')
            ->get();
        
        return view('pembayaran.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pembayaran' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'bulan' => 'nullable|string',
            'tahun' => 'required|integer',
            'status' => 'required|in:lunas,belum_lunas,cicilan',
            'keterangan' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')
                ->store('bukti_pembayaran', 'public');
        }

        Pembayaran::create($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('siswa')->findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $siswa = Siswa::where('status', 'aktif')
            ->orderBy('nama')
            ->get();
        
        return view('pembayaran.edit', compact('pembayaran', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_pembayaran' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'bulan' => 'nullable|string',
            'tahun' => 'required|integer',
            'status' => 'required|in:lunas,belum_lunas,cicilan',
            'keterangan' => 'nullable|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            if ($pembayaran->bukti_pembayaran) {
                Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
            }
            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')
                ->store('bukti_pembayaran', 'public');
        }

        $pembayaran->update($validated);

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        
        if ($pembayaran->bukti_pembayaran) {
            Storage::disk('public')->delete($pembayaran->bukti_pembayaran);
        }
        
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')
            ->with('success', 'Data pembayaran berhasil dihapus!');
    }

    public function dashboardStatus()
    {
        $siswa = Siswa::with(['pembayaran' => function($query) {
            $query->where('tahun', date('Y'));
        }])
        ->where('status', 'aktif')
        ->orderBy('kelas')
        ->orderBy('nama')
        ->get();

        $statistik = [
            'total_siswa' => $siswa->count(),
            'lunas' => $siswa->filter(function($s) {
                return $s->pembayaran->where('status', 'lunas')->count() > 0;
            })->count(),
            'belum_lunas' => $siswa->filter(function($s) {
                return $s->pembayaran->where('status', 'belum_lunas')->count() > 0;
            })->count(),
        ];

        return view('dashboardStatusPembayaran', compact('siswa', 'statistik'));
    }
}