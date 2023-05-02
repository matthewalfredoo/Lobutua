@extends('layouts.app')

@section('content')

    <div class="container">
        @include('inc.messages')

        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('administrasi.pribadi') ? 'active' : '' }}"
                    href="{{ route('administrasi.pribadi') }}">
                    Dokumen Pribadi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('administrasi.pengantar') ? 'active' : '' }}"
                    href="{{ route('administrasi.pengantar') }}">
                    Surat Pengantar
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('administrasi.keterangan') ? 'active' : '' }}"
                    href="{{ route('administrasi.keterangan') }}">
                    Surat Keterangan
                </a>
            </li>
        </ul>

        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <h3>Daftar {{ $administrasi->nama_administrasi }}</h3>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12"></div>
            <div class="col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-md-2 col-sm-12 col-xs-12">
                @can('laporan-create')
                    @if(request()->routeIs('administrasi.pribadi'))
                        <a href="{{ route('pribadi.create_aktaLahir') }}" id="tambahLaporan"><i class="fas fa-plus text-center"></i> Buat Dokumen</a>
                    @endif
                    @if(request()->routeIs('administrasi.pengantar'))
                        <a href="{{ route('pengantar.pindah') }}" id="tambahLaporan"><i class="fas fa-plus text-center"></i> Buat Dokumen</a>
                    @endif
                    @if(request()->routeIs('administrasi.keterangan'))
                        <a href="{{ route('keterangan.domisili') }}" id="tambahLaporan"><i class="fas fa-plus text-center"></i> Buat Dokumen</a>
                    @endif
                @endcan
            </div>
        </div>


        @if ($administrasi->count() > 0)

            @foreach ($administrasi as $dok)
                <li class="list-group-item">
                    <h4>
                        <a href="{{ route("$dok->jenis.show", $dok->id) }}" id="judul-laporan-show">
                            {{ $dok->data1 }}_Berkas-{{ $dok->getKategoriAdministrasi->nama_kategori }}
                        </a>
                    </h4>

                    <div class="icon-edit-laporan">
                        <label class="text-date-laporan">
                            Created at: {{ $dok->waktu_dibuat }} 
                            @can('pengumuman-create')
                                | Dibuat oleh: <b>{{ $dok->getUser->name }}</b>
                            @endcan
                        </label>

                        <div class="icon-edit-laporan-group">

                            @if ($dok->status == 'Diperiksa')
                                <label class="badge badge-warning">{{ $dok->status }}</label>
                            @endif

                            @if ($dok->status == 'Proses')
                                <label class="badge badge-primary">{{ $dok->status }}</label>
                            @endif

                            @if ($dok->status == 'Selesai')
                                <label class="badge badge-success">{{ $dok->status }}</label>
                            @endif

                            @if ($dok->status == 'Ditolak')
                                <label class="badge badge-danger">{{ $dok->status }}</label>
                            @endif

                        </div>
                    </div>

                    <div class="form-status">
                        @can('pengumuman-create')
                            <form method="POST" action="{{ route("$dok->jenis.status", $dok->id) }}">
                                @csrf
                                <select class="form-select form-select-sm" name="status"
                                    onchange='if(this.value != 0) { this.form.submit(); }'>
                                    <option value='0' disabled selected>Status</option>
                                    <option value='Diperiksa'>Diperiksa</option>
                                    <option value='Proses'>Proses</option>
                                    <option value='Selesai'>Selesai</option>
                                    <option value='Ditolak'>Ditolak</option>
                                </select>
                            </form>
                        @endcan
                    </div>
                </li>
            @endforeach

        @else
                
            <h5>Anda belum mengajukan pembuatan administrasi kategori {{ $administrasi->nama_administrasi }}</h5>

        @endif
    </div>

@endsection
