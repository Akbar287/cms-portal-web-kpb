@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/gallery/foto") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detail Gallery Foto</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3 justify-content-center">
                                <label for="organisasi_id" class="col-md-4 col-form-label text-md-end">{{ __('Organisasi')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select disabled name="organisasi_id" id="organisasi_id" class="custom-select  @error('organisasi_id') is-invalid @enderror">
                                        <option value="">{{ $galleryFoto->organisasi()->first()->nama }}</option>
                                    </select>
        
                                    @error('organisasi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="nama_gallery_foto" class="col-md-4 col-form-label text-md-end">{{ __('Nama Gallery Foto')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="nama_gallery_foto" type="text"
                                        class="form-control @error('nama_gallery_foto') is-invalid @enderror" name="nama_gallery_foto"
                                        value="{{ $galleryFoto->nama_gallery_foto }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nama_gallery_foto')
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
                                    <textarea readonly id="url" type="text"
                                    class="form-control @error('url') is-invalid @enderror" name="url" cols="30" rows="10">{{ $galleryFoto->url }}</textarea>
        
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
                                        <option value="aktif" {{ $galleryFoto->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $galleryFoto->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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
                                        <input disabled type="file" name="icon" class="custom-file-input" id="icon">
                                        <label class="custom-file-label" for="icon">Pilih File</label>
                                    </div>
        
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="{{ asset('storage/gallery/foto/'.$galleryFoto->gambar) }}" alt="{{ $galleryFoto->nama_gallery_foto }}" class="img img-thumbnail img-temporary" style="width: 800px; height: auto" />
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/gallery/foto") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/gallery/foto/" . $galleryFoto->gallery_foto_id . '/edit') }}" class="btn mx-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/gallery/foto/" . $galleryFoto->gallery_foto_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('Gallery Foto akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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