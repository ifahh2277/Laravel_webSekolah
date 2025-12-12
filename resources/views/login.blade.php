<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login TKIT Jamilul Mu'minin</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", "Segoe UI", sans-serif;
    }

    body {
      background: #f4f4f4;
      color: #333;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .login-container {
      display: flex;
      flex-wrap: wrap;
      min-height: 100vh;
      width: 100%;
    }

    .login-left {
      flex: 1;
      background: #e8f5e9;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .login-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      padding: 2rem;
    }

    .login-box {
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .logo-image {
      width: 90px;
      height: auto;
      margin-bottom: 10px;
    }

    .login-box h2 {
      color: #2d6016;
      font-size: 1.8rem;
      margin-bottom: 0.5rem;
    }

    label {
      font-weight: 600;
      display: block;
      margin-top: 1rem;
      text-align: left;
    }

    input {
      width: 100%;
      padding: 0.8rem;
      margin-top: 0.5rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 1rem;
    }

    input:focus {
      border-color: #4CAF50;
      box-shadow: 0 0 4px rgba(76, 175, 80, 0.3);
    }

    .btn-login {
      margin-top: 2rem;
      width: 100%;
      padding: 0.9rem;
      background: linear-gradient(135deg, #4CAF50, #FDD835);
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #2d6016, #F9A825);
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <div class="login-container">

    {{-- Gambar Kiri --}}
    <div class="login-left">
      <img src="{{ asset('images/pulu_pulu.jpg') }}" class="login-image" alt="Siswa TKIT">
    </div>

    {{-- Form Login --}}
    <div class="login-right">
      <div class="login-box">
        
        <img src="{{ asset('images/logo_tkit.png') }}" alt="logo Jamilul Mu'minin" class="logo-image">
        <h2>TKIT Jamilul Mu'minin</h2>
        <p>Tahun Ajaran 2025 / 2026</p>

        <form action="{{ route('login.proses') }}" method="POST" id="loginForm">
          @csrf

          <label for="username">No HP / Username</label>
          <input type="text" id="username" name="username" placeholder="Masukkan username" required>

          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="password" required>

          <button type="submit" class="btn-login">Masuk Halaman</button>

          {{-- Pesan error Laravel --}}
          @if(session('error'))
            <p style="color:red; margin-top:10px">{{ session('error') }}</p>
          @endif
        </form>

      </div>
    </div>

  </div>


  {{-- Jika mau tetap pakai login dummy JS, uncomment ini --}}
  {{-- 
  <script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const user = document.getElementById("username").value.trim();
      const pass = document.getElementById("password").value.trim();

      if (
        (user === "admin" && pass === "admin123") ||
        (user === "guru" && pass === "guru123") ||
        (user === "orangtua" && pass === "orangtua123")
      ) {
        alert(`Selamat datang, ${user}!`);
        window.location.href = "/profil";
      } else {
        alert("Username atau kode akses salah. Silakan coba lagi.");
      }
    });
  </script>
  --}}
</body>
</html>
