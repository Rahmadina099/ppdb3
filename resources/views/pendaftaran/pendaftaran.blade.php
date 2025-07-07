@extends('layouts/app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top-4">
                    <h4 class="mb-0">Form Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <form action="proses_pendaftaran.php" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label for="no_daftar" class="form-label">No Pendaftaran</label>
                            <input type="text" class="form-control" id="no_daftar" name="no_daftar" placeholder="Contoh: 2025001">
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                          <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <select class="form-select" id="jurusan" name="jurusan" required>
                                <option value="" selected disabled>-- Pilih Jurusan --</option>
                                <option value="PPLG">PPLG</option>
                                <option value="TKJ">TKJ</option>
                                <option value="TBSM">TBSM</option>
                                <option value="TKRO">TKRO</option>
                                <option value="TP">TP</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l" value="L">
                                <label class="form-check-label" for="jk_l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p" value="P">
                                <label class="form-check-label" for="jk_p">Perempuan</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center text-muted small rounded-bottom-4">
                    &copy; {{ date('Y') }} - Formulir Pendaftaran Siswa Baru
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
@endsection