<ul class="nav">
  <li class="nav-item nav-profile">
    <a href="#" class="nav-link">
      <div class="nav-profile-image">
        <img src="{{ asset('assets/images/faces/imup.png') }}" alt="profile" />
        <span class="login-status online"></span>
      </div>
      <div class="nav-profile-text d-flex flex-column">
        <span class="font-weight-bold mb-2">Arunala & Co</span>
      </div>
      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
  </li>

  <!-- DASHBOARD -->
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/dashboard') }}">
      <span class="menu-title">Dashboard</span>
      <i class="mdi mdi-home menu-icon"></i>
    </a>
  </li>

  <!-- MENU PENJUALAN -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('penjualan.index') }}">
      <span class="menu-title">Kelola Data Penjualan</span>
      <i class="mdi mdi-cash menu-icon"></i>
    </a>
  </li>

  <!-- MENU DETAIL PENJUALAN -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('detail_penjualan.index') }}">
      <span class="menu-title">Kelola Data Detail Penjualan</span>
      <i class="mdi mdi-receipt menu-icon"></i>
    </a>
  </li>

  <!-- MENU BARANG -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('barang.index') }}">
      <span class="menu-title">Kelola Data Barang</span>
      <i class="mdi mdi-package-variant menu-icon"></i>
    </a>
  </li>

  <!-- MENU ADMIN -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.index') }}">
      <span class="menu-title">Kelola Data Admin</span>
      <i class="mdi mdi-account menu-icon"></i>
    </a>
  </li>

  <!-- MENU LOGOUT -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('actionLogout') }}">
      <span class="menu-title text-danger">Logout</span>
      <i class="mdi mdi-logout text-danger menu-icon"></i>
    </a>
  </li>

  <!-- MENU DOKUMENTASI -->
  <li class="nav-item">
    <a class="nav-link" href="https://bootstrapdash.com/product/purple-bootstrap-admin-template/" target="_blank">
      <span class="menu-title">Documentation</span>
      <i class="mdi mdi-file-document-box menu-icon"></i>
    </a>
  </li>
</ul>

</body>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Tangkap klik link logout
  document.querySelectorAll('a[href="{{ route('actionLogout') }}"]').forEach(function(el) {
    el.addEventListener('click', function(e) {
      e.preventDefault(); // cegah langsung pindah halaman

      Swal.fire({
        title: 'Yakin mau logout?',
        text: "Kamu akan keluar dari sistem!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, logout!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{ route('actionLogout') }}";
        }
      });
    });
  });
</script>

</html>



