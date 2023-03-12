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
  <header class="px-6 py-8 bg-slate-700">
    <nav class="flex flex-col sm:flex-row justify-between items-center text-slate-100 ">
      <div>
        <a href="/" class="text-2xl font-bold uppercase hover:text-slate-300">Home</a>
        <a href="/projects" class="ml-4 text-xl font-bold uppercase hover:text-slate-300">Projects</a>
        <a href="/about" class="ml-4 text-xl font-bold uppercase hover:text-slate-300">About</a>
      </div>
      <div class="">
        @auth
        <span class="text-xl font-bold uppercase"> {{ auth()->user()->name }} </span>
        @if (auth()->user()->isAdmin())
        <a href="/admin" class="ml-4 text-xl font-bold uppercase hover:text-slate-300">Admin</a>
        @endif
        <a href="/logout" class="ml-4 text-xl font-bold uppercase hover:text-slate-300">Logout</a>
        @else
        <a href="/login" class="ml-4 text-xl font-bold uppercase hover:text-slate-300">Log In</a>
        @endauth
      </div>
    </nav>

  </header>
  <main class="relative flex justify-center min-h-screen bg-slate-900 sm:items-center p-5 sm:p-10">
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
  <footer class="h-10 bg-slate-900 border-t-1 border-black">
    <p class="h-full w-full text-center text-xs leading-10 text-white">&copy;2023 Renz Gabrinao</p>
  </footer>
</body>

</html>