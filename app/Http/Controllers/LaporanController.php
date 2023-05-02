<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\KategoriLaporanAnak;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:laporan-list|laporan-create|laporan-edit|laporan-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:laporan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:laporan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:laporan-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        
        // $laporan = Laporan::with('getUser')->latest()->paginate(6);
        // $laporan = Laporan::all()->sortBy('waktu_dibuat', SORT_REGULAR, true)->where('id_user', $id_user);
        // $laporan = Laporan::where('id_user', $id_user)->orderBy('waktu_dibuat', 'desc')->paginate(5);

        /* Jika user memiliki role Admin-Master atau Admin maka ini yang akan dieksekusi */
        if(Auth::user()->hasRole('Admin Master') || Auth::user()->hasRole('Admin')){
            $laporan = Laporan::with('getUser')->latest()->paginate(5);
            return view('laporan.index')->with('laporan', $laporan);
        }

        /* Jika user memiliki role Member maka ini yang akan dieksekusi */
        $laporan = Laporan::getLaporanUser(5, $id_user);
        return view('laporan.index')->with('laporan', $laporan);
    }

    public function create_infrastruktur()
    {
        return view('laporan.create-infrastruktur');
    }

    public function create_kriminal()
    {
        return view('laporan.create-kriminal');
    }

    public function create_bencana()
    {
        return view('laporan.create-bencana');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporan.create');
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
            'judulLaporan' => 'required',
            'nameLaporan' => 'required',
            'phoneLaporan' => 'required',
            'lokasiLaporan' => 'required',
            'kategoriLaporan' => 'required',
            'keteranganLaporan' => 'required',
            'customFile' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $id_user = Auth::user()->id;

        $customFile = $request->file('customFile');
        $extension = $request->file('customFile')->guessExtension();
        $fileName = date("d-m-Y_H-i-s") . '_user' . $id_user . '.' . $extension;
        $fileDestination = 'uploaded/laporan';
        
        $customFile->move($fileDestination, $fileName);

        $status = "Diperiksa";

        $laporan = new Laporan;
        $laporan->judul = $request->input('judulLaporan');
        $laporan->nama = $request->input('nameLaporan');
        $laporan->no_hp = $request->input('phoneLaporan');
        $laporan->lokasi = $request->input('lokasiLaporan');
        $laporan->keterangan = $request->input('keteranganLaporan');
        $laporan->bukti_gambar = $fileDestination . '/' . $fileName;
        $laporan->id_user = $id_user; // foreign key
        $laporan->id_kategori = $request->input('kategoriLaporan'); // foreign key
        $laporan->status = $status;
        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $laporan = DB::table('laporan')
        //             ->join('kategorilaporan_anak', 'laporan.id_kategori', '=', 'kategorilaporan_anak.id_kategori')
        //             ->join('kategorilaporan_induk', 'kategorilaporan_anak.id_induk', '=', 'kategorilaporan_induk.id')
        //             ->select('*', 'kategorilaporan_induk.nama')->where('laporan.id', $id)
        //             ->get();
        $laporan = Laporan::with('getKategori')->find($id);
        $laporan->getKategori->induk = KategoriLaporanAnak::with('getKategoriInduk')->find($laporan->id_kategori);

        return view('laporan.show')->with('laporan', $laporan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = Laporan::with('getKategori')->find($id);
        return view('laporan.edit')->with('laporan', $laporan);
        // return $laporan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judulLaporan' => 'required',
            'nameLaporan' => 'required',
            'phoneLaporan' => 'required',
            'lokasiLaporan' => 'required',
            'kategoriLaporan' => 'required',
            'keteranganLaporan' => 'required',
            'customFile' => 'image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $id_user = Auth::user()->id;

        if ($request->file('customFile')) {
            $customFile = $request->file('customFile');
            $extension = $request->file('customFile')->guessExtension();
            $fileName = date("d-m-Y_H-i-s") . '_user' . $id_user . '.' . $extension;
            $fileDestination = 'uploaded/laporan';

            $customFile->move($fileDestination, $fileName);
        }

        $laporan = Laporan::find($id);
        $laporan->judul = $request->input('judulLaporan');
        $laporan->nama = $request->input('nameLaporan');
        $laporan->no_hp = $request->input('phoneLaporan');
        $laporan->lokasi = $request->input('lokasiLaporan');
        $laporan->keterangan = $request->input('keteranganLaporan');
        if ($request->file('customFile')) {
            unlink($laporan->bukti_gambar);
            $laporan->bukti_gambar = $fileDestination . '/' . $fileName;
        }
        $laporan->id_user = $id_user;
        $laporan->id_kategori = $request->input('kategoriLaporan');

        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Berhasil menghapus laporan');
    }

    /**
     * Memeperbaharui status laporan yang diajukan user 
     */
    public function status(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $laporan = Laporan::find($id);
        $laporan->status = $request->status;

        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Status laporan berhasil diperbaharui');
    }

    public function pdf($id)
    {
        $laporan = Laporan::with('getKategori')->find($id);
        $laporan->getKategori->induk = KategoriLaporanAnak::with('getKategoriInduk')->find($laporan->id_kategori);
        
        $namaFile = "Laporan-" . $laporan->getKategori->nama_kategori . "_" . $laporan->nama . "_" . $laporan->waktu_dibuat;
        $pdf = PDF::loadView('laporan.pdf', compact('laporan'));
        return $pdf->download($namaFile . ".pdf");
    }
}
