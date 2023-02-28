<x-layout>
  <x-slot name="content">
    <div class="flex flex-col">
      @if ($tag)
      <h1 class="text-center font-bold text-xl mb-3">Edit Tag: {{ $tag->name }}</h1>
      <form method="POST" action="/admin/tag/{{ $tag->slug }}/edit" enctype="multipart/form-data">
        @method('PATCH')
        @else
        <h1 class="text-center font-bold text-xl mb-3">Create Tag</h1>
        <form method="POST" action="/admin/tag/create" enctype="multipart/form-data">
          @endif
          @csrf

          <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tag Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') ?? $tag?->name }}" required
              class="border border-gray-400 rounded p2 w-full">
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6 mt-4">
            <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
          </div>
    </div>
  </x-slot>
</x-layout>