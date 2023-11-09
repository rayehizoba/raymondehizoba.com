@extends('layouts.app')

@section('content')
  @while(have_posts())
    @php
      the_post();
      $title = get_the_title();
    @endphp

    {!! the_content() !!}

    <div class="grid grid-cols-3 space-2 gap-2 p-2">
      <div class="btn-link !h-16 group flex-1 whitespace-nowrap relative">
        <div>Get in touch</div>
        <div class="w-20 h-10 ml-2 overflow-hidden">
          <img
            src="@asset('images/arrow_right.svg')"
            class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0"
            alt=""
          />
        </div>
        <a href="#" target="_blank" class="absolute inset-0 rounded-full"></a>
      </div>
      <div class="btn-link !h-16 group flex-1 whitespace-nowrap relative">
        <div>Start a project</div>
        <div class="w-20 h-10 ml-2 overflow-hidden">
          <img
            src="@asset('images/arrow_right.svg')"
            class="h-full transform-gpu transition ease-in-out duration-300 -translate-x-3 group-hover:translate-x-0"
            alt=""
          />
        </div>
        <a href="#" target="_blank" class="absolute inset-0 rounded-full"></a>
      </div>
      <div class="rounded-2xl p-3 bg-neutral-800/70 backdrop-blur-xl"></div>
    </div>

    @foreach($projects as $project)
      <x-project-item :title="$title" :project="$project" :isFirst="$loop->index === 0"/>
    @endforeach
  @endwhile
@endsection
