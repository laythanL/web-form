@extends('layouts.app')

@section('title', 'admin dashboard')
@section('content')

  <h1 class="text-3xl font-bold text-center text-white mb-6">List Support</h1>
  <div class="flex items-center justify-between">
    <x-toolbar :action="route('admin.dashboard')" />

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
      <div class="flex items-center gap-2 px-3 py-2  group">
      <a href="{{ route('admin.edit-support', $support->id) }}"
      class="text-yellow-400 group-hover:text-yellow-700 transition-colors duration-300">Edit</a>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="size-6 text-yellow-400 group-hover:text-yellow-700 transition-colors duration-300">
      <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
      </svg>
      </div>

      {{-- Tombol Delete pakai form --}}
      <form action="{{ route('admin.delete-support', $support->id) }}" method="POST"
      onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
      @csrf
      @method('DELETE')
      <div class=" flex items-center px-3 py-2  gap-2 group">
      <button type="submit"
      class="text-red-400 group-hover:text-red-700 transition-colors duration-300">Delete</button>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" class="size-6 text-red-400 group-hover:text-red-700 transition-colors duration-500">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
      </svg>
      </div>
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

@endsection