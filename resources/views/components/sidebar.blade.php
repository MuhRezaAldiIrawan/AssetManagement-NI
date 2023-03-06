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
        <li class="menu-item">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link menu-toggle">
                <i class=' menu-icon tf-icons bx bxs-report'></i>
                <div data-i18n="Layouts">Activity</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/toll" class="menu-link">
                        <div data-i18n="Without menu">Toll</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/nontoll" class="menu-link">
                        <div data-i18n="Without navbar">Non Toll</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/pengembangan" class="menu-link">
                        <div data-i18n="Without navbar">Pengembangan</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="/location" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map-pin"></i>
                <div data-i18n="Analytics">Lokasi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/kategori" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Tables">Kategori</div>
            </a>
        </li>
        <li class="menu-item">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Layouts">User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/user" class="menu-link">
                        <div data-i18n="Without menu">Profile</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-without-navbar.html" class="menu-link">
                        <div data-i18n="Without navbar">All Users</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">End Menu</span></li>
    </ul>
</aside>
