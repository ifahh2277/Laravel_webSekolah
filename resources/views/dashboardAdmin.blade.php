<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - TKIT Jamilul Mu’minin</title>

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />

  <!-- CSS Dasar -->
  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background-color: #f8faec;
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #234f1e;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100vh;
      overflow-y: auto;
    }

    .logo-section {
      display: flex;
      align-items: center;
      padding: 1rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .logo-img img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
      border: 2px solid white;
    }

    .school-info h2 {
      font-size: 1rem;
      margin: 0;
      color: #fff;
    }

    .school-info p {
      font-size: 0.8rem;
      color: #ddd;
      margin: 0;
    }

    .menu {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .menu-item {
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .menu-item a {
      display: flex;
      align-items: center;
      color: white;
      text-decoration: none;
      padding: 0.8rem 1rem;
      transition: background-color 0.3s;
    }

    .menu-item a:hover,
    .menu-item a.active {
      background-color: #2d6a2e;
    }

    .menu-icon i {
      margin-right: 10px;
      font-size: 1.1rem;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      overflow-y: auto;
      padding: 2rem;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    header h1 {
      color: #2d6a2e;
      font-size: 1.8rem;
      margin: 0;
    }

    header p {
      color: #555;
      margin: 0;
    }

    .user-profile {
      display: flex;
      align-items: center;
      background: linear-gradient(to right, #9acd32, #2d6a2e);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 2rem;
    }

    .user-profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
      border: 2px solid white;
    }

    /* Stats Cards */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .stat-card {
      background-color: white;
      border-radius: 12px;
      padding: 1.5rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .stat-info h3 {
      color: #2d6a2e;
      margin: 0;
      font-size: 1rem;
    }

    .number {
      font-size: 1.8rem;
      font-weight: bold;
      color: #2d6a2e;
      margin: 0.5rem 0;
    }

    .stat-icon i {
      font-size: 2rem;
      color: #2d6a2e;
    }

    /* Section Cards */
    .section {
      margin-bottom: 2rem;
    }

    .section h2 {
      color: #2d6a2e;
      font-size: 1.4rem;
      margin-bottom: 1rem;
    }

    .activities,
    .quick-actions {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
    }

    .activity,
    .action-btn {
      background-color: white;
      border-radius: 10px;
      padding: 1rem;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      transition: transform 0.2s;
    }

    .activity:hover,
    .action-btn:hover {
      transform: translateY(-4px);
    }

    .activity i,
    .action-btn i {
      font-size: 1.5rem;
      color: #2d6a2e;
      margin-right: 10px;
    }

    .action-btn span {
      color: #2d6a2e;
      font-weight: 600;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <div>
      <div class="logo-section">
        <div class="logo-img">
          <img src="logo putih.jpg" alt="Logo Sekolah" />
        </div>
        <div class="school-info">
          <h2>TKIT JAMILUL MU’MININ</h2>
          <p>Dashboard Admin</p>
        </div>
      </div>

      <ul class="menu">
        <li class="menu-item"><a href="#" class="active"><div class="menu-icon"><i class="fa-solid fa-gauge"></i></div>Dashboard</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-user-graduate"></i></div>Data Siswa</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-chalkboard-teacher"></i></div>Data Guru</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-school"></i></div>Kelas</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-calendar-days"></i></div>Jadwal</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-user-check"></i></div>Absensi</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-book-open"></i></div>Nilai & Rapor</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-wallet"></i></div>Keuangan</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-bullhorn"></i></div>Pengumuman</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-file-alt"></i></div>Laporan</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-gear"></i></div>Pengaturan</a></li>
        <li class="menu-item"><a href="#"><div class="menu-icon"><i class="fa-solid fa-right-from-bracket"></i></div>Keluar</a></li>
      </ul>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <header>
      <div>
        <h1>Dashboard</h1>
        <p>Selamat datang di sistem manajemen TKIT Jamilul Mu’minin</p>
      </div>
      <div class="user-profile">
        <img src="logo putih.jpg" alt="Admin Logo" />
        <div>
          <strong>Admin TKIT</strong><br />
          <small>Administrator</small>
        </div>
      </div>
    </header>

    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-info">
          <h3>Total Siswa</h3>
          <div class="number">56</div>
          <p style="color: #4caf50;">↑ 2 siswa baru</p>
        </div>
        <div class="stat-icon"><i class="fa-solid fa-children"></i></div>
      </div>

      <div class="stat-card">
        <div class="stat-info">
          <h3>Total Guru</h3>
          <div class="number">7</div>
          <p>6 guru tetap</p>
        </div>
        <div class="stat-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
      </div>

      <div class="stat-card">
        <div class="stat-info">
          <h3>Total Kelas</h3>
          <div class="number">2</div>
          <p> TK A & TK B</p>
        </div>
        <div class="stat-icon"><i class="fa-solid fa-door-open"></i></div>
      </div>

      <div class="stat-card">
        <div class="stat-info">
          <h3>Kehadiran Hari Ini</h3>
          <div class="number">98%</div>
          <p>53 dari 56 siswa</p>
        </div>
        <div class="stat-icon"><i class="fa-solid fa-check"></i></div>
      </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <section class="section">
      <h2>Aktivitas Terbaru</h2>
      <div class="activities">
        <div class="activity"><i class="fa-solid fa-user-plus"></i> Pendaftaran Siswa Baru</div>
        <div class="activity"><i class="fa-solid fa-clipboard-check"></i> Input Absensi Harian</div>
        <div class="activity"><i class="fa-solid fa-bullhorn"></i> Pengumuman Kegiatan Sekolah</div>
        <div class="activity"><i class="fa-solid fa-money-check-dollar"></i> Pembayaran SPP Bulanan</div>
        <div class="activity"><i class="fa-solid fa-file-alt"></i> Laporan Bulanan Guru</div>
      </div>
    </section>

    <!-- Aksi Cepat -->
    <section class="section">
      <h2>Aksi Cepat</h2>
      <div class="quick-actions">
        <button class="action-btn"><i class="fa-solid fa-user-plus"></i><span>Tambah Siswa Baru</span></button>
        <button class="action-btn"><i class="fa-solid fa-clipboard-check"></i><span>Input Absensi</span></button>
        <button class="action-btn"><i class="fa-solid fa-bullhorn"></i><span>Buat Pengumuman</span></button>
        <button class="action-btn"><i class="fa-solid fa-chart-line"></i><span>Lihat Laporan</span></button>
        <button class="action-btn"><i class="fa-solid fa-calendar-days"></i><span>Kelola Jadwal</span></button>
        <button class="action-btn"><i class="fa-solid fa-money-check-alt"></i><span>Data Pembayaran</span></button>
      </div>
    </section>
  </main>
</body>
</html>