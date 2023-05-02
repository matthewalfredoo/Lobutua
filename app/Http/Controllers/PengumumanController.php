<?php
//Controller ini berfungsi untuk mengakses database tabel pengumuman
//Dibuat melalui command prompt dengan command
//php artisan make:controller PengumumanController --resource

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pengumuman-create', ['only' => ['create','store']]);
         $this->middleware('permission:pengumuman-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pengumuman-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::latestPaginatedPengumuman(9);
        return view('pengumuman.index')->with('pengumuman', $pengumuman);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');
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
            'judul' => 'required',
            'konten' => 'required|min:80',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:20000',
            'kategori_pengumuman_id' => 'required',
        ]);

        $file = $request->file('gambar');
        $extension = $request->file('gambar')->guessExtension();
        $fileName = md5_file($file) . '.' . $extension;
        $fileDestination = 'uploaded/pengumuman';
        
        $file->move($fileDestination, $fileName);

        $id_admin = Auth::user()->id;
        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->input('judul');
        $pengumuman->konten = $request->input('konten');
        $pengumuman->gambar = $fileDestination . '/' . $fileName;
        $pengumuman->kategori_pengumuman_id = $request->input('kategori_pengumuman_id');

        $pengumuman->id_admin = $id_admin;
        $pengumuman->save();

        return redirect('/pengumuman')->with('success', 'Berhasil menambahkan pengumuman');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * Pada halaman hasil return nantinya akan terdapat variabel $pengumuman
     * Variabel $pengumuman tersebut menyimpan data mengenai pengumuman itu
     * sendiri, juga suatu array data yang berisikan informasi mengenai foreign key
     * yang ada yaitu id_admin.
     * Melalui ini maka data admin, seperti nama admin, dapat ditampilkan pada halaman
     * tersebut.
     * Pengaksesan dilakukan dengan $pengumuman->getAdmin-><namaAtributPadaTabelUsers>
     */
    public function show($id)
    {
        // $pengumuman = Pengumuman::find($id);
        $pengumuman = Pengumuman::with('getAdmin')->find($id);
        return view('pengumuman.detail')->with('pengumuman', $pengumuman);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.edit')->with('pengumuman', $pengumuman);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'konten' => 'required|min:80',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:20000',
            'kategori_pengumuman_id' => 'required',
        ]);

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $extension = $request->file('gambar')->guessExtension();
            $fileName = md5_file($file) . '.' . $extension;
            $fileDestination = 'uploaded/pengumuman';
            
            $file->move($fileDestination, $fileName);
        }

        $id_admin = Auth::user()->id;
        $pengumuman = Pengumuman::find($id);
        $pengumuman->judul = $request->input('judul');
        $pengumuman->konten = $request->input('konten');
        if ($request->file('gambar')) {
            unlink($pengumuman->gambar);
            $pengumuman->gambar = $fileDestination . '/' . $fileName;
        }
        $pengumuman->kategori_pengumuman_id = $request->input('kategori_pengumuman_id');
        $pengumuman->id_admin = $id_admin;

        $pengumuman->save();

        return redirect('/pengumuman')->with('success', 'Berhasil mengedit pengumuman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        
        return redirect('/pengumuman')->with('success', 'Berhasil menghapus pengumuman');
    }
}
