@extends('layouts.app')

@section('content')
    
    <div class="container">

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengantar.pindah') }}">Surat Pengantar Pindah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" disabled>Surat Pengantar KTP</a>
            </li>
        </ul>

        <form method="POST" action="{{ route('pengantar.store') }}" id="AdministrasiForm">
            <h4 class="text-center form-login-title">Surat Pengantar KTP</h4>
            <p class="form-login-subtitle col-md-12 text-center">Silahkan isi masing-masing field dengan data yang benar</p>
            @csrf
            <br/>
            <p class="col-md-9 text-left" id="descForm">
                Yang bertanda tangan di bawah ini, menerangkan permohonan pembuatan Surat Pengantar KTP
                Penduduk WNI dengan data sebagai berikut *
            </p>
            @csrf

            <div class="form-group">
                <label for="nameAdministrasi"
                    class="col-md-7 col-form-label text-md-left">{{ __('Nama Lengkap') }}</label>

                <div class="col-md-4">
                    <input id="nameAdministrasi" type="text"
                        class="form-control @error('data1') is-invalid @enderror" name="data1"
                        autocomplete="data1" value="{{ old('data1') }}">

                    @error('data1')
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

                    <input type="text" id="ttlAdministrasi"
                        class="form-control @error('data2') is-invalid @enderror" name="data2"
                        autocomplete="data2" style="width: 80px" value="{{ old('data2') }}">

                    @error('data2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="ttlAdministrasi" type="date"
                        class="form-control @error('ttlAdministrasi') is-invalid @enderror"
                        name="data3" autocomplete="data3"
                        style="width: 130px; margin-left: 2%" value="{{ old('data3') }}">

                    @error('data3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="jkAdministrasi"
                    class="col-md-7 col-form-label text-md-left">{{ __('Jenis Kelamin') }}</label>

                <div class="col-md-2">
                    <fieldset id="jenis_kelamin"
                        style="display: flex; flex-wrap:wrap; justify-content: space-between">
                        <div class="form-check">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-check-input @error('data4') is-invalid @enderror" type="radio" name="data4"
                                        id="pria_sp_ktp" value="Pria" {{ old('data4') == "Pria" ? "checked" : "" }}>
                                    <label class="form-check-label mr-5" for="pria_sp_ktp">
                                        Pria
                                    </label>

                                    <input class="form-check-input @error('data4') is-invalid @enderror" type="radio" name="data4"
                                        id="wanita_sp_ktp" value="Wanita" {{ old('data4') == "Wanita" ? "checked" : "" }}>
                                    <label class="form-check-label" for="wanita_sp_ktp">
                                        Wanita
                                    </label>

                                    @error('data4')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    @error('data4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="pekerjaanAdministrasi"
                    class="col-md-7 col-form-label text-md-left">{{ __('Pekerjaan') }}</label>

                <div class="col-md-4">
                    <input id="pekerjaanAdministrasi" type="text"
                        class="form-control @error('data5') is-invalid @enderror" name="data5"
                        autocomplete="data5" value="{{ old('data5') }}">

                    @error('data5')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="agamaAdministrasi"
                    class="col-md-7 col-form-label text-md-left">{{ __('Agama') }}</label>

                <div class="col-md-4">
                    <input id="agamaAdministrasi" type="text"
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
                <label for="SperkawinanAdministrasi"
                    class="col-md-7 col-form-label text-md-left">{{ __('Status Perkawinan') }}</label>

                <div class="col-md-3">
                    <select id="SperkawinanAdministrasi" class="form-select form-select-sm @error('data7') is-invalid @enderror"
                        aria-label=".form-select-sm example" id="SperkawinanAdministrasi"
                        name="data7" autocomplete="data7">
                        <option selected disabled>Pilih</option>
                        <option value="Belum Menikah" {{ old('data7') == "Belum Menikah" ? "selected" : "" }}>Belum Menikah</option>
                        <option value="Sudah Menikah" {{ old('data7') == "Sudah Menikah" ? "selected" : "" }}>Sudah Menikah</option>
                        <option value="Cerai" {{ old('data7') == "Cerai" ? "selected" : "" }}>Cerai</option>
                    </select>

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
                    <textarea id="alamatAdministrasi" type="text" rows="7"
                        class="form-control @error('data8') is-invalid @enderror" name="data8"
                        value="{{ old('data8') }}" autocomplete="data8">{{ old('data8') }}</textarea>

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
                    <input name="Pernyataan" type="checkbox" class="form-check-input @error('Pernyataan') is-invalid @enderror" id="check-ktp">
                    <label class="form-check-label" for="check-ktp">Demikian pengajuan surat pengantar ini
                        dibuat agar digunakan sebagaimana mestinya.</label>

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
                    <input type="hidden" name="kategori" value="4">
                    <button type="submit" class="btn btn-login" id="submitBerkas">
                        {{ __('Kirim Berkas') }}
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection