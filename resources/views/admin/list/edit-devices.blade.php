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
      <h1 class="text-white text-center text-xl mb-2 font-semibold ">edit data device </h1>
      @if(session('success'))
      <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
      {{ session('success') }}
      </div>
    @endif
      <form method="POST" action="{{ route('admin.update-device', $device->id) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          {{-- Nama Device --}}
          <div>
            <label for="nama_device" class="block mb-1 font-semibold text-white">Nama Device</label>
            <input type="text" name="nama_device" id="nama_device"
              value="{{ old('nama_device', $device->nama_device) }}"
              class="w-full p-3 bg-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500"
              placeholder="Masukkan nama device">
          </div>

          {{-- Kode Device --}}
          <div>
            <label for="device_code" class="block mb-1 font-semibold text-white">Kode Device</label>
            <input type="text" name="device_code" id="device_code"
              value="{{ old('device_code', $device->device_code) }}"
              class="w-full p-3 bg-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500"
              placeholder="Masukkan kode device">
          </div>

          {{-- Tipe Device --}}
          <div>
            <label for="type" class="block mb-1 font-semibold text-white">Type</label>
            <input type="text" name="type" id="type" value="{{ old('type', $device->type) }}"
              class="w-full p-3 bg-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500"
              placeholder="Masukkan tipe device">
          </div>

          {{-- Lokasi --}}
          <div>
            <label for="location" class="block mb-1 font-semibold text-white">Lokasi</label>
            <input type="text" name="location" id="location" value="{{ old('location', $device->location) }}"
              class="w-full p-3 bg-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500"
              placeholder="Masukkan lokasi device">
          </div>
          
          {{-- Status --}}
          <div class="col-span-2">
            <label for="status" class="block mb-1 font-semibold text-white">Status</label>
            <select name="status" id="status"
              class="w-full p-3 bg-gray-600 text-white rounded-lg focus:ring-2 focus:ring-blue-500">
              <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
              <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
              <option value="rusak" {{ old('status') == 'rusak' ? 'selected' : '' }}>Rusak</option>
              <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            </select>
          </div>
        </div>

        {{-- Tombol --}}
        <div class="mt-8 flex justify-center">
          <button type="submit"
            class="px-10 py-2 bg-blue-700 hover:bg-blue-500 text-white font-semibold rounded-md transition">
            Tambahkan Device
          </button>
        </div>
      </form>
    </div>
  </div>

  <x-footer></x-footer>

</body>

</html>