{{-- filepath: resources/views/crud/crud-pendaftaran.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-tasks"></i> Data Pendaftaran</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Tambah/Edit --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            {{ isset($edit) ? 'Edit Data Pendaftaran' : 'Tambah Data Pendaftaran' }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($edit) ? route('crud-pendaftaran.update', $edit->id) : route('crud-pendaftaran.store') }}">
                @csrf
                @if(isset($edit))
                    @method('PUT')
                @endif
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>No Pendaftaran</label>
                        <input type="text" name="no_daftar" class="form-control" required value="{{ old('no_daftar', $edit->no_daftar ?? '') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required value="{{ old('nama', $edit->nama ?? '') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required value="{{ old('alamat', $edit->alamat ?? '') }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" required value="{{ old('jurusan', $edit->jurusan ?? '') }}">
                    </div>
                    <div class="form-group col-md-1">
                        <label>JK</label>
                        <select name="jk" class="form-control" required>
                            <option value="">-</option>
                            <option value="L" {{ old('jk', $edit->jk ?? '') == 'L' ? 'selected' : '' }}>L</option>
                            <option value="P" {{ old('jk', $edit->jk ?? '') == 'P' ? 'selected' : '' }}>P</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">
                    {{ isset($edit) ? 'Update' : 'Tambah' }}
                </button>
                @if(isset($edit))
                    <a href="{{ route('crud-pendaftaran.index') }}" class="btn btn-secondary">Batal</a>
                @endif
            </form>
        </div>
    </div>

    {{-- Tabel Data --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white">Tabel Data Pendaftaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>No Pendaftaran</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>JK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftarans as $i => $p)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $p->no_daftar }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->jurusan }}</td>
                            <td>{{ $p->jk }}</td>
                            <td>
                                <a href="{{ route('crud-pendaftaran.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('crud-pendaftaran.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection