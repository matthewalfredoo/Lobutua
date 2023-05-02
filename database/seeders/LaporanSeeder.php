<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;


class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laporan = Laporan::create([
            'nama' => 'Matthew Alfredo',
            'no_hp' => '0813961922',
            'lokasi' => 'Lobutua',
            'judul' => 'Kehilangan Uang 24.000.000',
            'keterangan' => 'Saya telah kehilangan banyak uang yang berharga, sehingga saya tidak tahu lagi harus kemana',
            'bukti_gambar' => 'uploaded/laporan/laporan-kehilangan-uang.jpeg',
            'id_user' => 2,
            'status' => 'Diperiksa',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'id_kategori' => 9,
        ]);

        $laporan = Laporan::create([
            'nama' => 'Genesis Hairul Sinaga',
            'no_hp' => '0821201912',
            'lokasi' => 'Lobutua',
            'judul' => 'Jalanan Rusak',
            'keterangan' => 'Saya wisatawan yang datang ke desa ini, 
            tetapi saya sangat kecewa dengan infrastruktur yang sangan buruk, bagaimana para pengendara bisa nyaman kalau jalanannya sangat rusak seperti ini!',
            'bukti_gambar' => 'uploaded/laporan/laporan-jalan.jpeg',
            'id_user' => 2,
            'status' => 'Diperiksa',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'id_kategori' => 1,
        ]);
        
        $laporan = Laporan::create([
            'nama' => 'Dewa Sembiring',
            'no_hp' => '085729102910',
            'lokasi' => 'Lobutua',
            'judul' => 'Seseorang telah dirampok',
            'keterangan' => 'Saya telah menyaksikan di Jl. Bilal dekat lampu merah bahwa ada perampokan oleh 2 orang terhadap seorang ibu ibu.
            Perampok menggunakan motor Beat tahun 2013, warna hitam, plat nomor BK 1929 UW sekitar jam 02.45 dinihari tanggal 29/May/2019',
            'bukti_gambar' => 'uploaded/laporan/laporan-perampokan.jpeg',
            'id_user' => 2,
            'status' => 'Diperiksa',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'id_kategori' => 10,
        ]);
    }
}
