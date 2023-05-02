@extends('layouts.app')

@section('content')

<div class="container">
    <div class="title-wrap mb-2">
        <div class="title-pengumuman">
            <div class="container">
                Pengumuman
            </div>
        </div>
        <div class="subtitle-pengumuman">
            <div class="container">
                Anda dapat melihat informasi terkait desa Lobutua di sini.
            </div>
        </div>
    </div>

    @include('inc.messages')

    @can('pengumuman-create')
    <a href="/pengumuman/create" class="btn btn-success mb-2">Tambah Pengumuman</a>
    @endcan

    @if(count($pengumuman) > 0)

    @foreach($pengumuman->chunk(3) as $chunk)

    <div class="row">
        @foreach($chunk as $pengumuman)
        <div class="col-md-4 col-sm-12 col-xs-12" style="padding-bottom: 60px;">
            <div class="card">
                <img class="card-img-top" src="{{ asset($pengumuman->gambar) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $pengumuman->judul }}</h5>
                    <p class="card-text cut-text">{{ $pengumuman->konten }}</p>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <a href="/pengumuman/{{ $pengumuman->id }}" class="btn btn-detail w-100"><b>Detail</b></a>
                        </div>

                        @can('pengumuman-edit')
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <a href="/pengumuman/{{ $pengumuman->id }}/edit" class="btn btn-primary w-100"><b>Edit</b></a>
                        </div>
                        @endcan

                        @can('pengumuman-delete')
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            {{ Form::open(['action' => ['App\Http\Controllers\PengumumanController@destroy', $pengumuman->id], 'method' => 'POST', 'class' => 'pull-right']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Hapus', ['class' => 'btn btn-danger btn-hapus w-100 font-weight-bold', 'onclick' => "return confirm('Hapus Pengumuman?');"]) }}
                            {{ Form::close() }}
                        </div>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endforeach
    {{ $pengumuman->paginate(9)->links() }}
</div>

@else
<div class="row">
    <div class="col-md-6">
        Belum ada pengumuman
    </div>
</div>
@endif

</div>

@endsection
