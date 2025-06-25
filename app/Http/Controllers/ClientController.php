<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clients = client::query();

        if ($search) {
            $clients->where('nama_perusahaan', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $clients = $clients->paginate(9);
        return view('admin.client.list-client', compact('clients'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.client.buat-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|string|max:100|unique:clients,email',
            'no_telepon' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:100',
        ],[
            'nama_perusahaan' => 'wajib di isi ',
            'email' => 'wajib di isi email',
            'no_telepon' => 'wajib di isi nomor telepon',
        ]);

        Client::create($validated);

        return redirect()->route('admin.list-client')->with('success', 'Client berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit-client', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|string|max:100|unique:clients,email,' . $client->id,
            'no_telepon' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:100',
        ]);

        $client->update($validated);

        return redirect()->route('admin.list-client')->with('success', 'Client berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $client->delete();
        return redirect()->route('admin.list-client')->with('success', 'Perusahaan berhasil dihapus.');
    }
}
