<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buat alat</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-600 ">
  <x-navbar></x-navbar>
  <div class="flex items-center justify-center min-h-screen">
    <div class="bg-[#202020] border-1 p-6 w-full max-w-lg rounded-xl border-white shadow-xl">
      <h1 class="text-white text-center text-xl mb-2 font-semibold ">edit data support </h1>
      <form method="POST" action="{{ route('admin.update-support', $support->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label for="nama" class="block text-white font-semibold mb-1">Nama</label>
          <input type="text" id="nama" name="nama" placeholder="edit nama staf"
            value="{{ old('nama', $support->nama) }}"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-gray-300 outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-white font-semibold mb-1">Email</label>
          <input type="email" id="email" name="email" placeholder="edit eamail staf"
            value="{{ old('nama', $support->email) }}"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-gray-300 outline-none ring:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="telepon" class="block text-white font-semibold mb-1">Telepon</label>
          <input type="text" id="telepon" name="telepon" placeholder="edit nomor telepon staf"
            value="{{ old('nama', $support->telepon) }}"
            class="w-full p-2 bg-gray-600 text-white placeholder:text-gray-300 outline-none ring:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
        </div>
        <div class="mb-4">
          <label for="alamat" class="block text-white font-semibold mb-1">Alamat</label>
          <textarea placeholder="masukkan alamat support" name="alamat" id="alamat"
            class="w-full p-2 bg-gray-600 rounded-lg text-white placeholder:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 ">{{ old('nama', $support->alamat) }}</textarea>
        </div>
        <div class="flex justify-center">
          <button type="submit"
            class=" px-10 py-2 text-white cursor-pointer bg-blue-700 rounded-lg hover:bg-blue-400 transition-colors duration-300">edit data support</button>
        </div>
      </form>
    </div>
  </div>

  <x-footer></x-footer>
</body>

</html>