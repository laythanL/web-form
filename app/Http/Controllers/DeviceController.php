<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $devices = Device::query();

        if ($search) {
            $devices->where('nama_device', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%');
        }

        $devices = $devices->paginate(9);
        return view('admin.list.list-device', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $supports = Support::all(); // Ambil semua user dari tabel supports
        return view('admin.list.buat-device', compact('supports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $device = $request->validate([
            'nama_device' => 'required|string|max:255',
            'device_code' => 'required|string|max:100|unique:devices',
            'type' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,tidak_aktif,rusak,dipinjam',
            'assigned_to' => 'nullable|exists:supports,id',
        ], [
            'nama_device' => 'wajib di isi nama device',
            'device_code' => 'wajib di isi device code',
            'status' => 'wajib di pilih',
        ]);

        Device::create($request->all());
        return redirect()->route('admin.list')->with('success', 'Device berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view('admin.list.edit-devices', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        $validated = $request->validate([
            'nama_device' => 'required|string|max:255',
            'device_code' => 'required|string|max:100|unique:devices,device_code,' . $device->id,
            'type' => 'required|string|max:100',
            'location' => 'nullable|string|max:100',
            'status' => 'required|in:aktif,tidak_aktif,rusak,dipinjam',
            'assigned_to' => 'nullable|exists:users,id',
            'description' => 'nullable|string',
        ]);

        $device->update($validated);

        return redirect()->route('admin.list')->with('success', 'Device berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('admin.list')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
