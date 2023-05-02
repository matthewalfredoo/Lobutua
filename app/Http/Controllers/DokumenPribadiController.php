<?php

namespace App\Http\Controllers;

use App\Models\DokumenPribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokumenPribadiController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:administrasi-list|administrasi-create|administrasi-edit|administrasi-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:administrasi-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:administrasi-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrasi.create-aktalahir');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_aktaLahir()
    {
        return view('administrasi.create-aktalahir');
    }

    public function create_aktaMati()
    {
        return view('administrasi.create-aktamati');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nameAdministrasi' => 'required',
            'customFile1' => 'required|mimes:jpeg,png,jpg,pdf|max:20000',
            'customFile2' => 'required|mimes:jpeg,png,jpg,pdf|max:20000',
            'customFile3' => 'required|mimes:jpeg,png,jpg,pdf|max:20000',
            'customFile4' => 'required|mimes:jpeg,png,jpg,pdf|max:20000',
            'customFile5' => 'required|mimes:jpeg,png,jpg,pdf|max:20000',
            'customFile6' => 'required|mimes:jpeg,png,jpg,pdf|max:20000',
            'Pernyataan' => 'accepted',
        ]);

        $id_user = Auth::user()->id;
        $nama = $request->input('nameAdministrasi');
        $namaBersih = str_replace(' ', '', $nama);
        
        if($request->input('kategori') == 1){
            $fileDestination = 'uploaded/administrasi/dokumen_pribadi/akta_lahir/' . $id_user . '_' . $namaBersih . '_' . date("d-m-Y_H-i-s");

            //inputan file 1 atau customFile1
            $file1 = $request->file('customFile1');
            $extension = $request->file('customFile1')->guessExtension();
            $file1Name = 'surat_keterangan_kelahiran_dari_kantor_desa' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file1->move($fileDestination, $file1Name);

            //inputan file 2 atau customFile2
            $file2 = $request->file('customFile2');
            $extension = $request->file('customFile2')->guessExtension();
            $file2Name = 'surat_keterangan_kelahiran_dari_dokter-bidan' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file2->move($fileDestination, $file2Name);

            //inputan file 3 atau customFile3
            $file3 = $request->file('customFile3');
            $extension = $request->file('customFile3')->guessExtension();
            $file3Name = 'surat-akta_perkawinan_orangtua' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file3->move($fileDestination, $file3Name);

            //inputan file 4 atau customFile4
            $file4 = $request->file('customFile4');
            $extension = $request->file('customFile4')->guessExtension();
            $file4Name = 'kk-ktp_orangtua' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file4->move($fileDestination, $file4Name);

            //inputan file 5 atau customFile5
            $file5 = $request->file('customFile5');
            $extension = $request->file('customFile5')->guessExtension();
            $file5Name = 'ktp_saksi_kelahiran' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file5->move($fileDestination, $file5Name);

            //inputan file 6 atau customFile6
            $file6 = $request->file('customFile6');
            $extension = $request->file('customFile6')->guessExtension();
            $file6Name = 'surat_suku_dinas' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file6->move($fileDestination, $file6Name);

            //end of input
        }

        if($request->input('kategori') == 2){
            $fileDestination = 'uploaded/administrasi/dokumen_pribadi/akta_mati/' . $id_user . '_' . $namaBersih . '_' . date("d-m-Y_H-i-s");

            //inputan file 1 atau customFile1
            $file1 = $request->file('customFile1');
            $extension = $request->file('customFile1')->guessExtension();
            $file1Name = 'ktp_almarhum' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file1->move($fileDestination, $file1Name);

            //inputan file 2 atau customFile2
            $file2 = $request->file('customFile2');
            $extension = $request->file('customFile2')->guessExtension();
            $file2Name = 'ktp_pelapor' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file2->move($fileDestination, $file2Name);

            //inputan file 3 atau customFile3
            $file3 = $request->file('customFile3');
            $extension = $request->file('customFile3')->guessExtension();
            $file3Name = 'ktp_saksi' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file3->move($fileDestination, $file3Name);

            //inputan file 4 atau customFile4
            $file4 = $request->file('customFile4');
            $extension = $request->file('customFile4')->guessExtension();
            $file4Name = 'akte_kelahiran-kawin-sbkri' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file4->move($fileDestination, $file4Name);

            //inputan file 5 atau customFile5
            $file5 = $request->file('customFile5');
            $extension = $request->file('customFile5')->guessExtension();
            $file5Name = 'surat_keterangan_dari_rs' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file5->move($fileDestination, $file5Name);

            //inputan file 6 atau customFile6
            $file6 = $request->file('customFile6');
            $extension = $request->file('customFile6')->guessExtension();
            $file6Name = 'surat_keterangan_kematian' .  '_user' . $id_user . '_' . date("d-m-Y_H-i-s") . '.' . $extension;
            
            $file6->move($fileDestination, $file6Name);

            //end of input
        }

        $dokumenPribadi = new DokumenPribadi;

        $dokumenPribadi->data1 = $request->input('nameAdministrasi');
        $dokumenPribadi->data2 = $fileDestination . '/' . $file1Name;
        $dokumenPribadi->data3 = $fileDestination . '/' . $file2Name;
        $dokumenPribadi->data4 = $fileDestination . '/' . $file3Name;
        $dokumenPribadi->data5 = $fileDestination . '/' . $file4Name;
        $dokumenPribadi->data6 = $fileDestination . '/' . $file5Name;
        $dokumenPribadi->data7 = $fileDestination . '/' . $file6Name;
        $dokumenPribadi->status = "Diperiksa";
        $dokumenPribadi->id_kategori_dokumen = $request->input('kategori');
        $dokumenPribadi->id_user = $id_user;

        // return $dokumenPribadi;
        $dokumenPribadi->save();
        return redirect()->route('administrasi.pribadi')->with('success', 'Berhasil mengajukan administrasi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokumenPribadi  $dokumenPribadi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrasi = DokumenPribadi::with(['getUser', 'getKategoriAdministrasi'])->find($id);
        return view('administrasi.show-dokumenpribadi')->with('administrasi', $administrasi);
    }

    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $laporan = DokumenPribadi::find($id);
        $laporan->status = $request->status;

        $laporan->save();

        return redirect()->route('administrasi.pribadi')->with('success', 'Status administrasi berhasil diperbaharui');
    }
}
