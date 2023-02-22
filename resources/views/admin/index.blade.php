<x-layout>
  <x-slot name="content">
    <div class="flex flex-col h-screen w-4/5 xl:w-3/5">
      <h1 class="mt-6 text-center font-bold text-5xl">ADMIN</h1>
      <div class="mt-6 w-full flex flex-col justify-evenly items-center">
        <section class="w-full bg-white border-none rounded-lg p-5 mb-6 mb-0">
          <div class="flex flex-row justify-between mb-5 h-10">
            <h2 class="leading-10">Projects</h2>
            <a class="leading-10 w-1/3 bg-green-700 rounded-md text-white text-center" href="#">Create Project</a>
          </div>
          <ul>
            @foreach ($projects as $project)
            <li class="flex flex-row justify-between odd:bg-gray-200 pl-2 pr-2 h-7">
              {{$project['title']}}
              <div>
                <a href="/admin/projects/{{$project}}/edit">Edit <i class="fa-regular fa-pen-to-square"></i></a>
                <a href="/admin/projects/{{$project}}/delete" class="text-red-600">Delete <i
                    class="fa-thin fa-trash-can"></i></a>
              </div>
            </li>
            @endforeach
          </ul>
        </section>
        <section class="w-full bg-white border-none rounded-lg p-5">
          <div class="flex flex-row justify-between mb-5 h-10">
            <h2 class="leading-10">Users</h2>
            <a class="leading-10 w-1/3 bg-green-700 rounded-md text-white text-center" href="#">Create User</a>
          </div>
          <ul>
            @foreach ($users as $user)
            <li class="flex flex-row justify-between odd:bg-gray-200 pl-2 pr-2 h-7">
              {{$user['email']}}
              <div>
                <a href="/admin/projects/{{$user}}/edit">Edit <i class="fa-regular fa-pen-to-square"></i></a>
                <a href="/admin/projects/{{$user}}/delete" class="text-red-600">Delete <i
                    class="fa-thin fa-trash-can"></i></a>
              </div>
            </li>
            @endforeach
          </ul>
        </section>

        {{-- <section class="">

          @foreach ($users as $user)
          <div>{{$user}}</div>
          @endforeach

        </section> --}}

      </div>
    </div>
  </x-slot>
</x-layout>