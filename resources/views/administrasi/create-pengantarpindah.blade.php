@extends('layouts.app')

@section('content')

<div class="container">

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" disabled>Surat Pengantar Pindah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pengantar.ktp') }}">Surat Pengantar KTP</a>
        </li>
    </ul>

    <form method="POST" action="{{ route('pengantar.store') }}" id="AdministrasiForm">
        <h4 class="text-center form-login-title">Surat Pengantar Pindah</h4>
        <p class="form-login-subtitle col-md-12 text-center">Silahkan isi masing-masing field dengan data yang benar</p>
        @csrf
        <br />
        <p class="col-md-9 text-left" id="descForm">
            Yang bertanda tangan di bawah ini, menerangkan permohonan pembuatan 
            Surat Pengantar Pindah Penduduk WNI dengan data sebagai berikut *
        </p>

        <div class="form-group">
            <label for="nikAdministrasi" class="col-md-7 col-form-label text-md-left">{{ __('NIK') }}</label>

            <div class="col-md-4">
                <input id="nikAdministrasi" type="text" class="form-control @error('data1') is-invalid @enderror" name="data1"  autocomplete="data1" value="{{ old('data1') }}" autofocus>

                @error('data1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nameAdministrasi" class="col-md-7 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

            <div class="col-md-4">
                <input id="nameAdministrasi" type="text" class="form-control @error('data2') is-invalid @enderror" name="data2"  autocomplete="data2" value="{{ old('data2') }}">

                @error('data2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nokkAdministrasi" class="col-md-7 col-form-label text-md-left">{{ __('Nomor Kartu Keluarga') }}</label>

            <div class="col-md-4">
                <input id="nokkAdministrasi" type="text" class="form-control @error('data3') is-invalid @enderror" name="data3"  autocomplete="data3" value="{{ old('data3') }}">

                @error('data3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="data4" class="col-md-7 col-form-label text-md-left">{{ __('Status Perkawinan') }}</label>

            <div class="col-md-3">
                <select id="JkeluargaAdministrasi" class="form-select form-select-sm @error('data4') is-invalid @enderror" aria-label=".form-select-sm example" name="data4" value="{{ old('data4') }}" autocomplete="data4">
                    <option selected disabled>Pilih</option>
                    <option value="Belum Menikah" {{ old('data4') == "Belum Menikah" ? "selected" : "" }}>Belum Menikah</option>
                    <option value="Sudah Menikah" {{ old('data4') == "Sudah Menikah" ? "selected" : "" }}>Sudah Menikah</option>
                    <option value="Cerai" {{ old('data4') == "Cerai" ? "selected" : "" }}>Cerai</option>
                </select>

                @error('data4')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="JkeluargaAdministrasi" class="col-md-7 col-form-label text-md-left">{{ __('Jumlah Keluarga') }}</label>

            <div class="col-md-2">
                <select id="JkeluargaAdministrasi" class="form-select form-select-sm @error('data5') is-invalid @enderror" aria-label=".form-select-sm example" id="JkeluargaAdministrasi" name="data5" value="{{ old('data5') }}" autocomplete="data5">
                    <option selected disabled>Pilih</option>
                    <option value="1" {{ old('data5') == "1" ? "selected" : "" }}>1</option>
                    <option value="2" {{ old('data5') == "2" ? "selected" : "" }}>2</option>
                    <option value="3" {{ old('data5') == "3" ? "selected" : "" }}>3</option>
                    <option value="4" {{ old('data5') == "4" ? "selected" : "" }}>4</option>
                    <option value="Lainnya" {{ old('data5') == "Lainnya" ? "selected" : "" }}>Lainnya</option>
                </select>

                @error('data5')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="alamatSAdministrasi" class="col-md-6 col-form-label text-md-left">{{ __('Alamat Sekarang') }}</label>

            <div class="col-md-5">
                <textarea id="alamatSAdministrasi" rows="4" class="form-control @error('data6') is-invalid @enderror" name="data6" autocomplete="data6">{{ old('data6') }}</textarea>

                @error('data6')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="alamatTAdministrasi" class="col-md-6 col-form-label text-md-left">{{ __('Alamat Tujuan') }}</label>

            <div class="col-md-5">
                <textarea id="alamatTAdministrasi" rows="4" class="form-control @error('data7') is-invalid @enderror" name="data7" autocomplete="data7">{{ old('data7') }}</textarea>

                @error('data7')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="alamatTAdministrasi" class="col-md-6 col-form-label text-md-left">{{ __('Alasan Pindah') }}</label>

            <div class="col-md-5">
                <textarea id="alamatTAdministrasi" rows="4" class="form-control @error('data8') is-invalid @enderror" name="data8" autocomplete="data8">{{ old('data8') }}</textarea>

                @error('data8')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <br />

        <div class="col-md-9">
            <div id="checkbox-administrasi-container" class="ml-3">
                <input type="checkbox" name="Pernyataan" class="form-check-input @error('Pernyataan') is-invalid @enderror" id="check-pengantar-pindah">
                <label class="form-check-label" for="check-pengantar-pindah">
                    Demikian pengajuan surat pengantar ini dibuat agar digunakan sebagaimana mestinya.
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
                <input type="hidden" name="kategori" value="3">
                <button type="submit" class="btn btn-login" id="submitBerkas">
                    {{ __('Kirim Berkas') }}
                </button>
            </div>
        </div>
    </form>

</div>

@endsection
