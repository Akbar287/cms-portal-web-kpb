@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/organisasi") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detail Organisasi {{ $organisasi->nama }}</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="row mb-3 justify-content-center">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama')
                                }}</label>
    
                            <div class="col-md-6">
                                <input id="nama" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ $organisasi->nama }}" autocomplete="name" readonly
                                    autofocus>
    
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="row mb-3 justify-content-center">
                            <label for="nama_singkat" class="col-md-4 col-form-label text-md-end">{{ __('Nama Singkat')
                                }}</label>
    
                            <div class="col-md-6">
                                <input id="nama_singkat" type="nama_singkat"
                                    class="form-control @error('nama_singkat') is-invalid @enderror" name="nama_singkat"
                                    value="{{ $organisasi->nama_singkat }}" readonly autocomplete="nama_singkat">
    
                                @error('nama_singkat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
    
                        <div class="row mb-3 justify-content-center">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{
                                __('Alamat')
                                }}</label>
    
                            <div class="col-md-6">
                                <input id="alamat" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror" readonly name="alamat"
                                    value="{{ $organisasi->alamat }}"
                                autocomplete="off">
    
                                @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3 justify-content-center">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{
                                __('deskripsi')
                                }}</label>
    
                            <div class="col-md-6">
                                <textarea id="deskripsi" type="text"
                                class="form-control @error('deskripsi') is-invalid @enderror" readonly name="deskripsi" cols="30" rows="10">{{ $organisasi->deskripsi }}</textarea>
    
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3 justify-content-center">
                            <label for="icon" class="col-md-4 col-form-label text-md-end">{{
                                __('icon')
                                }}</label>
    
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" readonly disabled name="icon" class="custom-file-input" id="icon">
                                    <label class="custom-file-label" for="icon">Pilih File</label>
                                </div>
    
                                @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <img src="{{ asset('storage/organisasi/' . $organisasi->icon) }}" alt="{{ $organisasi->nama }}" class="img img-thumbnail" style="width: 400px; height: 400px"> 
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                <a type="button" href="{{ url("/organisasi") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <a type="button" href="{{ url("/organisasi/" . $organisasi->organisasi_id . '/edit') }}" class="btn mx-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                <form action="{{ url('/organisasi/'.$organisasi->organisasi_id) }}" method="POST">@csrf @method('delete')
                                    <button type="submit" onclick="return confirm('Organisasi akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection