<section class="gap-2 grid mb-2">
  <div class="mx-2 rounded-2xl p-3 bg-neutral-800/70 backdrop-blur-xl">
    <h1 class="text-2xl lg:text-4xl">
      @if($isFirst)
        {{ $title }}
      @else
        &nbsp;
      @endif
    </h1>
    <p class="text-2xl lg:text-4xl text-gray-500 mt-20">
      {{ $project->start_year }}{{ $project->end_year ? '—'.$project->end_year : '' }}
    </p>
  </div>
  <div class="mx-2 grid grid-cols-1 lg:grid-cols-4 gap-y-2 lg:gap-2">
    <div class="lg:row-span-2 rounded-2xl p-3 bg-neutral-800/70 backdrop-blur-xl">
      <h1 class="text-2xl lg:text-4xl max-w-80">
        {{ $project->title }}
      </h1>
    </div>
    <div class="lg:col-span-2 rounded-2xl p-3 bg-neutral-800/70 backdrop-blur-xl min-h-[10rem]">
      <p class="text-xl text-gray-400 leading-tight">
        {{ $project->description }}
      </p>
    </div>
    <div class="lg:row-span-2 rounded-2xl p-3 bg-neutral-800/70 backdrop-blur-xl">
      <ul class="text-xl text-gray-500/50 font-mono">
        @foreach($project->tags as $tag)
          <li class="gap-1 flex cursor-default group hover:text-gray-300/50">
            <div class="h-5 w-5 rounded-full border-2 border-gray-500/50 mt-1 group-hover:bg-gray-300/50"></div>
            <span>{{ $tag->name }}</span>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="lg:col-span-2 flex items-end gap-2">
      <div class="flex-1 flex flex-wrap gap-2">
        @foreach($project->links as $link)
          <div class="btn-link group flex-1 whitespace-nowrap relative">
            <div>{{ $link['title'] }}</div>
            <div class="w-20 h-10 ml-2 overflow-hidden">
              <img
                src="@asset('images/arrow_right.svg')"
                class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0"
                alt=""
              />
            </div>
            <a href="{{ $link['url'] }}" target="_blank" class="absolute inset-0 rounded-full"></a>
          </div>
        @endforeach
      </div>
      <div class="grid grid-cols-2 gap-2 z-10">
        <div class="relative">
          <div class="btn-rounded group js-splide-prev-{{ $project->id }}">
            <div
              class="w-10 h-8 transform rotate-180 -translate-x-3 group-hover:-translate-x-1 transition ease-in-out duration-300 overflow-hidden">
              <img
                src="@asset('images/arrow_right.svg')"
                class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="relative">
          <div class="btn-rounded group js-splide-next-{{ $project->id }}">
            <div
              class="w-10 h-8 transform translate-x-3 group-hover:translate-x-1 transition ease-in-out duration-300 overflow-hidden">
              <img
                src="@asset('images/arrow_right.svg')"
                class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Project Carousel -->
  <section class="splide js-splide-{{ $project->id }} w-full cursor-grab" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
      <ul class="splide__list">
      </ul>
    </div>
  </section>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const selector = '.js-splide-{{ $project->id }}';
    const splide = new Splide(selector, {
      // lazyLoad: 'nearby',
      rewind: true,
      padding: '0.5rem',
      drag: 'free',
      snap: true,
      height: '80vh',
      autoWidth: true,
      arrows: false,
      pagination: false,
      breakpoints: {
        640: {
          snap: false,
          height: '75vh',
        },
      }
    });

    splide.mount();
    @foreach($project->slides as $slide)
    splide.add(
      '<li class="splide__slide mr-2">' +
      '<img class="h-full rounded-2xl bg-neutral-800/70 backdrop-blur-xl" src="{{ $slide }}" data-splide-lazy="{{ $slide }}" alt=""/>' +
      '</li>'
    );
    @endforeach

    // Get the button element by its ID
    const buttonPrev = document.querySelector('.js-splide-prev-{{ $project->id }}');
    const buttonNext = document.querySelector('.js-splide-next-{{ $project->id }}');

    // Attach the "onclick" event handler to the button
    buttonPrev.onclick = function () {
      splide.go('<');
    };
    buttonNext.onclick = function () {
      splide.go('>');
    };
  });
</script>
