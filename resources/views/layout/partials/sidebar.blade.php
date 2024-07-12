 <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Sistem Jadwal</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
        <ul class="sidebar-menu p-3 m-0 mb-0">
            <li class="sidebar-menu-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="<?= route("home") ?>">
                    <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('guru') ? 'active' : '' }}">
                <a href="<?= route("guru.index") ?>">
                 <i class="ri-file-user-line sidebar-menu-item-icon"></i>
                    Guru
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('level') ? 'active' : '' }}">
                <a href="<?= route("level.index") ?>">
                <i class="ri-bar-chart-grouped-line sidebar-menu-item-icon"></i>
                    Tingkatan
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('kelas') ? 'active' : '' }}">
                <a href="<?= route("kelas.index") ?>">
                    <i class="ri-inbox-archive-line sidebar-menu-item-icon"></i>
                    Kelas
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('pelajaran') ? 'active' : '' }}">
                <a href="<?= route("pelajaran.index") ?>">
                    <i class="ri-briefcase-3-line sidebar-menu-item-icon"></i>
                    Pelajaran
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('jam-slot') ? 'active' : '' }}">
                <a href="<?= route("jam-slot.index") ?>">
                    <i class="ri-calendar-line sidebar-menu-item-icon"></i>
                    Pengaturan Jam
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('penjadwalan') ? 'active' : '' }}">
                <a href="<?= route("penjadwalan.index") ?>">
                    <i class="ri-calendar-line sidebar-menu-item-icon"></i>
                    Penjadwalan
                </a>
            </li>
            <li class="sidebar-menu-item {{ request()->is('change-password') ? 'active' : '' }}">
                <a href="<?= route("change_password") ?>">
                    <i class="ri-calendar-line sidebar-menu-item-icon"></i>
                    Ganti Password
                </a>
            </li>
           
           
            <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Apps</li>
         
            <li class="sidebar-menu-item">
                <a href="<?= route("logout") ?>">
                    <i class="ri-mail-line sidebar-menu-item-icon"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->