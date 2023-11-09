<header
  class="banner px-2 flex flex-col space-y-3 lg:space-y-0 lg:flex-row lg:items-center lg:justify-between font-medium text-lg text-gray-500 tracking-wide">
  <div class="grid grid-cols-2 lg:w-1/2">
    <a class="brand" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>
    <div class="text-gray-700">
      {{ $siteDescription }}
    </div>
  </div>
  @if (has_nav_menu('primary_navigation'))
    <nav
      class="nav-primary lg:w-1/2"
      aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}"
    >
      {!! wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'menu_class' => 'hidden lg:flex justify-between space-x-5 lg:space-x-0 whitespace-nowrap',
        'echo' => false
      ]) !!}
    </nav>
  @endif
</header>
