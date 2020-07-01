<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials\navbar.menu-item-left-sidebar-toggler')

    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">

        {{-- User menu link --}}
        @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')

    </ul>

</nav>
