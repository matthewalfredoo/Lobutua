<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
        <h2 id="judul-laporan-pdf">{{ __('Laporan ') }} {{ $laporan->getKategori->getKategoriInduk->nama }}</h2>
        <table border="0" cellspacing="20" cellpadding="5" align="center">
            <tr>
                <td width="100px">{{ __('Judul Laporan') }}</td>
                <td>{{ __(':') }}</td>
                <td>{{ $laporan->judul }}</td>
            </tr>
            <tr>
                <td>{{ __('Nama Lengkap') }}</td>
                <td>{{ __(':') }}</td>
                <td>{{ $laporan->nama }}</td>
            </tr>
            <tr>
                <td>{{ __('Nomor HP') }}</td>
                <td>{{ __(':') }}</td>
                <td>{{ $laporan->no_hp }}</td>
            </tr>
            <tr>
                <td>{{ __('Lokasi ') }} {{$laporan->getKategori->getKategoriInduk->nama}}</td>
                <td>{{ __(':') }}</td>
                <td>{{ $laporan->lokasi }}</td>
            </tr>
            <tr>
                <td>{{ __('Kategori ') }} {{$laporan->getKategori->getKategoriInduk->nama}}</td>
                <td>{{ __(':') }}</td>
                <td>{{ $laporan->getKategori->nama_kategori }}</td>
            </tr>
            <tr>
                <td>{{ __('Keterangan Laporan') }}</td>
                <td>{{ __(':') }}</td>
                <td>{{ $laporan->keterangan }}</td>
            </tr>
            <tr>
                <td style="vertical-align:top">{{ __('Bukti Gambar') }}</td>
                <td style="vertical-align:top">{{ __(':') }}</td>
                <td><img src="{{ public_path($laporan->bukti_gambar) }}" id="img-laporan-pdf"></td>
            </tr>
        </table>

    <!-- <div class="container">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" id="container-pdf">
                    <div class="card" id="pdf-laporan">
                        <form method="POST" action="{{ route('laporan.pdf', $laporan->id) }}" id="form-pdf-laporan">
                            <h3 class="text-center form-pdf-laporan-title">Laporan
                                {{ $laporan->getKategori->getKategoriInduk->nama }}</h3>
                            @csrf
                            <br /><br />

                            <div class="form-group row">
                                <label for="judul-laporan-pdf" id="judul-laporan-pdf"
                                    class="col-form-label mx-auto">{{ __('Judul Laporan :') }}</label>

                                <div class="form-group row">
                                    <input id="judul2-laporan-pdf" type="text"
                                        class="form-control @error('judul-laporan-pdf') is-invalid @enderror"
                                        name="judul-laporan-pdf" value="{{ $laporan->judul }}" required
                                        autocomplete="judul-laporan-pdf" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-pdf" id="judul-laporan-pdf"
                                    class="col-form-label mx-auto">{{ __('Nama :') }}</label>

                                <div class="form-group row">
                                    <input id="judul2-laporan-pdf" type="text"
                                        class="form-control @error('judul-laporan-pdf') is-invalid @enderror"
                                        name="judul-laporan-pdf" value="{{ $laporan->nama }}" required
                                        autocomplete="judul-laporan-pdf" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-pdf" id="judul-laporan-pdf"
                                    class="col-form-label mx-auto">{{ __('Nomor HP :') }}</label>

                                <div class="form-group row">
                                    <input id="judul2-laporan-pdf" type="text"
                                        class="form-control @error('judul-laporan-pdf') is-invalid @enderror"
                                        name="judul-laporan-pdf" value="{{ $laporan->no_hp }}" required
                                        autocomplete="judul-laporan-pdf" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-pdf" id="judul-laporan-pdf"
                                    class="col-form-label mx-auto">{{ __('Lokasi ') }}
                                    {{$laporan->getKategori->getKategoriInduk->lokasi}} :</label>

                                <div class="form-group row">
                                    <input id="judul2-laporan-pdf" type="text"
                                        class="form-control @error('judul-laporan-pdf') is-invalid @enderror"
                                        name="judul-laporan-pdf" value="{{ $laporan->lokasi }}" required
                                        autocomplete="judul-laporan-pdf" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-pdf" id="judul-laporan-pdf"
                                    class="col-form-label mx-auto">{{ __('Kategori ') }}
                                    {{$laporan->getKategori->getKategoriInduk->nama}} :</label>

                                <div class="form-group row">
                                    <input id="judul2-laporan-pdf" type="text"
                                        class="form-control @error('judul-laporan-pdf') is-invalid @enderror"
                                        name="judul-laporan-pdf" value="{{ $laporan->getKategori->nama_kategori }}" required
                                        autocomplete="judul-laporan-pdf" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="keterangan-laporan-pdf" id="keterangan-laporan-pdf"
                                    class="col-form-label mx-auto">{{ __('Keterangan Laporan :') }}</label>

                                <div class="form-group row">
                                    <textarea id="keterangan2-laporan-pdf" type="text"
                                        class="form-control @error('keterangan-laporan-pdf') is-invalid @enderror"
                                        name="keterangan-laporan-pdf" required autocomplete="keterangan-laporan-pdf"
                                        disabled rows="5">{{ $laporan->keterangan }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul2-laporan-pdf" id="judul-laporan-pdf"
                                    class="col-sm-3 col-form-label mx-auto">{{ __('Bukti Gambar :') }}</label>

                                <div class="form-group row">
                                    <img src="{{ public_path($laporan->bukti_gambar) }}" id="img-laporan-pdf">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</body>

</html>