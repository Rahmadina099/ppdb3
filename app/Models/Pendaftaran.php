<?php
// app/Models/Pendaftaran.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'no_daftar', 'nama', 'alamat', 'jurusan', 'jk'
    ];
}