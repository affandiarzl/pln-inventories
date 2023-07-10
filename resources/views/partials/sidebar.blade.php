<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Barang</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('barang.index')}}">Barang</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Satuan</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Jenis</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
        aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Riwayat</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Barang Masuk</a></li>
          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Barang Keluar</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Ruangan</span>
        </a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
            <i class="icon-head menu-icon"></i>
          <span class="menu-title">Manajemen Pengguna</span>
        </a>
      </li>
  </ul>
</nav>
