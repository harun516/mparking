<html>

<body>
    {{-- start navbar --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-success">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('mparking\adminlte\admin-lte\dist\img\user1-128x128.jpg') }}"
                        class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <li class="user-header bg-success">
                        <img src="{{ asset('mparking\adminlte\admin-lte\dist\img\user1-128x128.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                        <p>
                            {{ Auth::user()->nama }}
                            <small>Member since {{ Auth::user()->created_at->format('d-m-Y') }}</small>
                        </p>
                    </li>

                    <li class="user-footer d-flex justify-content-center">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"class="btn btn-danger btn-flat">Sign out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    {{-- finish navbar --}}
</body>

</html>
