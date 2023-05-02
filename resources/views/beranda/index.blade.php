@extends('layouts.app')

@section('contentberanda')
<div class="hero-image">
    <div class="container welcome-web">
        <div class="welcome-web-container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 title-container">
                    <h4 class="title-welcome">Selamat Datang!</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <hr class="new1">
                </div>
            </div>

            @guest
            <div class="row guest-content">
                <div class="col-md-3 col-sm-12 col-xs-12 pb-5">
                    <p class="subtitle-welcome">Belum punya akun?
                        <br />
                        Klik tombol <b>Daftar</b> di bawah ini!
                    </p>
                    <a href="/register" class="btn-daftar">Daftar</a>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12"></div>
                <div class="col-md-3 col-sm-12 col-xs-12"></div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <p class="subtitle-welcome">Sudah memiliki akun?
                        <br />
                        Klik tombol <b>Masuk</b> di bawah ini!
                    </p>
                    <a href="/login" class="btn-masuk">Masuk</a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid mb-0 mt-0 jb-beranda fade">
    <div class="container">
        <div class="row p-3 wrapper">
            <div class="col-md-6 text-center">
                <img src="{{asset('img/berkas.png')}}" class="gbr-beranda">
            </div>
    
            <div class="col-md-6">
                <h3 class="judul-isi-beranda">Pengurusan Berkas Administrasi</h3>
                <p class="text-beranda">Untuk melakukan pengurusan berkas seperti KK, Akte Lahir, dan Akte Mati</p>
                <a href="{{ route('administrasi.pribadi') }}" class="btn btn-warning font-weight-bold">Klik Disini</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <center>
        <div class="garis" style="width:0%;">
            <hr/>
        </div>
    </center>
</div>

<div class="jumbotron jumbotron-fluid mb-0 mt-0 jb-beranda fade">
    <div class="container">
        <div class="row p-3 wrapper">
            <div class="col-md-6 text-center">
                <img src="{{asset('img/laporan.png')}}" class="gbr-beranda">
            </div>
    
            <div class="col-md-6">
                <h3 class="judul-isi-beranda">Pengajuan Laporan</h3>
                <p class="text-beranda">Untuk mengajukan laporan tentang infrastruktur desa, atau tindak kriminal</p>
                <a href="{{route('laporan.index')}}" class="btn btn-danger font-weight-bold">Klik Disini</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <center>
        <div class="garis" style="width:0%;">
            <hr/>
        </div>
    </center>
</div>

<div class="jumbotron jumbotron-fluid mb-0 mt-0 jb-beranda fade">
    <div class="container">
        <div class="row p-3 wrapper">
            <div class="col-md-6 text-center">
                <img src="{{asset('img/pengumuman.png')}}" class="gbr-beranda">
            </div>
    
            <div class="col-md-6">
                <h3 class="judul-isi-beranda">Pengumuman</h3>
                <p class="text-beranda">Untuk melihat berbagai informasi terbaru seputar desa maupun provinsi Sumatera Utara</p>
                <a href="{{route('pengumuman.index')}}" class="btn btn-success font-weight-bold">Klik Disini</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <center>
        <div class="garis" style="width:0%;">
            <hr/>
        </div>
    </center>
</div>
@endsection
