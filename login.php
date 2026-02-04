<!DOCTYPE html>
<html lang="en" class="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Login Page</title>

  <!-- Google Fonts & Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">

  <!-- Vanilla CSS -->
  <link rel="stylesheet" href="Style/styleLogin.css">
</head>

<body>
  <header class="navbar">
    <div class="brand">
      <div class="logo">
        <svg viewBox="0 0 48 48">
          <path d="M44 11.27C44 14.01 39.83 16.39 33.69 17.63C39.83 18.88 44 21.26 44 24C44 26.74 39.83 29.12 33.69 30.36C39.83 31.6 44 33.99 44 36.73C44 40.74 35.05 44 24 44C12.95 44 4 40.74 4 36.73C4 33.99 8.16 31.6 14.31 30.36C8.16 29.12 4 26.74 4 24C4 21.26 8.16 18.88 14.31 17.63C8.16 16.39 4 14.01 4 11.27C4 7.26 12.95 4 24 4C35.05 4 44 7.26 44 11.27Z"/>
        </svg>
      </div>
      <h2>Perpustakaan</h2>
    </div>
  </header>

  <main class="main">
    <div class="login-card">
      <div class="headline">
        <h1>Welcome Back</h1>
        <p>Masukan informasi anda untuk mengakses akun anda</p>
      </div>

      <form class="login-form" method="POST" action="Login/proses_login.php">
        <div class="field">
          <label>Username</label>
          <div class="input-wrapper">
            <input type="text" placeholder="Enter your username">
            <span class="material-symbols-outlined">person</span>
          </div>
        </div>

        <div class="field">
          <div class="field-row">
            <label>Password</label>
            <a href="#" class="link">Forgot Password?</a>
          </div>
          <div class="input-wrapper">
            <input type="password" placeholder="Enter your password">
            <span class="material-symbols-outlined">lock</span>
          </div>
        </div>

        <div class="remember">
          <input type="checkbox" id="remember">
          <label for="remember">Remember this device</label>
        </div>

        <button type="submit" class="btn-primary">Login to Dashboard</button>

        <p class="signup">
          Don't have an account?
          <a href="#">Sign Up</a>
        </p>
      </form>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-links">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Service</a>
      <a href="#">Contact Support</a>
    </div>
    <p>© 2024 Perpustakaan Management System. All rights reserved.</p>
  </footer>

  <div class="bg-deco top"></div>
  <div class="bg-deco bottom"></div>
</body>
</html>
