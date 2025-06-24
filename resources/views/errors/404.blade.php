<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-black text-white flex flex-col justify-center items-center min-h-screen px-4">
  <div class="mb-6">
    <img src="{{ asset('image/jpn - Copy.png') }}" alt="Logo" class="w-32 md:w-40 drop-shadow-lg">
  </div>

  <div class="text-center">
    <h1 class="text-9xl font-extrabold text-red-500 drop-shadow-md">404</h1>
    <p class="text-5xl mt-4 text-white">Oops! Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ url('/') }}"
      class="mt-6 inline-block bg-blue-600 hover:bg-blue-400 transition-colors duration-300 text-white font-medium py-2 px-6 rounded-full shadow-lg">
      Kembali ke Beranda
    </a>
  </div>
</body>

</html>