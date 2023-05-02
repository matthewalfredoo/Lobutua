@extends('layouts.app')

@section('content')

<div class="container">

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('keterangan.domisili') }}">Surat Keterangan Domisili</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('keterangan.kematian') }}">Surat Keterangan Kematian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active">Surat Keterangan Kurang Mampu</a>
        </li>
    </ul>

    <form method="POST" action="{{ route('keterangan.store') }}" id="AdministrasiForm">
        <h4 class="text-center form-login-title">Surat Keterangan Kurang Mampu
        </h4>
        <p class="form-login-subtitle col-md-12 text-center">
            Silahkan isi masing-masing field dengan data yang benar
        </p>
        @csrf

        <br />

        <p class="col-md-9 text-left" id="descForm">
            Yang bertanda tangan di bawah ini, menerangkan permohonan pembuatan Surat
            Keterangan Kurang Mampu dengan data sebagai berikut *
        </p>
        @csrf

        <div class="form-group">
            <label for="nameAdministrasi"
                class="col-md-7 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

            <div class="col-md-4">
                <input id="nameAdministrasi" type="text"
                    class="form-control @error('data1') is-invalid @enderror" name="data1"
                    autocomplete="data1" autofocus value="{{ old('data1') }}">

                @error('data1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nameAdministrasi"
                class="col-md-7 col-form-label text-md-left">{{ __('No. KTP/KK') }}</label>

            <div class="col-md-4">
                <input id="nameAdministrasi" type="text"
                    class="form-control @error('data2') is-invalid @enderror" name="data2"
                    autocomplete="data2" value="{{ old('data2') }}">

                @error('data2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="ttlAdministrasi"
                class="col-md-7 col-form-label text-md-left">{{ __('Tempat/Tgl.Lahir') }}</label>

            <div class="col-md-6" id="ttlPosition">

                <input type="text" id="ttlAdministrasi" class="form-control @error('data3') is-invalid @enderror"
                    name="data3" autocomplete="data3" style="width: 80px" value="{{ old('data3') }}">

                @error('data3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="ttlAdministrasi" type="date"
                    class="form-control @error('data4') is-invalid @enderror" name="data4"
                    autocomplete="data4" style="width: 130px; margin-left: 2%" value="{{ old('data4') }}">

                @error('data4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="jkAdministrasi" class="col-md-7 col-form-label text-md-left">{{ __('Jenis Kelamin') }}</label>

            <div class="col-md-2">
                <fieldset id="jenis_kelamin" style="display: flex; flex-wrap:wrap; justify-content: space-between">
                    <div class="form-check">
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-check-input @error('data5') is-invalid @enderror" type="radio"
                                    name="data5" id="pria_sp_ktp" value="Pria"
                                    {{ old('data5') == 'Pria' ? 'checked' : '' }}>
                                <label class="form-check-label mr-5" for="pria_sp_ktp">
                                    Pria
                                </label>

                                <input class="form-check-input @error('data5') is-invalid @enderror" type="radio"
                                    name="data5" id="wanita_sp_ktp" value="Wanita"
                                    {{ old('data5') == 'Wanita' ? 'checked' : '' }}>
                                <label class="form-check-label" for="wanita_sp_ktp">
                                    Wanita
                                </label>

                                @error('data5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            
        </div>

        <div class="form-group">
            <label for="nameAdministrasi"
                class="col-md-7 col-form-label text-md-left">{{ __('Agama') }}</label>

            <div class="col-md-4">
                <input id="nameAdministrasi" type="text"
                    class="form-control @error('data6') is-invalid @enderror" name="data6"
                    autocomplete="data6" value="{{ old('data6') }}">

                @error('data6')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="nameAdministrasi"
                class="col-md-7 col-form-label text-md-left">{{ __('Pekerjaan') }}</label>

            <div class="col-md-4">
                <input id="nameAdministrasi" type="text"
                    class="form-control @error('data7') is-invalid @enderror" name="data7"
                    autocomplete="data7" {{ old('data7') }}>

                @error('data7')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="alamatAdministrasi"
                class="col-md-6 col-form-label text-md-left">{{ __('Alamat') }}</label>

            <div class="col-md-5">
                <textarea class="form-control @error('data8') is-invalid @enderror" id="alamatAdministrasi" rows="4" name="data8">{{ old('data8') }}</textarea>

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
                <input name="Pernyataan" type="checkbox" class="form-check-input @error('Pernyataan') is-invalid @enderror" id="check-keterangan-domisili">
                <label class="form-check-label" for="check-keterangan-domisili">
                    Demikian pengajuan surat keterangan ini dibuat agar digunakan sebagaimana mestinya.
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
                <input type="hidden" name="kategori" value="7">
                <button type="submit" class="btn btn-login" id="submitBerkas">
                    {{ __('Kirim Berkas') }}
                </button>
            </div>
        </div>
    </form>

</div>

@endsection