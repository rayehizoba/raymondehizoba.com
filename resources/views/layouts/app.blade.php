<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

<header class="mx-2 mt-2 overflow-hidden relative sticky top-0 js-fit-group opacity-0 -z-10">
  <div class="absolute inset-x-0 top-1/2 transform -translate-y-1/2">
    <lottie-player src="{{ $siteHeaderLottieSrc }}" background="transparent" loop autoplay></lottie-player>
  </div>
  <div class="bg-black mix-blend-multiply">
    <h1 class="font-display fit transform scale-x-[1.01] -translate-x-px leading-tight !hidden md:!inline-block">
      {{ $siteHeader }}
    </h1>
  </div>
</header>

<main id="main" class="main">
  @yield('content')
</main>

@hasSection('sidebar')
  <aside class="sidebar">
    @yield('sidebar')
  </aside>
@endif

@include('sections.footer')
