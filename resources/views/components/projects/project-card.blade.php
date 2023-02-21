@props(['project', 'showBody' => false])

<div class="p-6  bg-white overflow-hidden shadow sm:rounded-lg">
  <div class="text-xl font-bold mb-2">
    <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
  </div>
  <div class="mb-5">{!! $project->excerpt !!}</div>
  @if ($showBody)
  <div class="mb-5">{!! $project->body !!}</div>
  @endif


  @if ($project->category)
  <a href="/categories/{{ $project->category->slug }}">Category: {{ $project->category->name }}</a>
  @endif

</div>