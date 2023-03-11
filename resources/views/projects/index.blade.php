<x-layout>
  <x-slot name="content">
    @if ($category)
    <a class="absolute top-3 left-3 underline hover:underline-offset-2 text-white" href="http://localhost/projects">
      Back to Projects
    </a>
    <div class="absolute top-20 text-2xl">{{ $category }} Projects</div>
    @endif
    <div class="mt-6">
      <section class="grid grid-cols-1 md:grid-cols-2 gap-2">

        @foreach ($projects as $project)
        <x-projects.project-card :$project />
        @endforeach

      </section>

      @if (count($projects))
      <div class="text-xs w-full text-right text-white">{{ count($projects) }} projects to peep.</div>
      @else
      <div>Nothing to showcase, yet.</div>
      @endif

    </div>
  </x-slot>
</x-layout>