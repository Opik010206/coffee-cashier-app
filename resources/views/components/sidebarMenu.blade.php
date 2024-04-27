<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="/">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">
          <i class="ti-info-alt menu-icon "></i>
          <span class="menu-title">About</span>
        </a>
      </li>

      {{-- Login Sebagai Admin --}}
      @if (Auth::check() && Auth::user()->level == 3)
      <li class="nav-item">
        <a class="nav-link" href="/category">
          <i class="ti ti-package menu-icon"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/jenis">
          <i class="ti ti-tag menu-icon"></i>
          <span class="menu-title">Jenis</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/menu">
          <i class="ti ti-layout-list-thumb menu-icon"></i>
          <span class="menu-title">Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/stock">
          <i class="ti ti-clipboard menu-icon"></i>
          <span class="menu-title">Stok</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/meja">
          <i class="ti ti-archive menu-icon"></i>
          <span class="menu-title">Meja</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/pelanggan">
          <i class="ti ti-face-smile menu-icon"></i>
          <span class="menu-title">Pelanggan</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-secound" aria-expanded="true" aria-controls="ui-secound">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Pemesanan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse show" id="ui-secound" style="">
          <ul class="nav flex-column sub-menu">
            @foreach ($jenis as $j)
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="true" aria-controls="ui-basic">
                  <span class="menu-title">{{ $j->nama }}</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse show" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li>halo</li>
                    <li>halo</li>
                    <li>halo</li>
                  </ul>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="/karyawan">
          <i class="ti ti-themify-favicon menu-icon"></i>
          <span class="menu-title">Karyawan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/produk_titipan">
          <i class="ti ti-shopping-cart-full menu-icon"></i>
          <span class="menu-title">Produk Titipan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="data">
          <i class="ti ti-write menu-icon"></i>
          <span class="menu-title">Data Produk</span>
        </a>
      </li>
      @endif


      {{-- Login Sebagai Kasir --}}
      @if (Auth::check() && Auth::user()->level == 2)
      <li class="nav-item">
        <a class="nav-link" href="/pemesanan">
          <i class="ti-receipt menu-icon"></i>
          <span class="menu-title">Pemesanan</span>
        </a>
      </li>
      @endif


      <li class="nav-item">
        <a class="nav-link" href="/absensi">
          <i class="ti-check-box menu-icon"></i>
          <span class="menu-title">Absensi Karyawan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact_us">
          <i class="ti ti-headphone-alt menu-icon"></i>
          <span class="menu-title">Contact Us</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          {{-- <i class="menu-arrow"></i> --}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
</nav>