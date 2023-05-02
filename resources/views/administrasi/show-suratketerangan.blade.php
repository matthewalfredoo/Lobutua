@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" id="container-show">
                    <div class="card" id="show-laporan">
                        <form method="get" action="#" id="form-show-laporan">
                            <h3 class="text-center form-show-laporan-title">
                                Pengurusan {{ $administrasi->getKategoriAdministrasi->nama_kategori }}
                            </h3>
                            @csrf
                            <br /><br />
    
                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 1 :') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data1 }}" disabled>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 2 :') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data2 }}" disabled>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 3 :') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data3 }}" disabled>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 4: ') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data4 }}" disabled>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 5 ') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data5 }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 6 ') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data6 }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 7 ') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data7 }}" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="judul-laporan-show" id="judul-laporan-show" class="col-md-3 col-form-label mx-auto">
                                    {{ __('Data 8 ') }}
                                </label>
    
                                <div class="col-md-6">
                                    <input id="judul2-laporan-show" type="text"
                                        class="form-control"  value="{{ $administrasi->data8 }}" disabled>
                                </div>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection