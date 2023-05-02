@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>{{ $pengumuman->judul }}</h4>
        
        @if ($pengumuman->waktu_dibuat == $pengumuman->waktu_diperbarui)
            <h6>Dipublikasikan pada {{ $pengumuman->waktu_dibuat }}</h6> 
            <h6>Dibuat oleh {{ $pengumuman->getAdmin->name }}</h6>
        @else
            <h6>Publikasi diperbaharui pada {{ $pengumuman->waktu_diperbarui }}</h6>
            <h6>Diperbaharui oleh {{ $pengumuman->getAdmin->name }}</h6>
        @endif
        
        <hr/>
        <div class="kurung">
        
            <div class="gambarrr mr-4" style="float:left; width: 50%;">
                <img src="{{ asset($pengumuman->gambar) }}" alt="Card image cap" width="100%">
            </div>
            
            <div class="teks">
                <p>{{ $pengumuman->konten }}</p>
            </div>
        
        </div>
        
    </div>
@endsection