<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengumuman = Pengumuman::create([
            'judul' => 'Rapat Penanganan Covid-19',
            'konten' => 'Kepada anggota keamanan dan relawan covid diahrapkan untuk dapat menghadiri rapat yang akan diadakan pada tanggal 30 Juni 2021 Pukul 18.00 di Kantor Desa.
            Akan ada pembahasan penting yang dilakukan mengenai tindak lanjut kita terhadap covid-19 di desa kita tercinta, Lobutua.',
            'gambar' => 'uploaded/pengumuman/covid.jpg',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'kategori_pengumuman_id' => 2,
            'id_admin' => 1,
        ]);
        
        $pengumuman = Pengumuman::create([
            'judul' => 'Sistem Layanan Desa Lobutua',
            'konten' => 'Layanan Desa Lobutua merupakan hasil kerja Kelompok 4, mata kuliah Proyek Akhir 1 Prodi D3TI.',
            'gambar' => 'uploaded/pengumuman/lobutua.jpg',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'kategori_pengumuman_id' => 1,
            'id_admin' => 1,
        ]); 

        $pengumuman = Pengumuman::create([
            'judul' => 'Lowongan Pekerjaan IT',
            'konten' => 'Perusahaan banyak membutuhkan karyawan di bidang IT, dengan ini diharapkan masyarakan yang membutuhkan pekerjaan IT
            dapat mendaftar ke lowongan pekerjaan agar dapat Bersinergi baik bagi perusahaan dan desa.',
            'gambar' => 'uploaded/pengumuman/loker.jpg',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'kategori_pengumuman_id' => 3,
            'id_admin' => 1,
        ]);

        $pengumuman = Pengumuman::create([
            'judul' => 'Rapat Keuangan Desa',
            'konten' => 'Pada tanggal 27/Mei/2021 pukul 09.00 WIB akan dilaksanakan rapat keuangan desa yang dihadiri oleh seluruh perangkat desa dan masyarakat.
            Rapat ini guna membahas kondisi keuangan desa yang sedang menipis dan bagaimana solusinya. Dengan ini diharapkan masyarakat dapat saling bekerja sama demi kemakmuran desa.',
            'gambar' => 'uploaded/pengumuman/rapat-keuangan.jpg',
            'waktu_dibuat' => now('Asia/Bangkok'),
            'waktu_diperbarui' => now('Asia/Bangkok'),
            'kategori_pengumuman_id' => 2,
            'id_admin' => 1,
        ]);
    }
}
