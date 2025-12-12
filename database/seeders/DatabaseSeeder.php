<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@tkit.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create Guru User
        User::create([
            'name' => 'Guru TKIT',
            'email' => 'guru@tkit.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru',
        ]);

        // Create Sample Students
        $siswaData = [
            [
                'nis' => '2024001',
                'nama' => 'Ahmad Fadli',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2019-05-15',
                'alamat' => 'Jl. Melati No. 10, Sidoarjo',
                'nama_orangtua' => 'Bapak Ahmad',
                'no_telp' => '081234567890',
                'kelas' => 'TK A',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024002',
                'nama' => 'Siti Aisyah',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2019-03-20',
                'alamat' => 'Jl. Mawar No. 5, Sidoarjo',
                'nama_orangtua' => 'Bapak Hasan',
                'no_telp' => '081234567891',
                'kelas' => 'TK A',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024003',
                'nama' => 'Muhammad Rizki',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2018-08-10',
                'alamat' => 'Jl. Anggrek No. 15, Sidoarjo',
                'nama_orangtua' => 'Bapak Rizki',
                'no_telp' => '081234567892',
                'kelas' => 'TK B',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024004',
                'nama' => 'Fatimah Zahra',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '2018-11-25',
                'alamat' => 'Jl. Dahlia No. 8, Sidoarjo',
                'nama_orangtua' => 'Bapak Zainal',
                'no_telp' => '081234567893',
                'kelas' => 'TK B',
                'status' => 'aktif',
            ],
            [
                'nis' => '2024005',
                'nama' => 'Abdullah Aziz',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '2019-01-18',
                'alamat' => 'Jl. Kenanga No. 12, Sidoarjo',
                'nama_orangtua' => 'Bapak Aziz',
                'no_telp' => '081234567894',
                'kelas' => 'TK A',
                'status' => 'aktif',
            ],
        ];

        foreach ($siswaData as $data) {
            $siswa = Siswa::create($data);

            // Create payment records for each student
            // SPP Payments
            for ($bulan = 1; $bulan <= 12; $bulan++) {
                $status = $bulan <= 8 ? 'lunas' : ($bulan == 9 ? 'cicilan' : 'belum_lunas');
                
                Pembayaran::create([
                    'siswa_id' => $siswa->id,
                    'jenis_pembayaran' => 'SPP',
                    'jumlah' => 200000,
                    'tanggal_bayar' => date('Y') . '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-10',
                    'bulan' => date('F', mktime(0, 0, 0, $bulan, 1)),
                    'tahun' => date('Y'),
                    'status' => $status,
                    'keterangan' => $status == 'lunas' ? 'Pembayaran SPP ' . date('F', mktime(0, 0, 0, $bulan, 1)) : null,
                ]);
            }

            // Uang Pangkal
            Pembayaran::create([
                'siswa_id' => $siswa->id,
                'jenis_pembayaran' => 'Uang Pangkal',
                'jumlah' => 2000000,
                'tanggal_bayar' => date('Y') . '-01-05',
                'tahun' => date('Y'),
                'status' => 'lunas',
                'keterangan' => 'Uang Pangkal Tahun Ajaran ' . date('Y') . '/' . (date('Y') + 1),
            ]);

            // Seragam
            Pembayaran::create([
                'siswa_id' => $siswa->id,
                'jenis_pembayaran' => 'Seragam',
                'jumlah' => 500000,
                'tanggal_bayar' => date('Y') . '-01-15',
                'tahun' => date('Y'),
                'status' => 'lunas',
                'keterangan' => 'Seragam sekolah lengkap',
            ]);
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Login credentials:');
        $this->command->info('Admin - Email: admin@tkit.com, Password: admin123');
        $this->command->info('Guru - Email: guru@tkit.com, Password: guru123');
    }
}