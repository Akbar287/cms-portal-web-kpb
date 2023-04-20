@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/video") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detil Video {{ $video->nama }}</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Cara Pengisian</h4>
                    <p style="font-size: 20px;">Url diisi oleh https://www.youtube.com/watch?v=<strong><span style="font-weight: bold; background-color: red;">ggp18gpPeuo</span></strong>.<br />yang di beri warna merah adalah ID video youtube maka itulah yang dimasukkan ke dalam Url di form ini!</p>
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3 justify-content-center">
                                <label for="organisasi_id" class="col-md-4 col-form-label text-md-end">{{ __('Organisasi')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select disabled name="organisasi_id" id="organisasi_id" class="custom-select  @error('organisasi_id') is-invalid @enderror">
                                        <option value="">{{ $video->organisasi()->first()->nama }}</option>
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
                                    <input readonly id="nama_video" type="text"
                                        class="form-control @error('nama_video') is-invalid @enderror" name="nama_video"
                                        value="{{ $video->nama_video }}" autocomplete="name"
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
                                    <input readonly id="url" type="text"
                                        class="form-control @error('url') is-invalid @enderror" name="url"
                                        value="{{ $video->url }}" autocomplete="url"
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
                                    <select disabled name="status" id="status" class="custom-select  @error('status') is-invalid @enderror">
                                        <option value="aktif" {{ $video->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $video->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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
                                        <input readonly disabled type="file" name="gambar" class="custom-file-input" id="gambar">
                                        <label class="custom-file-label" for="gambar">Pilih File</label>
                                    </div>
        
                                    @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="{{ asset('storage/video/' . $video->gambar) }}" alt="{{ $video->nama }}" class="img img-thumbnail img-temporary" style="width: 800px; height: auto"> 
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/video") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/video/" . $video->video_id . '/edit') }}" class="btn mr-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/video/" . $video->video_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('Video akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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