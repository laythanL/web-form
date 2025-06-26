<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>@yield('title', 'layoute')</title>
</head>

<body>

  <x-navbar></x-navbar>

  <main class="bg-[#111111]">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
      <div class="w-full max-w-6xl bg-[#202020] rounded-2xl shadow-lg p-8 border-white border-1">
        @yield('content')
      </div>
    </div>
  </main>


  <x-footer></x-footer>
</body>

</html>