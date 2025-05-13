<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AYUATARI OLSHOP</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false">

              <li class="nav-item menu-open">
                <a href="dashboard-admin.php" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Manajemen Barang
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?page=barang-masuk" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Barang Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=barang-keluar" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Barang Keluar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=barang-reject" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Barang Reject</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=barang-expired" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Barang Expired</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?page=stok-barang" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Stok Barang</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item menu-open">
                <a href="" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Laporan
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?page=laporan-transaksi" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Laporan Transaksi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Laporan Stok Barang</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Laporan Barang Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Laporan Barang Keluar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Laporan Barang Reject</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Laporan Barang Expired</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    User Management 
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?page=data-user.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Tambah User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Hak Akses</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="menu-supplier.php" class="nav-link active">
                  <i class="fas fa-boxes"></i>
                  <p>Supplier</p>
                </a>
              </li>

              <li class="nav-item menu-open">
                <a href="" class="nav-link active">
                <i class="fa-solid fa-money-bill-trend-up"></i>
                  <p>Transaksi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link active">
                  <i class="fas fa-boxes"></i>
                  <p>Pengaturan</p>
                </a>
              </li>

              <li class="nav-item menu-open">
                <a href="/inventory/logout.php" class="nav-link active">
                <i class="fa-solid fa-money-bill-trend-up"></i>
                  <p>Logout</p>
                </a>
              </li>
              
            </ul>
            