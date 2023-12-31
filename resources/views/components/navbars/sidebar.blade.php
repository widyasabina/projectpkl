@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0  my-3 fixed-start ms-3   bg-gradient-darks"
    id="sidenav-main">
    <div class="sidenav-header" style="display: flex; justify-content: center;">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="{{ route('dashboard') }}">
        <img src="{{ asset('assets') }}/img/dkpp.svg" class="navbar-brand-img" alt="main_logo">
    </a>
</div>

    <hr class="horizontal light mt-0 mb-2">
    <div id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu</h6>
            </li>
            <div class="nav-wrapper position-relative end-0">
            </div>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            
            @if (Auth::user() && Auth::user()->isHumas)
                <li class="nav-item">
                    <a class="nav-link text-dark {{ $activePage == 'balai' ? 'active bg-gradient-primary' : '' }} "
                        href="{{ route('balai.index') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-building ms-1"></i>
                        </div>
                        <span class="nav-link-text ms-2">Unit Kerja</span>
                    </a>
                </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('users.index') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-lg fa-list-ul"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'postingan' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('postingan.index') }}">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">article</i>
                    </div>
                    <span class="nav-link-text ms-1">Postingan</span>
                </a>
            </li>
            
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu Pendaftar</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark {{ $activePage == 'pendaftar' ? 'active bg-gradient-primary' : '' }}" 
                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">app_registration</i>
                    </div>
                    <span class="nav-link-text ms-1">Pendaftar</span>
                </a>
                <div class="collapse" id="collapseExample">
                    <a class="nav-link text-dark {{ $activePage == 'magang' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('magang.index') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10 ms-2">manage_accounts</i>
                        </div>
                        <span class="nav-link-text ms-1">Magang</span>
                    </a>
                    <a class="nav-link text-dark {{ $activePage == 'penelitian' ? ' active bg-gradient-primary' : '' }} "
                        href="{{ route('penelitian.index') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10 ms-2">biotech</i>
                        </div>
                        <span class="nav-link-text ms-1">Penelitian</span>
                    </a>
                </div>
            </li>
            @endif
            @if (Auth::user() && Auth::user()->isAdmin)
                <li class="nav-item">
                    <a class="nav-link text-dark {{ $activePage == 'balai' ? 'active bg-gradient-primary' : '' }} "
                        href="{{ route('balai.index') }}">
                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-building ms-1"></i>
                        </div>
                        <span class="nav-link-text ms-2">Unit Kerja</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
