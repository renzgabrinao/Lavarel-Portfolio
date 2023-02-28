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
        <a href="/admin" class="ml-3 text-xs font-bold uppercase">Admin</a>
        @endif
        <a href="/logout" class="ml-3 text-xs font-bold uppercase">Logout</a>
        @else
        <a href="/login" class="ml-3 text-xs font-bold uppercase">Log In</a>
        @endauth
      </div>
    </nav>

  </header>
  <main class="relative flex justify-center min-h-screen bg-gray-200 sm:items-center py-4 sm:pt-0">
    <div class="absolute top-10 left-[calc(50%_-_144px)] w-72 h-9">
      @if (session()->has('success'))

      <p class="h-full text-xs text-center leading-9 font-bold bg-white uppercase border border-green-700 rounded">
        {{ session()->get('success') }}
      </p>

      @elseif (session()->has('error'))

      <p
        class="h-full text-xs text-center leading-9 color-red-500 font-bold bg-white uppercase border border-red-700 rounded">
        {{ session()->get('error') }}
      </p>

      @endif
    </div>
    {{ $content }}
  </main>
  <footer class="h-10 bg-gray-200 border-t-1 border-black">
    <p class="h-full w-full text-center text-xl">&copy;2023 Renz Gabrinao</p>
  </footer>
</body>

</html>