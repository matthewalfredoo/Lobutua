<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLaporanAnak extends Model
{
    use HasFactory;
    
    protected $table = 'kategorilaporan_anak';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    public function getKategoriInduk()
    {
        return $this->belongsTo('App\Models\KategoriLaporanInduk', 'id_induk');
    }

    public function getLaporan()
    {
        return $this->hasMany('App\Models\Laporan');
    }
}
