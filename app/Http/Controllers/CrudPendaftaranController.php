<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class CrudPendaftaranController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::all();
        return view('crud.crud-pendaftaran', compact('pendaftarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_daftar' => 'required|unique:pendaftarans,no_daftar',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'jk' => 'required|in:L,P',
        ]);
        Pendaftaran::create($request->all());
        return redirect()->route('crud-pendaftaran.index')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $pendaftarans = Pendaftaran::all();
        $edit = Pendaftaran::findOrFail($id);
        return view('crud.crud-pendaftaran', compact('pendaftarans', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_daftar' => 'required|unique:pendaftarans,no_daftar,'.$id,
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'jk' => 'required|in:L,P',
        ]);
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update($request->all());
        return redirect()->route('crud-pendaftaran.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();
        return redirect()->route('crud-pendaftaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
