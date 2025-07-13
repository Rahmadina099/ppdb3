<?php
// app/Http/Controllers/PendaftaranController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function pendaftaran()
    {
        return view('pendaftaran.pendaftaran');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_daftar' => 'required|unique:pendaftarans,no_daftar',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'jk' => 'required|in:L,P',
        ]);

        Pendaftaran::create($validated);

        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil disimpan!');
    }
}