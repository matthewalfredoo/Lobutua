@extends('layouts.app')

@section('content')

@error('keteranganLaporan')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="container">

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pribadi.create_aktaLahir') }}">Akta Lahir</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active">Akta Mati</a>
        </li>
    </ul>

    <form method="POST" action="{{ route('pribadi.store') }}" id="AdministrasiForm" enctype="multipart/form-data">
        <h4 class="text-center form-login-title">Akta Mati
        </h4>
        <p class="form-login-subtitle col-md-12 text-center">
            Silahkan isi masing-masing field dengan data yang benar
        </p>
        @csrf

        <br />

        <p class="col-md-9 text-left" id="descForm">
            Yang bertanda tangan di bawah ini, menerangkan pengajuan pembuatan Akta Mati
            dengan data sebagai berikut *
        </p>
        @csrf

        <div class="form-group">
            <label for="nameAdministrasi" class="col-md-7 col-form-label text-md-left">{{ __('Nama Lengkap Mendiang') }}</label>

            <div class="col-md-4">
                <input id="nameAdministrasi" type="text" class="form-control @error('nameAdministrasi') is-invalid @enderror" name="nameAdministrasi"  autocomplete="nameAdministrasi" autofocus>

                @error('nameAdministrasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="customFile" class="col-md-7 col-form-label text-md-left">{{ __('Foto Kartu Tanda Penduduk Mendiang :') }}</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('customFile1') is-invalid @enderror" id="customFile" name="customFile1" value="{{ old('customFile1') }}"  autocomplete="customFile1">
                    <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>

                    @error('customFile1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="customFile" class="col-md-7 col-form-label text-md-left">{{ __('Foto Kartu Tanda Penduduk Pelapor :') }}</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('customFile2') is-invalid @enderror" id="customFile" name="customFile2" value="{{ old('customFile2') }}"  autocomplete="customFile2">
                    <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>

                    @error('customFile2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="customFile" class="col-md-7 col-form-label text-md-left">{{ __('Foto Kartu Tanda Penduduk Saksi :') }}</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('customFile3') is-invalid @enderror" id="customFile" name="customFile3" value="{{ old('customFile3') }}"  autocomplete="customFile3">
                    <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>

                    @error('customFile3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="customFile" class="col-md-7 col-form-label text-md-left">{{ __('Foto Akta Kelahiran / Perkawinan / SBKRI :') }}</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('customFile4') is-invalid @enderror" id="customFile" name="customFile4" value="{{ old('customFile4') }}"  autocomplete="customFile4">
                    <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>

                    @error('customFile4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="customFile" class="col-md-7 col-form-label text-md-left">{{ __('Foto Surat Keterangan Dari Rumah Sakit :') }}</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('customFile5') is-invalid @enderror" id="customFile" name="customFile5" value="{{ old('customFile5') }}"  autocomplete="customFile5">
                    <label class="custom-file-label" for="customFile" id="customFile">Pilih file</label>

                    @error('customFile5')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="customFile" class="col-md-7 col-form-label text-md-left">{{ __('Foto Surat Keterangan Kematian dari Kelurahan :') }}</label>

            <div class="col-md-7">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('customFile6') is-invalid @enderror" id="customFile" name="customFile6" value="{{ old('customFile6') }}"  autocomplete="customFile6">
                    <label class="custom-file-label" for="customFile" id="customFile" id="customFile">Pilih file</label>

                    @error('customFile6')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <br />

        <div class="col-md-9">
            <div id="checkbox-administrasi-container" class="ml-3">
                <input type="checkbox" name="Pernyataan" class="form-check-input @error('Pernyataan') is-invalid @enderror" id="check-akta-mati">
                <label class="form-check-label" for="check-akta-mati">
                    Demikian pengajuan dokumen ini dibuat agar digunakan sebagaimana mestinya.
                </label>

                @error('Pernyataan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <br />

        <div class="form-group mb-0 text-left">
            <div class="col-md-2">
                <input type="hidden" name="kategori" value="2">
                <button type="submit" class="btn btn-login" id="submitBerkas">
                    {{ __('Kirim Berkas') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
