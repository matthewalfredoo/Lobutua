@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-12" id="container-show">
                <div class="card" id="show-laporan">
                    <form method="get" action="{{ route('laporan.pdf', $laporan->id) }}" id="form-show-laporan">
                        <h3 class="text-center form-show-laporan-title">Laporan
                            {{ $laporan->getKategori->getKategoriInduk->nama }}</h3>
                        @csrf
                        <br /><br />

                        <div class="form-group row">
                            <label for="judul-laporan-show" id="judul-laporan-show"
                                class="col-md-3 col-form-label mx-auto">{{ __('Judul Laporan :') }}</label>

                            <div class="col-md-6">
                                <input id="judul2-laporan-show" type="text"
                                    class="form-control @error('judul-laporan-show') is-invalid @enderror"
                                    name="judul-laporan-show" value="{{ $laporan->judul }}" required
                                    autocomplete="judul-laporan-show" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul-laporan-show" id="judul-laporan-show"
                                class="col-md-3 col-form-label mx-auto">{{ __('Nama Lengkap :') }}</label>

                            <div class="col-md-6">
                                <input id="judul2-laporan-show" type="text"
                                    class="form-control @error('judul-laporan-show') is-invalid @enderror"
                                    name="judul-laporan-show" value="{{ $laporan->nama }}" required
                                    autocomplete="judul-laporan-show" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul-laporan-show" id="judul-laporan-show"
                                class="col-md-3 col-form-label mx-auto">{{ __('Nomor HP :') }}</label>

                            <div class="col-md-6">
                                <input id="judul2-laporan-show" type="text"
                                    class="form-control @error('judul-laporan-show') is-invalid @enderror"
                                    name="judul-laporan-show" value="{{ $laporan->no_hp }}" required
                                    autocomplete="judul-laporan-show" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul-laporan-show" id="judul-laporan-show"
                                class="col-md-3 col-form-label mx-auto">{{ __('Lokasi ') }}
                                {{$laporan->getKategori->getKategoriInduk->nama}} :</label>

                            <div class="col-md-6">
                                <input id="judul2-laporan-show" type="text"
                                    class="form-control @error('judul-laporan-show') is-invalid @enderror"
                                    name="judul-laporan-show" value="{{ $laporan->lokasi }}" required
                                    autocomplete="judul-laporan-show" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul-laporan-show" id="judul-laporan-show"
                                class="col-md-3 col-form-label mx-auto">{{ __('Kategori ') }}
                                {{$laporan->getKategori->getKategoriInduk->nama}} :</label>

                            <div class="col-md-6">
                                <input id="judul2-laporan-show" type="text"
                                    class="form-control @error('judul-laporan-show') is-invalid @enderror"
                                    name="judul-laporan-show" value="{{ $laporan->getKategori->nama_kategori }}" required
                                    autocomplete="judul-laporan-show" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan-laporan-show" id="keterangan-laporan-show"
                                class="col-md-3 col-form-label mx-auto">{{ __('Keterangan Laporan :') }}</label>

                            <div class="col-md-6">
                                <textarea id="keterangan2-laporan-show" type="text"
                                    class="form-control @error('keterangan-laporan-show') is-invalid @enderror"
                                    name="keterangan-laporan-show" required autocomplete="keterangan-laporan-show"
                                    disabled rows="5">{{ $laporan->keterangan }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="judul2-laporan-show" id="judul-laporan-show"
                                class="col-sm-3 col-form-label mx-auto">{{ __('Bukti Gambar :') }}</label>

                            <div class="col-md-6">
                                <img src="{{ asset($laporan->bukti_gambar) }}" id="img-laporan-show">
                            </div>
                        </div>

                        <div class="form-group" id="aaa">
                            <button type="submit" class="btn btn-success col-sm-2" id="btn-download-laporan"><i
                                    class="fas fa-download"></i> Unduh
                                Laporan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection