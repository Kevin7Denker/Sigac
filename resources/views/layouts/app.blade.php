<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head></head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'SIGAC') }}</title>
<meta name="description" content="Sistema SIGAC - Gestão Acadêmica">


<link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans min-h-screen white flex flex-col">

  @include('layouts.navigation')

  @isset($header)
  <header class="bg-white/90 dark:bg-red-950/80 shadow border-b border-red-100 dark:border-red-800" role="banner">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      {{ $header }}
    </div>
  </header>
  @endisset

  <main class="flex-1 flex flex-col items-center justify-center py-8 px-4" role="main">
    <section class="w-full max-w-6xl   shadow-xl rounded-2xl border border-red-100 dark:border-red-800 p-8">
      {{ $slot }}
    </section>
  </main>


  <footer class="text-center text-xs text-red-900 dark:text-red-200 py-4 opacity-70">
    &copy; {{ date('Y') }} {{ config('Kevin Denker', 'Kevin Denker') }}. Todos os direitos reservados.
  </footer>
</body>

</html>
