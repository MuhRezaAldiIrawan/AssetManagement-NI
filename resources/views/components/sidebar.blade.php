<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mt-3 ml-3 align-content-center justify-content-center">
        <a href="index.html" class="app-brand-link ">
            <img src="{{ asset('img/logo/munlogoheader.png ') }}" alt="Logo">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('scheadule') ? 'active' : '' }}">
            <a href="/scheadule" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-calendar"></i>
                <div data-i18n="Analytics">Scheadule</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Activity </span></li>

        <li class="menu-item {{ request()->is(['toll'],['tollhistori']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class=' menu-icon tf-icons bx bxs-car-mechanic'></i>
                <div data-i18n="Layouts">Toll</div>
            </a>
            <ul class="menu-sub "">
                <li class="menu-item {{ request()->is('toll') ? 'active' : '' }}">
                    <a href="/toll" class="menu-link">
                        <div data-i18n="Without menu">Log Toll</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('tollhistori') ? 'active' : '' }}">
                    <a href="/tollhistori" class="menu-link">
                        <div data-i18n="Without navbar">Log Histori</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is(['nontoll'],['nontollhistori']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class=' menu-icon tf-icons bx bx-building-house'></i>
                <div data-i18n="Layouts">Non Toll</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('nontoll') ? 'active' : '' }}">
                    <a href="/nontoll" class="menu-link">
                        <div data-i18n="Without menu">Log Non Toll</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('nontollhistori') ? 'active' : '' }}">
                    <a href="/nontollhistori" class="menu-link">
                        <div data-i18n="Without navbar">Log Histori</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is(['pengembangan'],['pengembanganhistori']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class=' menu-icon tf-icons bx bx-trending-up'></i>
                <div data-i18n="Layouts">Pengembangan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ request()->is('pengembangan') ? 'active' : '' }}">
                    <a href="/pengembangan" class="menu-link">
                        <div data-i18n="Without menu">Log Pengembangan</div>
                    </a>
                </li>
                <li class="menu-item  {{ request()->is('pengembanganhistori') ? 'active' : '' }}">
                    <a href="/pengembanganhistori" class="menu-link">
                        <div data-i18n="Without navbar">Log Histori</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Information Details</span></li>

        <li class="menu-item {{ request()->is(['listbarang'],['logbarang']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cart"></i>
                <div data-i18n="Layouts">Barang</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item  {{ request()->is('listbarang') ? 'active' : '' }}">
                    <a href="/listbarang" class="menu-link">
                        <div data-i18n="Without menu">List Barang</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('logbarang') ? 'active' : '' }}">
                    <a href="/logbarang" class="menu-link">
                        <div data-i18n="Without navbar">Log Barang</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('location') ? 'active' : '' }}">
            <a href="/location" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-pin"></i>
                <div data-i18n="Analytics">Lokasi</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('kategori') ? 'active' : '' }}">
            <a href="/kategori" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Tables">Kategori</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is(['users'],['allusers']) ? 'active' : '' }}">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Layouts">User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
                    <a href="/users" class="menu-link">
                        <div data-i18n="Without menu">Profile</div>
                    </a>
                </li>
                @can('superadmin')
                <li class="menu-item {{ request()->is('allusers') ? 'active' : '' }}">
                    <a href="/allusers" class="menu-link">
                        <div data-i18n="Without navbar">All Users</div>
                    </a>
                </li>       
                @endcan
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">End Menu</span></li>
    </ul>
</aside>
