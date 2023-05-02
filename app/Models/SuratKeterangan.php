<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeterangan extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan';

    protected $fillable = [
        'data1',
        'data2',
        'data3',
        'data4',
        'data5',
        'data6',
        'data7',
        'data8',
        'id_kategori_dokumen',
    ];
    
    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function getKategoriAdministrasi()
    {
        return $this->belongsTo('App\Models\KategoriAdministrasi', 'id_kategori_dokumen');
    }
}
