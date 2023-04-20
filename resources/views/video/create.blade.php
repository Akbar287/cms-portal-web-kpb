@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/video") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Buat Video</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Cara Pengisian</h4>
                    <p style="font-size: 20px;">Url diisi oleh https://www.youtube.com/watch?v=<strong><span style="font-weight: bold; background-color: red;">ggp18gpPeuo</span></strong>.<br />yang di beri warna merah adalah ID video youtube maka itulah yang dimasukkan ke dalam Url di form ini!</p>
                </div>
                <form action="{{ url('/video') }}" method="post" enctype="multipart/form-data">@csrf 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3 justify-content-center">
                                <label for="organisasi_id" class="col-md-4 col-form-label text-md-end">{{ __('Organisasi')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="organisasi_id" id="organisasi_id" class="custom-select  @error('organisasi_id') is-invalid @enderror">
                                        @foreach($organisasi as $o)
                                        <option value="{{ $o->organisasi_id }}" {{ old('organisasi_id') == $o->organisasi_id ? 'selected' : '' }}>{{ $o->nama }}</option>
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
                                <label for="nama_video" class="col-md-4 col-form-label text-md-end">{{ __('Nama Video')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="nama_video" type="text"
                                        class="form-control @error('nama_video') is-invalid @enderror" name="nama_video"
                                        value="{{ old("nama_video") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nama_video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="url" class="col-md-4 col-form-label text-md-end">{{
                                    __('Url')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="url" type="text"
                                        class="form-control @error('url') is-invalid @enderror" name="url"
                                        value="{{ old("url") }}" autocomplete="url"
                                        autofocus>
        
                                    @error('url')
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
                                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ old('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
        
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="gambar" class="col-md-4 col-form-label text-md-end">{{
                                    __('Gambar')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                        <label class="custom-file-label" for="gambar">Pilih File</label>
                                    </div>
        
                                    @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="" alt="{{ old("nama") }}" class="img img-thumbnail img-temporary d-none" style="width: 800px; height: auto"> 
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/video") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
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