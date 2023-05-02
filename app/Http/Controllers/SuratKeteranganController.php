<?php

namespace App\Http\Controllers;

use App\Models\SuratKeterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratKeteranganController extends Controller
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
        return view('administrasi.create-keterangandomisili');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_domisili()
    {
        return view('administrasi.create-keterangandomisili');
    }

    public function create_kematian()
    {
        return view('administrasi.create-keterangankematian');
    }

    public function create_kurangMampu()
    {
        return view('administrasi.create-keterangankurangmampu');
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
            'data1' => 'required',
            'data2' => 'required',
            'data3' => 'required',
            'data4' => 'required',
            'data5' => 'required',
            'data6' => 'required',
            'data7' => 'required',
            'data8' => 'required',
            'Pernyataan' => 'accepted',
        ]);

        $id_user = Auth::user()->id;

        $suratKeterangan = new SuratKeterangan;

        $suratKeterangan->data1 = $request->input('data1');
        $suratKeterangan->data2 = $request->input('data2');
        $suratKeterangan->data3 = $request->input('data3');
        $suratKeterangan->data4 = $request->input('data4');
        $suratKeterangan->data5 = $request->input('data5');
        $suratKeterangan->data6 = $request->input('data6');
        $suratKeterangan->data7 = $request->input('data7');
        $suratKeterangan->data8 = $request->input('data8');
        $suratKeterangan->status = "Diperiksa";
        $suratKeterangan->id_kategori_dokumen = $request->input('kategori');
        $suratKeterangan->id_user = $id_user;

        $suratKeterangan->save();
        
        return redirect()->route('administrasi.keterangan')->with('success', 'Berhasil mengajukan administrasi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratKeterangan  $suratKeterangan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrasi = SuratKeterangan::with(['getUser', 'getKategoriAdministrasi'])->find($id);
        return view('administrasi.show-suratketerangan')->with('administrasi', $administrasi);
    }

    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $laporan = SuratKeterangan::find($id);
        $laporan->status = $request->status;

        $laporan->save();

        return redirect()->route('administrasi.keterangan')->with('success', 'Status administrasi berhasil diperbaharui');
    }
}
