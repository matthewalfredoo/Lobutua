<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'judul',
        'konten',
        'gambar',
        'kategori_pengumuman_id',
        'id_admin',
    ];

    //nama tabel
    protected $table = 'pengumuman';

    //primary key dari tabel
    // public $primaryKey = 'id';


    
    /**
     * Mendapatkan pengumuman terbaru
     * dan tiap halaman akan menampilkan sebanyak
     * <nilai_limit> pengumuman
     * 
     * @param int $limit
     * 
     * @return \Illuminate\Support\Collection
     */
    public static function latestPaginatedPengumuman(int $limit)
    {
        $pengumuman = self::orderBy('waktu_dibuat', 'desc')->paginate($limit);
        return $pengumuman;
    }

    
    /**
     * Membuat relationship antara model Pengumuman dan User
     * Melalui ini data foreign key yaitu pada atribut id_admin
     * akan dapat diakses
     * Dan ditampilkan nantinya pada halaman detail pengumuman masing-masing
     */
    public function getAdmin()
    {
        return $this->belongsTo('App\Models\User', 'id_admin');
    }
}
