@props(['project', 'projects_tags', 'tags', 'showBody' => false])


<div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
  <div class="text-xl font-bold mb-2">
    <a href="/projects/{{ $project->slug }}">{{ $project->title }}</a>
  </div>
  @if ($showBody)
  <img src="{{ asset('storage/images/graph-placeholder.jpg') }}" alt="Placeholder image">
  @endif


  <div class="mb-5">
    @if (! $showBody)
    <img src="{{ asset('storage/images/laptop-thumb.png') }}" alt="Placeholder image">
    @endif
    {!! $project->excerpt !!}
  </div>

  @if ($showBody)
  <div class="mb-5">{!! $project->body !!}</div>
  @endif

  @if ($project->category)
  <div>
    Category:
    <a href="/categories/{{ $project->category->slug }}">{{ $project->category->name }}</a>
  </div>

  @endif
  @if (count($project->tags))
  <div>
    Tags:
    @foreach ($project->tags as $tag)
    <a href="/projects/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
    @endforeach
  </div>
  @endif

</div>