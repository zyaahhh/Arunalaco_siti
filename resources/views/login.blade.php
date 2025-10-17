<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Arunala & Co</title>

    <!-- Vendor & Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 + AnimateCSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #d1c4e9 0%, #b388ff 100%);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      /* === Container utama dua kolom === */
      .login-wrapper {
        display: flex;
        width: 850px;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        animation: fadeInUp 0.8s ease;
      }

      /* === Kolom kiri (gambar) === */
      .login-image {
        flex: 1;
        background: url('{{ asset('assets/images/faces/imup.png') }}') center center/cover no-repeat;
        position: relative;
      }

      /* overlay ungu lembut di gambar */
      .login-image::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(126, 87, 194, 0.35);
      }

      /* === Kolom kanan (form login) === */
      .login-container {
        flex: 1;
        padding: 50px;
        text-align: center;
      }

      .brand-logo img {
        width: 80px;
        margin-bottom: 10px;
      }

      h3 {
        color: #4a148c;
        font-weight: 600;
      }

      .form-control {
        border-radius: 8px;
        border: 1px solid #d1c4e9;
        padding: 12px;
      }

      .btn-gradient-primary {
        background: linear-gradient(90deg, #7e57c2, #9575cd);
        border: none;
        color: #fff;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
        transition: 0.3s ease;
      }

      .btn-gradient-primary:hover {
        opacity: 0.9;
        transform: scale(1.03);
      }

      a.text-primary {
        color: #7e57c2 !important;
        font-weight: 600;
      }

      @keyframes fadeInUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
      }

      /* Responsif */
      @media (max-width: 768px) {
        .login-wrapper {
          flex-direction: column;
          width: 90%;
        }
        .login-image {
          height: 200px;
        }
      }
    </style>
  </head>

  <body>
    <div class="login-wrapper">
      <div class="login-image"></div>

      <div class="login-container">
        <div class="brand-logo">
          <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo">
        </div>
        <h3>Arunala & Co</h3>
        <p class="text-muted mb-4">Sign in to continue</p>

        <form id="loginForm" method="POST" action="{{ route('actionLogin') }}">
          @csrf
          <div class="form-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-gradient-primary">SIGN IN</button>
        </form>

        <p class="mt-4 text-muted">
          Don’t have an account? <a href="#" class="text-primary">Create</a>
        </p>
      </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>

    <!-- ✅ SweetAlert Logic -->
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("loginForm");

        // Validasi input kosong sebelum submit
        form.addEventListener("submit", function(e) {
          const username = form.querySelector("input[name='username']").value.trim();
          const password = form.querySelector("input[name='password']").value.trim();

          if (username === "" || password === "") {
            e.preventDefault();
            Swal.fire({
              icon: 'error',
              title: 'Login Gagal!',
              text: 'Username dan Password tidak boleh kosong!',
              confirmButtonColor: '#7e57c2',
              showClass: { popup: 'animate__animated animate__shakeX' },
              hideClass: { popup: 'animate__animated animate__fadeOutUp' },
            });
          }
        });

        @if(session('error'))
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonColor: '#7e57c2',
          });
        @endif

        @if(session('success'))
          Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#7e57c2',
          });
        @endif
      });
    </script>
  </body>
</html>
