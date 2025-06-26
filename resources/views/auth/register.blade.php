<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')

</head>

<body class="bg-[#111111] flex items-center justify-center min-h-screen">
  <div class="bg-[#202020] border-1 p-6 w-96 rounded-xl border-white shadow-xl">
    <h1 class="text-white text-center text-xl mb-2 font-semibold ">Buat akaun</h1>
    <form method="POST" action="/register">
      @csrf
      <div class="mb-4">
        <label for="nama" class="block text-white font-semibold mb-2">Nama</label>
        <input type="text" id="nama" name="name" placeholder="nama"
          class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
        @error('name')
      <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
      </div>
      <div class="mb-4">
        <label for="email" class="block text-white font-semibold mb-2">Email</label>
        <input type="email" id="email" name="email" placeholder="email"
          class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
        @error('email')
      <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="block text-white font-semibold mb-2">Password</label>
        <input type="password" id="password" name="password" placeholder="password"
          class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none ring:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
        @error('password')
      <div class="text-red-500 text-sm">{{ $message }}</div>
    @enderror
      </div>

      <div class="flex justify-center">
        <button type="submit"
          class="w-full px-10 py-2 text-white cursor-pointer bg-black rounded-sm hover:bg-white hover:text-black transition-colors duration-500 ease-out">buat
          akun</button>
      </div>
      <div class="text-white flex justify-center items-center my-[16px]">
        <span class="border border-white w-2/2"></span>
        <h1 class="mx-2">OR</h1>
        <span class="border border-white w-2/2"></span>
      </div>
      <div class="flex justify-center">
        <a href="{{route('login')}}"
          class="w-full px-10 py-2 text-white cursor-pointer bg-black rounded-sm hover:bg-blue-500 text-center transition-colors duration-500 ease-out">login</a>
      </div>
    </form>
  </div>
</body>

</html>