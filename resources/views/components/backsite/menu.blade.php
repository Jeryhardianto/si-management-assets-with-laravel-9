<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('assets/backsite/dist/img/logo-pdam.png') }}" alt="Apa mening Logo"
            class="brand-image " style="opacity: .8">
        <span class="brand-text font-weight-light">SIASSET</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/backsite/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ set_active('dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('asset_show')
                <li class="nav-header">Managemen Asset</li>
                    <li class="nav-item">
                        <a href="{{ route('assets.index') }}"
                            class="nav-link {{ set_active(['assets.index', 'assets.show', 'assets.create', 'assets.edit']) }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Assets
                            </p>
                        </a>
                    </li>
                @endcan
      
                @if (auth()->user()->can('category_show') || auth()->user()->can('golongan_show') || auth()->user()->can('satuan_show'))
                <li class="nav-header">Master Data</li>
                @endif
                @can('category_show')
                    <li class="nav-item">
                        <a href="{{ route('kategori.index') }}"
                            class="nav-link {{ set_active(['kategori.index', 'kategori.show', 'kategori.create', 'kategori.edit']) }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Kategori
                            </p>
                        </a>
                    </li>
                 @endcan
                
                 {{-- @can('golongan_show')
                <li class="nav-item">
                    <a href="{{ route('golongan.index') }}"
                        class="nav-link {{ set_active(['golongan.index', 'golongan.show', 'golongan.create', 'golongan.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Golongan
                        </p>
                    </a>
                </li> 
                @endcan --}}
                @can('satuan_show')
                  <li class="nav-item">
                    <a href="{{ route('satuan.index') }}"
                        class="nav-link {{ set_active(['satuan.index', 'satuan.show', 'satuan.create', 'satuan.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Satuan
                        </p>
                    </a>
                </li>
                @endcan

                @if (auth()->user()->can('pinjam_show') || auth()->user()->can('kembali_show'))
                <li class="nav-header">Transaksi</li>
                @endif

                @can('pinjam_show')
                    <li class="nav-item">
                        <a href="{{ route('pinjaman.index') }}"
                            class="nav-link {{ set_active(['pinjaman.index', 'pinjaman.show', 'pinjaman.create', 'pinjaman.edit', 'kembali.show']) }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Peminjaman
                            </p>
                        </a>
                    </li>
                @endcan
                @can('kembali_show')
                    <li class="nav-item">
                        <a href="{{ route('kembali.index') }}"
                            class="nav-link {{ set_active(['kembali.index','kembali.detail']) }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Pengembalian
                            </p>
                        </a>
                    </li>
                @endcan
                @if (auth()->user()->can('laporan_show') || auth()->user()->can('laporan_pinjam') || auth()->user()->can('laporan_kembali') || auth()->user()->can('laporan_stok'))
                <li class="nav-header">Laporan</li>
                @endif

                @can('laporan_show')
                <li class="nav-item">
                    <a href="{{ route('laporanassset.index') }}"
                        class="nav-link {{ set_active(['laporanassset.index']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Laporan Asset
                        </p>
                    </a>
                </li>                
                @endcan

                @can('laporan_stok')
                <li class="nav-item">
                    <a href="{{ route('laporan_stok.stok') }}"
                        class="nav-link {{ set_active(['laporan_stok.stok']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Laporan Stok
                        </p>
                    </a>
                </li>                
                @endcan

                @can('laporan_pinjam')
                <li class="nav-item">
                    <a href="{{ route('laporan_pinjam.pinjam') }}"
                        class="nav-link {{ set_active(['laporan_pinjam.pinjam']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Laporan Peminjaman
                        </p>
                    </a>
                </li>                
                @endcan

                @can('laporan_kembali')
                <li class="nav-item">
                    <a href="{{ route('laporan_kembali.kembali') }}"
                        class="nav-link {{ set_active(['laporan_kembali.kembali']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Laporan Pengembalian
                        </p>
                    </a>
                </li>                
                @endcan
               

                    @if (auth()->user()->can('role_show') || auth()->user()->can('user_show'))
                    <li class="nav-header">Manegement User</li>
                    @endif
             
                    @can('user_show')
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ set_active(['users.index', 'users.show', 'users.create', 'users.edit']) }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('role_show')
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}"
                            class="nav-link {{ set_active(['role.index', 'role.show', 'role.create', 'role.edit']) }}">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Role
                            </p>
                        </a>
                    </li>
                @endcan




                {{-- <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <button class="btn btn-danger nav-link text-left" >
                                <p style="color: #ffffff">
                                    <i class="fas fa-sign-out-alt" ></i> Logout
                                </p>
                            </button>
                      </form>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
