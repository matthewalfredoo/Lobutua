@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tambah Pengumuman</h3>

    {!! Form::open(['action' => 'App\Http\Controllers\PengumumanController@store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('judul', 'Judul Pengumuman') }}
            {{ Form::text('judul', '', ['class' => 'form-control ' . ($errors->has('judul') ? ' is-invalid' : null), 'placeholder' => 'Judul Pengumuman...']) }}
            @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('konten', 'Isi Pengumuman') }}
            {{ Form::textarea('konten', '', ['class' => 'form-control ' . ($errors->has('konten') ? ' is-invalid' : null), 'placeholder' => 'Tulis isi pengumuman di sini...']) }}
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
                {{ Form::select('kategori_pengumuman_id', ['0' => '-Pilih-', '1' => 'Umum', '2' => 'Penting', '3' => 'Lowongan Pekerjaan'], 0, ['class' => 'form-select form-select-sm' . ($errors->has('kategori_pengumuman_id') ? ' is-invalid' : null)], ['0' => ["disabled" => true]]) }}
                @error('kategori_pengumuman_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                {{ Form::label('gambar', 'Gambar') }}
                <br/>
                {{ Form::file('gambar', ['class' => 'form-control ' . ($errors->has('gambar') ? ' is-invalid' : null)]) }}
                @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{ Form::submit('Upload', ['class' => 'btn btn-success']) }}
    {!! Form::close() !!}
</div>
@endsection