<?php

namespace App\Http\Controllers;

use App\Models\DokumenPribadi;
use App\Models\SuratKeterangan;
use App\Models\SuratPengantar;
use App\Models\KategoriAdministrasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ListAdministrasiController extends Controller
{
    public function show_dokumen_pribadi()
    {
        if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Admin Master')){
            $dokumen_pribadi = DokumenPribadi::with(['getUser', 'getKategoriAdministrasi'])->latest()->get();
        }
        else{
            $id_user = Auth::user()->id;
            $dokumen_pribadi = DokumenPribadi::with('getKategoriAdministrasi')->latest()->where('id_user', $id_user)->get();    
        }
        $dokumen_pribadi->nama_administrasi = "Dokumen Pribadi";
        foreach($dokumen_pribadi as $k){
            $k->jenis = "pribadi";
        }
        return view('administrasi.daftar')->with('administrasi', $dokumen_pribadi);
    }

    public function show_surat_pengantar()
    {
        if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Admin Master')){
            $surat_pengantar = SuratPengantar::with(['getUser', 'getKategoriAdministrasi'])->latest()->get();
        }
        else{
            $id_user = Auth::user()->id;
            $surat_pengantar = SuratPengantar::with('getKategoriAdministrasi')->latest()->where('id_user', $id_user)->get();
        }
        $surat_pengantar->nama_administrasi = "Surat Pengantar";
        foreach($surat_pengantar as $k){
            $k->jenis = "pengantar";
        }
        return view('administrasi.daftar')->with('administrasi', $surat_pengantar);
    }

    public function show_surat_keterangan()
    {
        if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Admin Master')){
            $surat_keterangan = SuratKeterangan::with(['getUser', 'getKategoriAdministrasi'])->latest()->get();
        }
        else{
            $id_user = Auth::user()->id;
            $surat_keterangan = SuratKeterangan::with('getKategoriAdministrasi')->latest()->where('id_user', $id_user)->get();
        }
        $surat_keterangan->nama_administrasi = "Surat Keterangan";
        foreach($surat_keterangan as $k){
            $k->jenis = "keterangan";
        }
        return view('administrasi.daftar')->with('administrasi', $surat_keterangan);
    }

}
