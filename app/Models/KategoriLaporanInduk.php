<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLaporanInduk extends Model
{
    use HasFactory;
    
    protected $table = 'kategorilaporan_induk';

    /**
     * Membuat kolom created_at dan updated_at tidak dihitung sebagai kolom
     * saat melakukan seeding pada database.
     */
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function getKategoriAnak()
    {
        return $this->hasMany('App\Models\KategoriLaporanAnak');
    }
}
