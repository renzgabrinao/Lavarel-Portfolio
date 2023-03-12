<x-layout>
  <x-slot name="content">
    <div class="flex flex-col w-4/5 xl:w-3/5">

      <h1 class="mt-6 text-center font-bold text-5xl text-white">ADMIN</h1>
      <div class="mt-6 w-full flex flex-col justify-evenly items-center">
        <section class="w-full bg-slate-800 text-white border-none rounded-lg p-5 mb-6 shadow-lg">

          <div class="flex flex-row justify-between mb-3 p-2">
            <h2 class="leading-10 text-2xl">Projects</h2>
            <a class="leading-10 w-1/3 bg-green-700 rounded-md  text-center" href="/admin/project/create">Create Project
            </a>
          </div>

          <ul>
            @foreach ($projects as $project)
            <li class="flex flex-row justify-between odd:bg-slate-700 p-2">
              {{$project['title']}}
              <div>
                <a class="hover:underline" href="/admin/project/{{$project->slug}}/edit">Edit <i
                    class="fa-regular fa-pen-to-square"></i></a>
                <form method="POST" action="/admin/project/{{$project->slug}}/delete" class="inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-red-500 ml-3 hover:underline">
                    Delete <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </li>
            @endforeach
          </ul>

        </section>

        <section class="w-full bg-slate-800 text-white border-none rounded-lg p-5 mb-5 shadow-lg">

          <div class="flex flex-row justify-between mb-3 p-2">
            <h2 class="leading-10 text-2xl">Categories</h2>
            <a class="leading-10 w-1/3 bg-green-700 rounded-md text-center" href="/admin/category/create">
              Create Category
            </a>
          </div>

          <ul>
            @foreach ($categories as $category)
            <li class="flex flex-row justify-between odd:bg-slate-700 p-2">
              {{$category['name']}}

              <div>
                <a class="hover:underline" href="/admin/category/{{$category->slug}}/edit">Edit <i
                    class="fa-regular fa-pen-to-square"></i></a>
                <form method="POST" action="/admin/category/{{$category->slug}}/delete" class="inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-red-500 ml-3 hover:underline">
                    Delete <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </li>
            @endforeach
          </ul>

        </section>

        <section class="w-full bg-slate-800 text-white border-none rounded-lg p-5 mb-5 shadow-lg">

          <div class="flex flex-row justify-between mb-3 p-2">
            <h2 class="leading-10 text-2xl">Tags</h2>
            <a class="leading-10 w-1/3 bg-green-700 rounded-md text-center" href="/admin/tag/create">
              Create Tag
            </a>
          </div>

          <ul>
            @foreach ($tags as $tag)
            <li class="flex flex-row justify-between odd:bg-slate-700 p-2">
              {{$tag['name']}}

              <div>
                <a class="hover:underline" href="/admin/tag/{{$tag->slug}}/edit">Edit <i
                    class="fa-regular fa-pen-to-square"></i></a>
                <form method="POST" action="/admin/tag/{{$tag->slug}}/delete" class="inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-red-500 ml-3 hover:underline">
                    Delete <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
              </div>
            </li>
            @endforeach
          </ul>

        </section>

        <section class="w-full bg-slate-800 text-white border-none rounded-lg p-5 mb-6 shadow-lg">

          <div class="flex flex-row justify-between mb-3 p-2">
            <h2 class="leading-10 text-2xl">Users</h2>
            <a class="leading-10 w-1/3 bg-green-700 rounded-md text-center" href="/admin/user/create">
              Create User
            </a>
          </div>

          <ul>
            @foreach ($users as $user)
            <li class="flex flex-row justify-between odd:bg-slate-700 p-2">
              {{$user['email']}}

              <div>
                <a class="hover:underline" href="/admin/user/{{$user->name}}/edit">Edit <i
                    class="fa-regular fa-pen-to-square"></i></a>
                @if($user != $currentUser)
                <form method="POST" action="/admin/user/{{$user->name}}/delete" class="inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-red-500 ml-3 hover:underline">
                    Delete <i class="fa-solid fa-trash"></i>
                  </button>
                </form>
                @endif
              </div>
            </li>
            @endforeach
          </ul>

        </section>

      </div>
    </div>
  </x-slot>
</x-layout>