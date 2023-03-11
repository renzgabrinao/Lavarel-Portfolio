<x-layout>
  <x-slot name="content">
    <a class="absolute top-3 left-3 underline hover:underline-offset-2 text-white" href="http://localhost/projects">
      Back to Projects
    </a>
    <div class="mt-6">
      <section class="">
        <x-projects.project-card :project="$project" :showBody="true" />
      </section>
    </div>

  </x-slot>
</x-layout>