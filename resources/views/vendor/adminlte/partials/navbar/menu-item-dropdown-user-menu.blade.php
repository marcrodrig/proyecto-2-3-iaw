<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                 class="user-image img-circle elevation-2"
                 alt="{{ Auth::user()->name }}">
        @endif
        <span @if(config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
            {{ Auth::user()->name }}
        </span>
        <span><i class="fas fa-caret-down"></i></span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- User menu header --}}
        <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
            @if(!config('adminlte.usermenu_image')) h-auto @endif">
            @if(config('adminlte.usermenu_image'))
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                        class="img-circle elevation-2"
                        alt="{{ Auth::user()->name }}">
            @endif
            <p class="mt-0"> {{ Auth::user()->username }} </p>
            <p class="mt-0"> {{ Auth::user()->email }} </p>
        </li>
        
        {{-- User menu body --}}
        <li>
            <a href="{{ route('users.edit', Auth::user()) }}" class="btn btn-default btn-flat float-right btn-block">
                <i class="fa fa-fw fa-user"></i>
                Perfil
            </a>
        </li>

        {{-- User menu footer --}}
        <li class="user-footer">
            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat float-right btn-block">
                <i class="fa fa-fw fa-power-off"></i>
                {{ __('Logout') }}
            </a>
        </li>

    </ul>

</li>