<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-400">
  <div class="flex items-center justify-center min-h-screen">
    <form method="POST" action="/register" class="bg-[#202020] border border-white p-6 w-96 rounded-xl">
      @csrf
      <div class="mb-4">
        <label for="nama" class="text-white font-semibold mb-1">Nama</label>
        <input type="text" id="nama" name="name" placeholder="nama"
          class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg"
          required>
      </div>
      <div class="mb-4">
        <label for="email" class=" text-white font-semibold mb-1">Email</label>
        <input type="email" id="email" name="email" placeholder="email"
          class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-white font-semibold mb-1">Password</label>
        <input type="password" id="password" name="password" placeholder="password"
          class="w-full p-2 bg-gray-600 text-white placeholder:text-white outline-none ring:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg">
      </div>

      <div class="flex justify-center">
        <button type="submit"
          class="border px-10 py-1 text-white cursor-pointer bg-blue-600 rounded-lg hover:bg-blue-500">register</button>
      </div>
    </form>
  </div>
</body>

</html>