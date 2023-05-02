@extends('layouts.app')

@section('content')

@if($laporan->id_kategori > 0 && $laporan->id_kategori <= 5) <div class="container">
    @include('inc.messages')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" id="card-surat">

                <div class="card-body">
                    <form method="POST" action="{{ route('laporan.update', $laporan->id) }}" id="laporanForm"
                        enctype="multipart/form-data">
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
                            <label for="judulLaporan"
                                class="col-md-5 col-form-label text-md-left">{{ __('Judul Laporan') }}</label>

                            <div class="col-md-4">
                                <input id="nameLaporan" type="text"
                                    class="form-control @error('judulLaporan') is-invalid @enderror" name="judulLaporan"
                                    required autocomplete="judulLaporan" value="{{ $laporan->judul }}">

                                @error('judulLaporan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nameLaporan"
                                class="col-md-5 col-form-label text-md-left">{{ __('Nama') }}</label>

                            <div class="col-md-4">
                                <input id="nameLaporan" type="text"
                                    class="form-control @error('nameLaporan') is-invalid @enderror" name="nameLaporan"
                                    required autocomplete="nameLaporan" value="{{ $laporan->nama }}">

                                @error('nameLaporan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phoneLaporan"
                                class="col-md-5 col-form-label text-md-left">{{ __('Nomor HP') }}</label>

                            <div class="col-md-4">
                                <input id="phoneLaporan" type="text"
                                    class="form-control @error('phoneLaporan') is-invalid @enderror" name="phoneLaporan"
                                    required autocomplete="phoneLaporan" value="{{ $laporan->no_hp }}">

                                @error('phoneLaporan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lokasiLaporan"
                                class="col-md-5 col-form-label text-md-left">{{ __('Lokasi Infrastruktur') }}</label>

                            <div class="col-md-4">
                                <input id="lokasiLaporan" type="text"
                                    class="form-control @error('lokasiLaporan') is-invalid @enderror"
                                    name="lokasiLaporan" required autocomplete="lokasiLaporan"
                                    value="{{ $laporan->lokasi }}">

                                @error('lokasiLaporan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kategoriLaporan"
                                class="col-md-5 col-form-label text-md-left">{{ __('Kategori Infrastruktur') }}</label>

                            <div class="col-md-3">
                                {{ Form::select('kategoriLaporan', ['1' => 'Jalan', '2' => 'Layanan Transportasi', '3' => 'Air', '4' => 'Bangunan', '5' => 'Lainnya'], $laporan->id_kategori, ['class' => 'form-select form-select-sm', 'id' => 'kategoriLaporan']) }}

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
                                <textarea class="form-control" id="keteranganLaporan" rows="7"
                                    @error('keteranganLaporan') is-invalid @enderror name="keteranganLaporan" required
                                    autocomplete="keteranganLaporan">{{ $laporan->keterangan }}</textarea>

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
                                    <input type="file" class="custom-file-input" id="customFile" @error('customFile')
                                        is-invalid @enderror name="customFile" autocomplete="customFile">
                                    <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>
                                </div>

                                @error('customFile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <img src="{{ asset($laporan->bukti_gambar) }}" id="img-laporan-edit">
                            </div>
                            <br /><br />

                            <div class="form-group mb-0 text-left">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-login" id="submitBerkas">
                                        {{ __('Edit Laporan') }}
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($laporan->id_kategori > 5 && $laporan->id_kategori <= 8) <div class="container">
   
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="card-surat">

                    <div class="card-body">
                        <form method="POST" action="{{ route('laporan.update', $laporan->id) }}" id="laporanForm"
                            enctype="multipart/form-data">
                            @include('inc.messages')
                            <h4 class="text-center form-login-title">Laporan Bencana
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
                                <label for="judulLaporan"
                                    class="col-md-5 col-form-label text-md-left">{{ __('Judul Laporan') }}</label>

                                <div class="col-md-4">
                                    <input id="nameLaporan" type="text"
                                        class="form-control @error('judulLaporan') is-invalid @enderror"
                                        name="judulLaporan" required autocomplete="judulLaporan"
                                        value="{{ $laporan->judul }}">

                                    @error('judulLaporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nameLaporan"
                                    class="col-md-5 col-form-label text-md-left">{{ __('Nama') }}</label>

                                <div class="col-md-4">
                                    <input id="nameLaporan" type="text"
                                        class="form-control @error('nameLaporan') is-invalid @enderror"
                                        name="nameLaporan" required autocomplete="nameLaporan"
                                        value="{{ $laporan->nama }}">

                                    @error('nameLaporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phoneLaporan"
                                    class="col-md-5 col-form-label text-md-left">{{ __('Nomor HP') }}</label>

                                <div class="col-md-4">
                                    <input id="phoneLaporan" type="text"
                                        class="form-control @error('phoneLaporan') is-invalid @enderror"
                                        name="phoneLaporan" required autocomplete="phoneLaporan"
                                        value="{{ $laporan->no_hp }}">

                                    @error('phoneLaporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lokasiLaporan"
                                    class="col-md-5 col-form-label text-md-left">{{ __('Lokasi Bencana') }}</label>

                                <div class="col-md-4">
                                    <input id="lokasiLaporan" type="text"
                                        class="form-control @error('lokasiLaporan') is-invalid @enderror"
                                        name="lokasiLaporan" required autocomplete="lokasiLaporan"
                                        value="{{ $laporan->lokasi }}">

                                    @error('lokasiLaporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kategoriLaporan"
                                    class="col-md-2 col-form-label text-md-left">{{ __('Kategori Bencana') }}</label>

                                <div class="col-md-3">
                                    {{-- <select id="kategoriLaporan" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example" id="kategoriLaporan"
                                    @error('kategoriLaporan') is-invalid @enderror name="kategoriLaporan" required
                                    autocomplete="kategoriLaporan" > -->
                                    <option value="6">Alam</option>
                                    <option value="7">Non-Alam</option>
                                    <option value="8">Lainnya</option>
                                    <option selected value="{{ $laporan->id_kategori }}"></option> --}}
                                    
                                    {{ Form::select('kategoriLaporan', ['6' => 'Alam', '7' => 'Non-Alam', '8' => 'Lainnya'], $laporan->id_kategori, ['class' => 'form-select form-select-sm', 'id' => 'kategoriLaporan']) }}

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
                                    <textarea class="form-control" id="keteranganLaporan" rows="7"
                                        @error('keteranganLaporan') is-invalid @enderror name="keteranganLaporan"
                                        required autocomplete="keteranganLaporan">{{ $laporan->keterangan }}</textarea>

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
                                        <input type="file" class="custom-file-input" id="customFile"
                                            @error('customFile') is-invalid @enderror name="customFile"
                                            autocomplete="customFile">
                                        <label class="custom-file-label" for="customFile" id="customFile">Pilih
                                            file</label>
                                    </div>

                                    @error('customFile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="{{ asset($laporan->bukti_gambar) }}" id="img-laporan-edit">
                                </div>
                                <br /><br />

                                <div class="form-group mb-0 text-left">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-login" id="submitBerkas">
                                            {{ __('Edit Laporan') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            @if($laporan->id_kategori > 8 && $laporan->id_kategori <= 13) <div class="container">
                @include('inc.messages')
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card" id="card-surat">

                            <div class="card-body">
                                <form method="POST" action="{{ route('laporan.update', $laporan->id) }}"
                                    id="laporanForm" enctype="multipart/form-data">
                                    <h4 class="text-center form-login-title">Laporan Kriminal
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
                                        <label for="judulLaporan"
                                            class="col-md-5 col-form-label text-md-left">{{ __('Judul Laporan') }}</label>

                                        <div class="col-md-4">
                                            <input id="nameLaporan" type="text"
                                                class="form-control @error('judulLaporan') is-invalid @enderror"
                                                name="judulLaporan" required autocomplete="judulLaporan"
                                                value="{{ $laporan->judul }}">

                                            @error('judulLaporan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nameLaporan"
                                            class="col-md-5 col-form-label text-md-left">{{ __('Nama') }}</label>

                                        <div class="col-md-4">
                                            <input id="nameLaporan" type="text"
                                                class="form-control @error('nameLaporan') is-invalid @enderror"
                                                name="nameLaporan" required autocomplete="nameLaporan"
                                                value="{{ $laporan->nama }}">

                                            @error('nameLaporan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="phoneLaporan"
                                            class="col-md-5 col-form-label text-md-left">{{ __('Nomor HP') }}</label>

                                        <div class="col-md-4">
                                            <input id="phoneLaporan" type="text"
                                                class="form-control @error('phoneLaporan') is-invalid @enderror"
                                                name="phoneLaporan" required autocomplete="phoneLaporan"
                                                value="{{ $laporan->no_hp }}">

                                            @error('phoneLaporan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lokasiLaporan"
                                            class="col-md-5 col-form-label text-md-left">{{ __('Lokasi Kriminal') }}</label>

                                        <div class="col-md-4">
                                            <input id="lokasiLaporan" type="text"
                                                class="form-control @error('lokasiLaporan') is-invalid @enderror"
                                                name="lokasiLaporan" required autocomplete="lokasiLaporan"
                                                value="{{ $laporan->lokasi }}">

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
                                            {{-- <select id="kategoriLaporan" class="form-select form-select-sm"
                                                aria-label=".form-select-sm example" id="kategoriLaporan"
                                                @error('kategoriLaporan') is-invalid @enderror name="kategoriLaporan"
                                                required autocomplete="kategoriLaporan">
                                                <option value="9">Kehilangan</option>
                                                <option value="10">Perampokan</option>
                                                <option value="11">Penganiayaan</option>
                                                <option value="12">Pelecehan</option>
                                                <option value="13">Lainnya</option>
                                                <option selected value="{{ $laporan->id_kategori }}"></option>
                                            </select> --}}

                                            {{ Form::select('kategoriLaporan', ['9' => 'Kehilangan', '10' => 'Perampokan', '11' => 'Penganiayaan', '12' => 'Pelecehan', '13' => 'Lainnya'], $laporan->id_kategori, ['class' => 'form-select form-select-sm', 'id' => 'kategoriLaporan']) }}

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
                                            <textarea class="form-control" id="keteranganLaporan" rows="7"
                                                @error('keteranganLaporan') is-invalid @enderror
                                                name="keteranganLaporan" required
                                                autocomplete="keteranganLaporan">{{ $laporan->keterangan }}</textarea>

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
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    @error('customFile') is-invalid @enderror name="customFile"
                                                    autocomplete="customFile">
                                                <label class="custom-file-label" for="customFile" id="customFile">Pilih
                                                    file</label>
                                            </div>

                                            @error('customFile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                            <img src="{{ asset($laporan->bukti_gambar) }}" id="img-laporan-edit">
                                        </div>
                                        <br /><br />

                                        <div class="form-group mb-0 text-left">
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-login" id="submitBerkas">
                                                    {{ __('Edit Laporan') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        @endif



        @endsection