<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>admin dashboard</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-600">
  <x-navbar></x-navbar>


  <div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-6xl bg-[#202020] rounded-2xl shadow-lg p-8">
      <h1 class="text-3xl font-bold text-center text-white mb-6">List Support</h1>
      <div class="flex items-center justify-between">
        <x-toolbar :action="route('admin.dashboard')"  />

        <a href="{{ route('admin.buat-support') }}"
          class="inline-block text-white rounded-lg py-2 px-10 bg-black hover:bg-white  hover:text-black transition-all duration-200 cursor-pointer my-5 border border-white">
          tambah support
        </a>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @forelse ($supports as $index => $support)
      <div
        class="bg-[#111111] rounded-xl shadow-lg p-4 border border-white/[0.2] hover:transform hover:-translate-x-1 hover:shadow-[-8px_0_25px_rgba(74,158,255,0.3)] hover:border-[#4a9eff] transition-all duration-[300ms] cursor-pointer">
        <h3 class="text-xl font-semibold text-white">{{ $support->nama }}</h3>
        <p class="text-lg text-gray-400 p-2">{{ $support->email }}</p>
        <p class="text-sm text-blue-400 py-2"> <i class="fa-solid fa-phone"></i> {{ $support->telepon }}</p>
        <p class="text-sm text-gray-300 py-2"><i class="fa-solid fa-house"></i> {{ $support->alamat }}</p>

        <div class="flex gap-2 mt-3">
        {{-- Tombol Edit --}}
        <a href="{{ route('admin.edit-support', $support->id) }}"
          class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-2 rounded">Edit</a>

        {{-- Tombol Delete pakai form --}}
        <form action="{{ route('admin.delete-support', $support->id) }}" method="POST"
          onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded">Delete</button>
        </form>
        </div>

      </div>
    @empty
      <div class="col-span-3 text-center text-gray-300">Tidak ada data support.</div>
    @endforelse
      </div>

      {{-- PAGINATION --}}
      <div class="mt-6 text-center">
        {{ $supports->withQueryString()->links() }}
      </div>

    </div>
  </div>



  <x-footer></x-footer>
</body>

</html>