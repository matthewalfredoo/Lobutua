@extends('layouts.app')

@section('content')

    <div class="container">

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('laporan.create-infrastruktur') }}">Laporan Infrastruktur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('laporan.create-bencana') }}">Laporan Bencana</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('laporan.create-kriminal') }}">Laporan Kriminal</a>
            </li>
        </ul>

        <form method="POST" action="{{ route('laporan.store') }}" id="laporanForm" enctype="multipart/form-data">
            <h4 class="text-center form-login-title">Laporan Infrastruktur
            </h4>
            <p class="form-login-subtitle col-md-12 text-center">
                Silahkan
                isi masing-masing
                field
                dengan
                data yang benar</p>
            @csrf

            <br />

            <div class="form-group">
                <label for="judulLaporan" class="col-md-5 col-form-label text-md-left">{{ __('Judul Laporan') }}</label>

                <div class="col-md-4">
                    <input id="nameLaporan" type="text" class="form-control @error('judulLaporan') is-invalid @enderror"
                        name="judulLaporan" value="{{ old('judulLaporan') }}" autocomplete="judulLaporan" autofocus>

                    @error('judulLaporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="nameLaporan" class="col-md-5 col-form-label text-md-left">{{ __('Nama') }}</label>

                <div class="col-md-4">
                    <input id="nameLaporan" type="text" class="form-control @error('nameLaporan') is-invalid @enderror"
                        name="nameLaporan" value="{{ old('nameLaporan') }}" autocomplete="nameLaporan">

                    @error('nameLaporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="phoneLaporan" class="col-md-5 col-form-label text-md-left">{{ __('Nomor HP') }}</label>

                <div class="col-md-4">
                    <input id="phoneLaporan" type="text" class="form-control @error('phoneLaporan') is-invalid @enderror"
                        name="phoneLaporan" value="{{ old('phoneLaporan') }}" autocomplete="phoneLaporan">

                    @error('phoneLaporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="lokasiLaporan"
                    class="col-md-5 col-form-label text-md-left">{{ __('Lokasi Kejadian') }}</label>

                <div class="col-md-4">
                    <input id="lokasiLaporan" type="text" class="form-control @error('lokasiLaporan') is-invalid @enderror"
                        name="lokasiLaporan" value="{{ old('lokasiLaporan') }}" autocomplete="lokasiLaporan">

                    @error('lokasiLaporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="kategoriLaporan"
                    class="col-md-5 col-form-label text-md-left">{{ __('Kategori Kriminal') }}</label>

                <div class="col-md-3">
                    <select id="kategoriLaporan"
                        class="form-select form-select-sm @error('kategoriLaporan') is-invalid @enderror"
                        aria-label=".form-select-sm example" id="kategoriLaporan" name="kategoriLaporan"
                        value="{{ old('kategoriLaporan') }}" autocomplete="kategoriLaporan">
                        <option selected disabled>Pilih</option>
                        <option value="9">Kehilangan</option>
                        <option value="10">Perampokan</option>
                        <option value="11">Penganiayaan</option>
                        <option value="12">Pelecehan</option>
                        <option value="13">Lainnya</option>
                    </select>

                    @error('kategoriLaporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="keteranganLaporan"
                    class="col-md-5 col-form-label text-md-left">{{ __('Keterangan Laporan') }}</label>

                <div class="col-md-9">
                    <textarea id="keteranganLaporan" type="text" rows="7"
                        class="form-control @error('keteranganLaporan') is-invalid @enderror" name="keteranganLaporan"
                        value="{{ old('keteranganLaporan') }}" autocomplete="keteranganLaporan"
                    >{{ old('keteranganLaporan') }}</textarea>

                    @error('keteranganLaporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


            </div>

            <div class="form-group">
                <label for="customFile"
                    class="col-md-5 col-form-label text-md-left">{{ __('Upload Bukti Gambar') }}</label>

                <div class="col-md-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('customFile') is-invalid @enderror"
                            id="customFile" name="customFile" value="{{ old('customFile') }}" autocomplete="customFile"
                        >
                        <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>
                    </div>

                    @error('customFile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br /><br />

                <div class="form-group mb-0 text-left">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-login" id="submitBerkas">
                            {{ __('Kirim Laporan') }}
                        </button>
                    </div>
                </div>

        </form>

    </div>

@endsection
