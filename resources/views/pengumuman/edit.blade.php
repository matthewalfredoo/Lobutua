@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Edit Pengumuman</h3>
        {!! Form::open(['action' => ['App\Http\Controllers\PengumumanController@update', $pengumuman->id], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{ Form::label('judul', 'Judul Pengumuman') }}
                {{ Form::text('judul', $pengumuman->judul, ['class' => 'form-control' . ($errors->has('judul') ? ' is-invalid' : null), 'placeholder' => 'Judul Pengumuman...']) }}
                @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('konten', 'Isi Pengumuman') }}
                {{ Form::textarea('konten', $pengumuman->konten, ['class' => 'form-control ' . ($errors->has('konten') ? ' is-invalid' : null), 'placeholder' => 'Tulis isi pengumuman di sini...']) }}
                @error('konten')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    {{ Form::label('kategori_pengumuman_id', 'Kategori Pengumuman') }}
                    <br/>
                    {{ Form::select('kategori_pengumuman_id', ['1' => 'Umum', '2' => 'Penting', '3' => 'Lowongan Pekerjaan'], $pengumuman->kategori_pengumuman_id, ['class' => 'form-select form-select-sm ' . ($errors->has('kategori_pengumuman_id') ? ' is-invalid' : null)]) }}
                    @error('kategori_pengumuman_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <span>Gambar pengumuman saat ini</span>
                    <br/>
                    <img src="{{ asset($pengumuman->gambar) }}" alt="Gambar {{ $pengumuman->judul }}" class="img-pengumuman-edit">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    {{ Form::label('gambar', 'Gambar') }}
                    <br/>
                    {{ Form::file('gambar', ['class' => 'form-control']) }}
                </div>
            </div>
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Edit', ['class' => 'btn btn-success']) }}
        {!! Form::close() !!}
    </div>
@endsection