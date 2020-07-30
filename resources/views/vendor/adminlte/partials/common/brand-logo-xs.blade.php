<a href="/" class="brand-link">

    {{-- Small brand logo --}}
    <img src="{{ asset(config('adminlte.logo_img')) }}"
         alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
         class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
         style="opacity:.8">

    {{-- Brand text --}}
    <span class="brand-text font-weight-light">
        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
    </span>

</a>
