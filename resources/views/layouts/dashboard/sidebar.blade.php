<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li> --}}
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                        class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            @if (Auth::user()->role == 'admin')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion ion-cube"
                            data-pack="default" data-tags="box, square, container"></i>
                        <span>Genre</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('genre') ? 'active' : '' }}"><a class="nav-link"
                                href="/genre">Genre</a></li>
                        <li class="{{ request()->is('genre/tambah') ? 'active' : '' }}"><a class="nav-link"
                                href="/genre/tambah">Tambah Genre</a></li>
                    </ul>
                </li>
            @elseif (Auth::user()->role == 'user')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion ion-cube"
                            data-pack="default" data-tags="box, square, container"></i>
                        <span>Post</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('post') ? 'active' : '' }}"><a class="nav-link"
                                href="/post">Post</a></li>
                        <li class="{{ request()->is('post/tambah') ? 'active' : '' }}"><a class="nav-link"
                                href="/post/tambah">Tambah Post</a></li>
                    </ul>
                </li>
            @endif
        </ul>

    </aside>
</div>
