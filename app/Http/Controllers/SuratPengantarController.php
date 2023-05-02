<?php

namespace App\Http\Controllers;

use App\Models\SuratPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratPengantarController extends Controller
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
        return view('administrasi.surat-pengantar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_pindah()
    {
        return view('administrasi.create-pengantarpindah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create_ktp()
     {
         return view('administrasi.create-pengantarktp');
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

        $suratPengantar = new SuratPengantar;

        $suratPengantar->data1 = $request->input('data1');
        $suratPengantar->data2 = $request->input('data2');
        $suratPengantar->data3 = $request->input('data3');
        $suratPengantar->data4 = $request->input('data4');
        $suratPengantar->data5 = $request->input('data5');
        $suratPengantar->data6 = $request->input('data6');
        $suratPengantar->data7 = $request->input('data7');
        $suratPengantar->data8 = $request->input('data8');
        $suratPengantar->status = "Diperiksa";
        $suratPengantar->id_kategori_dokumen = $request->input('kategori');
        $suratPengantar->id_user = $id_user;

        $suratPengantar->save();
        
        return redirect()->route('administrasi.pengantar')->with('success', 'Berhasil mengajukan administrasi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratPengantar  $suratPengantar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $administrasi = SuratPengantar::with(['getUser', 'getKategoriAdministrasi'])->find($id);
        return view('administrasi.show-suratpengantar')->with('administrasi', $administrasi);
    }

    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $laporan = SuratPengantar::find($id);
        $laporan->status = $request->status;

        $laporan->save();

        return redirect()->route('administrasi.pengantar')->with('success', 'Status administrasi berhasil diperbaharui');
    }
}
