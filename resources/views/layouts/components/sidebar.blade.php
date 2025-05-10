@php
    $menus = [];

    if (auth()->user()->role === 'admin') {
        $menus = [
            (object)['tittle' => 'Dashboard', 'path' => 'dashboard', 'icon' => 'fas fa-th'],
            (object)['tittle' => 'Data Ikan', 'path' => 'ikan', 'icon' => 'fas fa-fish'],
            (object)['tittle' => 'Data Kapal', 'path' => 'kapal', 'icon' => 'fas fa-ship'],
            (object)['tittle' => 'User', 'path' => 'user', 'icon' => 'fas fa-user'],
            (object)['tittle' => 'Kategori', 'path' => 'category', 'icon' => 'fas fa-list'],
        ];
    } else {
        $menus = [
            (object)['tittle' => 'Dashboard', 'path' => 'dashboard', 'icon' => 'fas fa-th'],
            (object)['tittle' => 'Data Ikan', 'path' => 'ikan', 'icon' => 'fas fa-fish'],
            (object)['tittle' => 'Data Kapal', 'path' => 'kapal', 'icon' => 'fas fa-ship'],
        ];
    }
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4"
       style="position: fixed; top: 0; left: 0; height: 100vh; overflow: hidden; width: 250px; z-index: 1030;">
    
     <!-- Brand Logo -->
    <a href="/" class="brand-link d-flex flex-column align-items-center justify-content-center"
       style="height: 300px; padding-top: 15px; padding-bottom: 10px;">
        <img src="{{ asset('templates/dist/img/logo.png') }}" alt="Logo"
             style="width: 250px; height: 250px; object-fit: contain;">
    </a>

    <!-- Sidebar Scrollable Content -->
    <div class="sidebar" style="height: calc(100vh - 70px); overflow-y: auto;">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a href="{{ $menu->path[0] !== '/' ? '/' . $menu->path : $menu->path }}"
                           class="nav-link {{ request()->is(trim($menu->path, '/')) ? 'active' : '' }}">
                            <i class="nav-icon {{ $menu->icon }}"></i>
                            <p>{{ $menu->tittle }}</p>
                        </a>
                    </li>
                @endforeach

                <!-- Logout -->
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-left text-white w-100" style="padding-left: 1rem;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>

