<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    protected $table = 'magang';
    protected $fillable = ['id_balai','deskripsi', 'deadline_pendaftaran'];

    public function balai()
{
    return $this->belongsTo(Balai::class, 'id_balai');
}

}
