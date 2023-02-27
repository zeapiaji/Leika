<div class="topnav">

    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav">
                @role('petugas||admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dasbor') ? 'active' : '' }}" href="{{route('dasbor')}}">
                        <i class="uil-home-alt me-2"></i> Dasbor
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('index') ? 'active' : '' }}" href="{{route('index')}}">
                        <i class="uil-apps me-2"></i> Barang
                    </a>
                </li>
                @endrole
                @role('petugas')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('lelang') ? 'active' : '' }}" href="{{route('lelang')}}">
                        <i class="uil-tag-alt me-2"></i> Lelang
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="nav-item">
                    <a href="{{route('petugas')}}" class="nav-link"><i class="uil-user-square me-2"></i> Data
                        Petugas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('data_pendukung') ? 'active' : '' }}" href="{{route('data_pendukung')}}">
                        <i class="uil-home-alt me-2"></i> Data Pendukung
                    </a>
                </li>
                @endrole
                
            </ul>
        </div>
    </nav>
</div>
