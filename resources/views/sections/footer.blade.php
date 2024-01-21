<footer class="content-info space-y-2">
  <section class="px-2 grid gap-2 md:grid-cols-6">
    <div class="rounded-2xl bg-neutral-800/70 backdrop-blur-xl h-20 md:h-auto"></div>
    <a target="_blank" class="md:col-span-2 xl:col-span-3 btn-link group whitespace-nowrap" href="https://docs.google.com/document/d/1KbM7c5e_sqq2gDrfPAuwa73zRTOt_IqJKf3lbx2k5fg/edit?usp=sharing">
      <span>View more on my CV</span>
      <span class="w-20 h-10 ml-2 overflow-hidden">
          <img src="images/arrow_right.svg" class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0" alt="">
      </span>
    </a>
    <a target="_blank" class="md:col-span-2 xl:col-span-1 btn-link group whitespace-nowrap" href="mailto://rayehizoba@gmail.com">
      <span>👋 &nbsp; Say Hello</span>
      <span class="w-20 h-10 ml-2 overflow-hidden">
          <img src="images/arrow_right.svg" class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0" alt="">
      </span>
    </a>
    <div class="rounded-2xl bg-neutral-800/70 backdrop-blur-xl"></div>
  </section>

  <section class="px-2 space-y-2">
    @php(dynamic_sidebar('sidebar-footer'))
  </section>

  <div class="text-transparent mb-5">
    <h1 class="font-display fit leading-tight !hidden md:!inline-block">
      {{ $siteHeader }}
    </h1>
  </div>
</footer>

<footer
  class="banner px-2 py-6 flex flex-col space-y-3 lg:space-y-0 lg:flex-row lg:items-center lg:justify-between font-medium text-lg text-gray-500 tracking-wide">
  <div class="grid grid-cols-2 lg:w-1/2">
    <a class="brand" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>
    <div id="currentYear" class="text-gray-700">
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
</footer>

<script>
  const currentYear = new Date().getFullYear();
  document.getElementById('currentYear').textContent = '©' + currentYear;
</script>
