<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $supports = Support::query(); // ✅ mulai query builder

        if ($search) {
            $supports->where('nama', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('telepon', 'like', '%' . $search . '%');
        }

        $supports = $supports->paginate(9); // ✅ eksekusi query

        return view('admin.dashboard', compact('supports', 'search'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.buat-support');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $support = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'email|required|max:100',
            'telepon' => 'string|required|max:100',
            'alamat' => 'string|required|max:100'
        ], [
            'nama' => 'rwajib di isi nama ',
            'email' => 'wajib di isi email',
            'telepon' => 'wajib di isi nomor telepon ',
            'alamat' => 'wajib di isi alamat '
        ]);

        Support::create($support);

        return redirect()->route('admin.dashboard')->with('berhasil', 'data support berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        return view('admin.edit-support', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'email|nullable|max:100',
            'telepon' => 'string|nullable|max:100',
            'alamat' => 'string|nullable|max:100'
        ]);
        $support->update($validated);

        return redirect()->route('admin.dashboard')->with('berhasil', 'data support berhasil didedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        $support->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
