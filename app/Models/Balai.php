<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balai extends Model
{
    protected $table = 'balai';
    protected $fillable = ['unit_kerja', 'kuota', 'deskripsi', 'icon'];

    public function magang()
{
    return $this->hasMany(Magang::class, 'id_balai');
}

public function penelitian()
{
    return $this->hasMany(Penelitian::class, 'id_balai');
}

}
