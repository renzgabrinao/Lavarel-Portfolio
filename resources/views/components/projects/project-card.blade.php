@props(['project', 'projects_tags', 'tags', 'showBody' => false])


<div class="p-6 bg-slate-800 overflow-hidden shadow-lg rounded-2xl text-white outline outline-slate-600">
  <div class="text-4xl text-center font-bold mb-5 font-sans text-slate-100 hover:text-slate-300">
    <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
  </div>
  @if ($showBody)
  <div class="px-32">
    <img class="rounded-2xl" src="
    @if ($project->image)
    {{ asset('storage/' . $project->image) }}
    @else
    {{ asset('storage/images/image-placeholder.jpg') }}
    @endif" alt="Placeholder image">
  </div>
  @endif


  <div class="mb-5 flex justify-center items-center">
    @if (! $showBody)
    <a class="inline-block mx-auto" href="/projects/{{ $project->slug }}">
      <img class="hover:scale-105 rounded-lg" src="
      @if($project->thumb)
      {{ asset('storage/' . $project->thumb) }}
      @else 
      {{ asset('storage/images/thumb-placeholder.png') }}
      @endif" alt="Placeholder image">
    </a>
    @endif
  </div>

  <p class="text-justify px-4 sm:px-8 md:px-12 lg:px-20 my-7 sm:text-2xl">
    {!! $project->excerpt !!}
  </p>

  @if ($showBody)
  <div class="my-5 px-20  text-lg">{!! $project->body !!}</div>
  @endif

  @if ($project->category)
  <div class="px-4 sm:px-8 md:px-12 lg:px-20 text-sm mt-auto">
    Category:
    <a class="hover:underline" href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a>
  </div>

  @endif
  @if (count($project->tags))
  <div class="px-4 sm:px-8 md:px-12 lg:px-20 text-sm">
    Tags:
    @foreach ($project->tags as $tag)
    <a class="hover:underline" href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
    @endforeach
  </div>
  @endif

</div>