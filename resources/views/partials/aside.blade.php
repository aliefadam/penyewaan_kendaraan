<aside>
    <div class="close-sidebar">
        <i class="bi bi-arrow-bar-left"></i>
    </div>
    <div class="logo">
        <i class="bi bi-car-front-fill"></i>
        <h1>Vehicle Manager</h1>
    </div>
    <div class="menu">
        @if (auth()->user()->role == 'admin')
            <a href="/" class="menu-item {{ $title == 'Dashboard' ? 'active' : '' }}">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
            </a>
            <a href="/form-tambah-penyewaan" class="menu-item {{ $title == 'Form Tambah Sewa' ? 'active' : '' }}">
                <i class="bi bi-plus-square"></i>
                <span>Tambah Penyewaan</span>
            </a>
            <a href="/riwayat-penyewaan" class="menu-item {{ $title == 'Riwayat Penyewaan' ? 'active' : '' }}">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat Penyewaan</span>
            </a>
        @else
            <a href="/" class="menu-item {{ $title == 'Daftar Pengajuan' ? 'active' : '' }}">
                <i class="bi bi-card-checklist"></i>
                <span>Daftar Pengajuan</span>
            </a>
        @endif


    </div>
</aside>
