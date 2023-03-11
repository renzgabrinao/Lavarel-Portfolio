<x-layout>
  <x-slot name="content">
    <div class="flex flex-col">
      @if ($project)
      <h1 class="text-center font-bold text-xl mb-3">Edit Project: {{ $project->title }}</h1>
      <form method="POST" action="/admin/project/{{ $project->slug }}/edit" enctype="multipart/form-data">
        @method('PATCH')
        @else
        <h1 class="text-center font-bold text-xl mb-3">Create Project</h1>
        <form method="POST" action="/admin/project/create" enctype="multipart/form-data">
          @endif
          @csrf

          <div class="mb-6">
            <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">TITLE</label>
            <input type="text" name="title" id="title" value="{{ old('title') ?? $project?->title }}" required
              class="border border-gray-400 rounded p2 w-full">
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">EXCERPT</label>
            <textarea name="excerpt" id="excerpt" cols="30" rows="3" value="{{ old('excerpt') ?? $project?->excerpt }}"
              required class="p-2"></textarea>
            @error('excerpt')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">BODY</label>
            <textarea name="body" id="body" cols="30" rows="10" value="{{ old('body') ?? $project?->body }}" required
              class="p-2"></textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="url" class="block mb-2 uppercase font-bold text-xs text-gray-700">URL</label>
            <input type="text" name="url" id="url" value="{{ old('url') ?? $project?->url }}"
              class="border border-gray-400 rounded p2 w-full">
            @error('url')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="published_date" class="block mb-2 uppercase font-bold text-xs text-gray-700">
              DATE PUBLISHED
            </label>
            <input type="date" name="published_date" id="published_date"
              value="{{ old('published_date') ?? $project?->published_date }}"
              class="border border-gray-400 rounded p-2 w-full">
            @error('published_date')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
          <select name="category_id" id="category_id" class="mb-2">
            <option value="" selected disabled>Select a Category</option>
            <option value="">None</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
              {{ $category->name }}</option>
            @endforeach
          </select>

          <label for="tags" class="block mb-2 uppercase font-bold text-xs text-gray-700">Tags</label>
          <select name="tags[]" id="tags" multiple="multiple">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" @if (old('tags') && in_array($tag->id, old('tags')))
              selected
              @elseif ($project && $project->tags)
              @foreach ($project->tags as $projectTag)
              @if ($tag->id == $projectTag->id)
              selected
              @endif
              @endforeach
              @endif
              >
              {{ $tag->name }}
            </option>
            @endforeach
          </select>
          @error('tags')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror



          <div class="mb-6">
            <label for="thumb" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
            <input type="file" name="thumb" id="thumb" value="{{ old('thumb') ?? $project?->thumb }}"
              class="border border-gray-400 rounded p2 w-full">
            @error('thumb')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="image" class="block mb-2 uppercase font-bold text-xs text-gray-700">Image</label>
            <input type="file" name="image" id="image" value="{{ old('image') ?? $project?->image }}"
              class="border border-gray-400 rounded p2 w-full">
            @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-6 mt-4">
            <button type="submit" class="bg-green-700 text-white rounded py-2 px-4 hover:bg-green-600">Submit</button>
          </div>
    </div>
  </x-slot>
</x-layout>