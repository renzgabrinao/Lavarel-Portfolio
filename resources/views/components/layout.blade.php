<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>
  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Styles -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/5c4bcdf4b6.js" crossorigin="anonymous"></script>
</head>

<body class="antialiased">
  <header class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
      <div>
        <a href="/" class="text-s font-bold uppercase">Home</a>
        <a href="/projects" class="ml-3 text-xs font-bold uppercase">Projects</a>
        <a href="/about" class="ml-3 text-xs font-bold uppercase">About</a>
      </div>
      <div class="mt-4 md:mt-0">
        @auth
        <span class="text-xs font-bold uppercase"> {{ auth()->user()->name }} </span>
        @if (auth()->user()->isAdmin())
        <a href="/admin/projects" class="ml-3 text-xs font-bold uppercase">Admin</a>
        @endif
        <a href="/logout" class="ml-3 text-xs font-bold uppercase">Logout</a>
        @else
        <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
        @endauth
      </div>
    </nav>

  </header>
  <main class="relative flex justify-center min-h-screen bg-gray-200 sm:items-center py-4 sm:pt-0">
    <div class="absolute top-10 left-[calc(50%_-_150px)]">
      @if (session()->has('success'))
      <div class="flex justify-center items-center bg-gray-100 w-300">
        <p class="text-xs font-bold bg-white uppercase border border-green-700 rounded px-4 py-2">
          {{ session()->get('success') }}
        </p>
      </div>
      @elseif (session()->has('error'))
      <div class="flex justify-center items-center bg-gray-100 w-300">
        <p class="text-xs color-red-500 font-bold bg-white uppercase border border-red-700 rounded px-4 py-2">
          {{ session()->get('error') }}
        </p>
      </div>
      @endif
    </div>
    {{ $content }}
  </main>
  <footer class="h-12 bg-gray-200 border-t-1 border-black">
    <p class="m-auto">&copy;2023 Renz Gabrinao</p>
  </footer>
</body>

</html>