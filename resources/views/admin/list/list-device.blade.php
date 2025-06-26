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


  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @forelse ($devices as $index => $device)
    <div
    class="bg-[#111111] rounded-xl shadow-lg p-4 border border-white/[0.2] hover:transform hover:-translate-x-1 hover:shadow-[-8px_0_25px_rgba(74,158,255,0.3)] hover:border-[#4a9eff] transition-all duration-[300ms] cursor-pointer">
    <h3 class="text-xl font-semibold text-white">{{ $device->nama_device }}</h3>
    <p class="text-md text-gray-400 py-1">{{ $device->device_code }}</p>
    <p class="text-sm text-blue-400 py-2"> <i class="fa-solid fa-phone"></i> {{ $device->type }}</p>
    <p class="text-sm text-gray-300 py-1"><i class="fa-solid fa-house"></i> {{ $device->status }}</p>
    </div>
    @empty
    <div class="col-span-3 text-center text-gray-300">Tidak ada data support.</div>
    @endforelse
  </div>

  <a href="{{ route('admin.update-device', $device->id) }}"
    class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
  <form action="{{ route('admin.delete-device', $device->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Yakin ingin hapus?')"
      class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
  </form>
@endsection