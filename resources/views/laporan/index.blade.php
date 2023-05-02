@extends('layouts.app')

@section('content')

    <div class="container">

        @include('inc.messages')

        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <h3>Daftar Laporan</h3>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-md-3 col-sm-12 col-xs-12"></div>
            <div class="col-md-2 col-sm-12 col-xs-12">
                @can('laporan-create')
                    <a href="{{ route('laporan.create-infrastruktur') }}" id="tambahLaporan"><i
                            class="fas fa-plus text-center"></i> Tambah Laporan</a>
                @endcan
            </div>
        </div>

        @if (count($laporan) > 0)
            <ul class="list-group list-group-flush mt-3">
                @foreach ($laporan as $Laporan)
                    <li class="list-group-item" style="padding: 10px 0;">
                        <h4><a href="{{ route('laporan.show', $Laporan->id) }}"
                                id="judul-laporan-show">{{ $Laporan->judul }}</a></h4>
                        <span class="text-keterangan-laporan">
                            {{ $Laporan->keterangan }}
                        </span>
                        <br />
                        <span>
                            @can('pengumuman-create')
                                Dibuat oleh <b>{{ $Laporan->getUser->name }}</b>
                            @endcan
                        </span>
                        <div class="icon-edit-laporan">
                            <span class="text-date-laporan">

                                @if ($Laporan->waktu_dibuat == $Laporan->waktu_diperbarui)
                                    Created at: {{ $Laporan->waktu_dibuat }}
                                @else
                                    Updated at: {{ $Laporan->waktu_diperbarui }}
                                @endif
                            </span>
                            <div class="icon-edit-laporan-group">
                                @if ($Laporan->status == 'Diperiksa')
                                    <label class="badge badge-warning">{{ $Laporan->status }}</label>
                                @endif


                                @if ($Laporan->status == 'Proses')
                                    <label class="badge badge-primary">{{ $Laporan->status }}</label>
                                @endif

                                @if ($Laporan->status == 'Selesai')
                                    <label class="badge badge-success">{{ $Laporan->status }}</label>
                                @endif

                                @if ($Laporan->status == 'Ditolak')
                                    <label class="badge badge-danger">{{ $Laporan->status }}</label>
                                @endif

                                @can('laporan-list')
                                    <a href="{{ route('laporan.destroy', $Laporan->id) }}"
                                        onclick="return confirm('Hapus Laporan?');"><i class="far fa-trash-alt"></i></a>
                                @endcan

                                @can('laporan-delete')
                                    <a href="{{ route('laporan.edit', $Laporan->id) }}"><i class="far fa-edit"></i></a>
                                @endcan

                            </div>
                        </div>

                        @can('pengumuman-create')
                            <div class="form-status">
                                <form method="POST" action="{{ route('laporan.status', $Laporan->id) }}">
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
                            </div>
                        @endcan

                    </li>
                @endforeach
            </ul>
            {{ $laporan->links() }}

        @else
            <div class="row">
                <div class="col-md-6">
                    <p>Anda belum mengajukan laporan apapun</p>
                </div>
            </div>

        @endif
    </div>

@endsection
