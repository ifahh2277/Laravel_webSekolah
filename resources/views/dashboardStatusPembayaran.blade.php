<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Status Pembayaran</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", "Segoe UI", sans-serif;
    }

    body {
        background: #f4f4f4;
        padding: 20px;
    }

    /* ===== BOX WRAPPER ===== */
    .box {
        background: #fff;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        overflow: hidden;
        border: 1px solid #ddd;
    }

    /* HEADER */
    .box-header {
        padding: 14px 20px;
        color: #fff;
        font-weight: 600;
        font-size: 1rem;
    }

    .green-header { background: #00994d; }
    .orange-header { background: #ff9800; }

    .box-content {
        padding: 20px;
    }

    /* INFO SISWA */
    .row {
        display: flex;
        margin-bottom: 12px;
        font-size: 15px;
    }

    .label {
        width: 160px;
        font-weight: 600;
        color: #333;
    }

    .value {
        width: 100%;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-top: 6px;
        border-radius: 6px;
        border: 1px solid #ccc;
        outline: none;
    }

    /* TABLE */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background: #ffe0b2;
        font-weight: 600;
    }

    /* BADGE STATUS */
    .badge {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }

    .lunas {
        background: #c8e6c9;
        color: #2e7d32;
        border: 1px solid #81c784;
    }

    .belum {
        background: #ffebee;
        color: #c62828;
        border: 1px solid #ef9a9a;
    }

    .btn-bayar {
        background: #ff9800;
        color: white;
        padding: 8px 14px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-main {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #4CAF50, #FDD835);
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }
</style>
</head>

<body>

    <!-- INFORMASI SISWA -->
    <div class="box">
        <div class="box-header green-header">Informasi Siswa</div>

        <div class="box-content">

            <div class="row">
                <div class="label">Nama Siswa</div>
                <div class="value">: <input type="text" value="Aisyah Putri Lestari" readonly></div>
            </div>

            <div class="row">
                <div class="label">NIS</div>
                <div class="value">: <input type="text" value="20250123" readonly></div>
            </div>

            <div class="row">
                <div class="label">No. Telepon Ortu</div>
                <div class="value">: <input type="text" value="0812-3344-5566" readonly></div>
            </div>

        </div>
    </div>

    <!-- TAGIHAN BULANAN -->
    <div class="box">
        <div class="box-header orange-header">Tagihan Bulanan</div>

        <div class="box-content">

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pos Bayar</th>
                        <th>Jenis Pembayaran</th>
                        <th>Total Tagihan</th>
                        <th>Dibayar</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- BARIS 1 -->
                    <tr>
                        <td>1</td>
                        <td>SPP</td>
                        <td>SPP Tahun 2025/2026</td>
                        <td>Rp 1.200.000</td>
                        <td>Rp 400.000</td>
                        <td><span class="badge belum">Belum Lunas</span></td>
                        <td><button class="btn-bayar">+ Bayar</button></td>
                    </tr>

                    <!-- BARIS 2 (STATUS DIPINDAH KE SINI SESUAI PERMINTAAN) -->
                    <tr>
                        <td>2</td>
                        <td>Daftar Ulang</td>
                        <td>Registrasi Tahunan</td>
                        <td>Rp 550.000</td>
                        <td>Rp 550.000</td>
                        <td><span class="badge lunas">Lunas</span></td>
                        <td><button class="btn-bayar">+ Bayar</button></td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>

    <button class="btn-main">Kembali ke Menu Utama</button>

</body>
</html>