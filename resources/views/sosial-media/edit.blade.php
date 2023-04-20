@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/sosial-media/" . $sosialMedia->sosial_media_id) }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Ubah Sosial Media {{ $sosialMedia->nama_sosmed }}</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <form action="{{ url('/sosial-media/' . $sosialMedia->sosial_media_id) }}" method="post" enctype="multipart/form-data">@csrf @method('put')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3 justify-content-center">
                                <label for="organisasi_id" class="col-md-4 col-form-label text-md-end">{{ __('Organisasi')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="organisasi_id" id="organisasi_id" class="custom-select  @error('organisasi_id') is-invalid @enderror">
                                        @foreach($organisasi as $o)
                                        <option value="{{ $o->organisasi_id }}" {{ $sosialMedia->organisasi()->first()->organisasi_id == $o->organisasi_id ? 'selected' : '' }}>{{ $o->nama }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('organisasi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="nama_sosmed" class="col-md-4 col-form-label text-md-end">{{ __('Nama Sosial Media')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="nama_sosmed" type="text"
                                        class="form-control @error('nama_sosmed') is-invalid @enderror" name="nama_sosmed"
                                        value="{{ $sosialMedia->nama_sosmed }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nama_sosmed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Url Sosial Media')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="url" type="text"
                                        class="form-control @error('url') is-invalid @enderror" name="url"
                                        value="{{ $sosialMedia->url }}" autocomplete="name"
                                        autofocus>
        
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="urutan" class="col-md-4 col-form-label text-md-end">{{
                                    __('Urutan')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="urutan" type="number" min="1" max="1000"
                                        class="form-control @error('urutan') is-invalid @enderror" name="urutan"
                                        value="{{ $sosialMedia->urutan }}" autocomplete="urutan"
                                        autofocus>
        
                                    @error('urutan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{
                                    __('status')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="status" id="status" class="custom-select  @error('status') is-invalid @enderror">
                                        <option value="aktif" {{ $sosialMedia->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $sosialMedia->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
        
                                    @error('status')
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
                                        <input type="file" name="icon" class="custom-file-input" id="icon">
                                        <label class="custom-file-label" for="icon">Pilih File</label>
                                    </div>
        
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="{{ asset("storage/sosial-media/" . $sosialMedia->icon) }}" alt="{{ $sosialMedia->nama }}" class="img img-thumbnail img-temporary" style="width: 400px; height: auto"> 
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/sosial-media/" . $sosialMedia->sosial_media_id) }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn mx-2 btn-success"><i class="fas fa-pen"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection