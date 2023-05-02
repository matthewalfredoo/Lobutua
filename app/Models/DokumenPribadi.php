<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPribadi extends Model
{
    use HasFactory;

    protected $table = 'dokumen_pribadi';

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function getKategoriAdministrasi()
    {
        return $this->belongsTo('App\Models\KategoriAdministrasi', 'id_kategori_dokumen');
    }
}
