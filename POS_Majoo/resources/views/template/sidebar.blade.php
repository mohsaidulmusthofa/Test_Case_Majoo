<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('image/majoo.jpg') }}" class="navbar-brand-img" alt="img" width="50.6">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('vdashboard') }}">
                <i class="ni ni-tv-2 text-success"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-single-02 text-yellow "></i>
                <span class="nav-link-text">Pelanggan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="ni ni-pin-3 text-success"></i>
                <span class="nav-link-text">Supplier</span>
              </a>
            </li>
            {{-- Navbar ke Halaman Produk --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('vproduk') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Produk</span>
              </a>
            </li>
            {{-- Navbar ke Halaman Kategori Produk --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('vkategori') }}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Kategori Produk</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>