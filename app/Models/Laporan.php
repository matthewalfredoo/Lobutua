<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';

    public static function getLaporanUser(int $limit, $id_user)
    {
        $laporan = self::where('id_user', $id_user)->orderBy('waktu_dibuat', 'desc')->paginate($limit);
        // $laporan = self::paginate($limit)->where('id_user', $id_user)->sortBy('waktu_dibuat', SORT_DESC, true);
        // $laporan = self::orderBy('waktu_dibuat', 'desc')->paginate($limit)->where('id_user', $id_user);
        return $laporan;
    }

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
    
    public function getKategori()
    {
        return $this->belongsTo('App\Models\KategoriLaporanAnak', 'id_kategori');
    }
}
