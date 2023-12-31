<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranPenelitian extends Model
{
    protected $table = 'pendaftaran_penelitian';
    protected $fillable = ['mahasiswa_id', 'magang_id', 'tanggal_pendaftaran', 'status_pendaftaran', 'file_kesbangpol', 'file_penelitian'];

    public function mahasiswa()
{
    return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
}
public function magang()
{
    return $this->belongsTo(Magang::class, 'magang_id');
}

}
