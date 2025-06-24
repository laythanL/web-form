<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-600">
  <x-navbar></x-navbar>

  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-[#202020] border-1 p-6 w-full max-w-2xl rounded-xl border-white shadow-xl">
      <h1 class="text-white text-center text-xl mb-2 font-semibold">Tambahkan Data Client</h1>
      <form method="POST" action="{{ route('admin.store-client') }}">
        @csrf

        <div class="mb-4">
          <label for="nama_perusahaan" class="block text-white font-semibold mb-1">Nama Perusahaan</label>
          <input type="text" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan nama perusahaan client"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
          @error('nama_perusahaan')
        <div class="text-red-500 text-sm">{{ $message }}</div>
      @enderror
        </div>

        <div class="mb-4">
          <label for="email" class="block text-white font-semibold mb-1">Email</label>
          <input type="email" id="email" name="email" placeholder="Masukkan email client"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
          @error('email')
        <div class="text-red-500 text-sm">{{ $message }}</div>
      @enderror
        </div>

        <div class="mb-4">
          <label for="no_telepon" class="block text-white font-semibold mb-1">Telepon</label>
          <input type="text" id="no_telepon" name="no_telepon" placeholder="Masukkan nomor telepon"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
          @error('no_telepon')
        <div class="text-red-500 text-sm">{{ $message }}</div>
      @enderror
        </div>

        <div class="mb-4">
          <label for="alamat" class="block text-white font-semibold mb-1">Alamat</label>
          <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat perusahaan"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
          @error('alamat')
        <div class="text-red-500 text-sm">{{ $message }}</div>
      @enderror
        </div>

        <div class="flex justify-center">
          <button type="submit" class="px-10 py-2 text-white cursor-pointer bg-blue-700 rounded-sm hover:bg-blue-500">
            Tambahkan Client
          </button>
        </div>
      </form>
    </div>
  </div>

  <x-footer></x-footer>
</body>

</html>