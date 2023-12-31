<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'nim', 'instansi', 'program_studi', 'semester', 'alamat', 'email', 'no_telepon', 'jenis_kelamin'];

    public function pendaftaranMagang()
{
    return $this->hasMany(PendaftaranMagang::class, 'mahasiswa_id');
}

public function pendaftaranPenelitian()
{
    return $this->hasMany(PendaftaranPenelitian::class, 'mahasiswa_id');
}

}
