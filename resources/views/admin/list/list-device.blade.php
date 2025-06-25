@extends('layouts.app')

@section('title', 'list device')

@section('content')



  <h1 class="text-3xl font-bold text-center text-white mb-6">liST DEVICE</h1>
  <div class="flex items-center justify-between">
    <x-toolbar action="{{ route('admin.list') }}" />
    <a href="{{ route('admin.buat-device') }}"
    class="inline-block text-white rounded-lg py-2 px-10 bg-black  cursor-pointer my-5 border border-white">
    tambah device
    </a>
  </div>
  <div class="overflow-x-auto bg-white shadow-md rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-100">
      <tr>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">#</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">nama device</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Kode </th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Type</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Status</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Dipakai</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Lokasi</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      @forelse ($devices as $index => $device)
      <tr>
      <td class="px-4 py-2 text-sm text-gray-800">{{ $index + 1 }}</td>
      <td class="px-4 py-2 text-sm text-gray-800">{{ $device->nama_device }}</td>
      <td class="px-4 py-2 text-sm text-gray-800">{{ $device->device_code }}</td>
      <td class="px-4 py-2 text-sm text-gray-800">{{ $device->type }}</td>
      <td class="px-4 py-2 text-sm text-gray-800 capitalize">{{ $device->status }}</td>
      <td class="px-4 py-2 text-sm text-gray-800 capitalize">{{ $device->assignedUser->nama ?? '-' }}</td>
      <td class="px-4 py-2 text-sm text-gray-800">{{ $device->location ?? '-' }}</td>
      <td class="px-4 py-2 text-sm">
      <a href="{{ route('admin.update-device', $device->id) }}"
      class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
      <form action="{{ route('admin.delete-device', $device->id) }}" method="POST" class="inline">
      @csrf
      @method('DELETE')
      <button onclick="return confirm('Yakin ingin hapus?')"
        class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
      </form>
      </td>
      </tr>
    @empty
      <tr>
      <td colspan="9" class="px-4 py-4 text-center text-gray-500">Data device kosong.</td>
      </tr>
    @endforelse
    </tbody>
    </table>
  </div>


@endsection