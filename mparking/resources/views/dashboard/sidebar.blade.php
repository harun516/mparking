<html>

<body>
    {{-- start Sidebar --}}
    <aside class="main-sidebar sidebar-light-success elevation-4">

        <a href="index3.html" class="brand-link bg-success">
            <img src="{{ asset('mparking\adminlte\admin-lte\dist\img\AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('mparking\adminlte\admin-lte\dist\img\user1-128x128.jpg') }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-close">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i id="userIcon" class="fas fa-user-cog nav-icon"></i>
                                    <p>Pengaturan User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Pengaturan Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mobil.index') }}" class="nav-link">
                                    <i class="fas fa-car nav-icon"></i>
                                    <p>Pengaturan Mobil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pengantaran.index') }}" class="nav-link">
                                    <i class="fas fa-shipping-fast nav-icon"></i>
                                    <p>Pengaturan Pengantaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('transporter.index') }}" class="nav-link">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Pengaturan Transporter</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('kendaraan.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-cube"></i>
                            <p>
                                Pengaturan Kendaraan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-close">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>
                                Inbound
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('registrasimobil.index') }}" class="nav-link">
                                    <i class="fas fa-car nav-icon"></i>
                                    <p>Registrasi Mobil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('startunloading.index') }}" class="nav-link">
                                    <i class="fas fa-truck-loading nav-icon"></i>
                                    <p>Start Unloading</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('finishunloading.index') }}" class="nav-link">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Finish Unloading</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('documentfinish.index') }}" class="nav-link">
                                    <i class="fas fa-shipping-fast nav-icon"></i>
                                    <p>Document Finish</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item menu-close">
                        <a href="#" class="nav-link">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>
                                Outbound
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('registrasimobilout.index') }}" class="nav-link">
                                    <i class="fas fa-car nav-icon"></i>
                                    <p>Registrasi Mobil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('startdocumentout.index') }}" class="nav-link">
                                    <i class="fas fa-file-alt nav-icon"></i>
                                    <p>Start Document</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('startpickingprocess.index') }}" class="nav-link">
                                    <i class="fas fa-truck nav-icon"></i>
                                    <p>Start Picking Process</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('startloading.index') }}" class="nav-link">
                                    <i class="fas fa-truck-loading nav-icon"></i>
                                    <p>Start Loading</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('finishloading.index') }}" class="nav-link">
                                    <i class="fas fa-check-circle nav-icon"></i>
                                    <p>Finish Loading</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('documentfinishout.index') }}" class="nav-link">
                                    <i class="fas fa-clipboard-check nav-icon"></i>
                                    <p>Document Finish</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('checkout.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Checkout Process
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>

        </div>

    </aside>
    {{-- finish sidebar --}}
</body>

</html>
