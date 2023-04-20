@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/banner") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detil Banner {{ $banner->nama }}</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3 justify-content-center">
                                <label for="organisasi_id" class="col-md-4 col-form-label text-md-end">{{ __('Organisasi')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="organisasi_id" readonly disabled id="organisasi_id" class="custom-select  @error('organisasi_id') is-invalid @enderror">
                                        <option value="">{{ $banner->organisasi()->first()->nama }}</option>
                                    </select>
        
                                    @error('organisasi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ $banner->nama }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nama')
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
                                    <textarea readonly id="deskripsi" type="text"
                                    class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="10">{{ $banner->deskripsi }}</textarea>
        
                                    @error('deskripsi')
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
                                    <input readonly id="urutan" type="number" min="1" max="1000"
                                        class="form-control @error('urutan') is-invalid @enderror" name="urutan"
                                        value="{{ $banner->urutan }}" autocomplete="urutan"
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
                                    <select readonly disabled name="status" id="status" class="custom-select  @error('status') is-invalid @enderror">
                                        <option value="aktif" {{ $banner->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $banner->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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
                                        <input readonly disabled type="file" name="icon" class="custom-file-input" id="icon">
                                        <label class="custom-file-label" for="icon">Pilih File</label>
                                    </div>
        
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="{{ asset('/storage/banner/' . $banner->gambar) }}" alt="{{ $banner->nama }}" class="img img-thumbnail img-temporary" style="width: 800px; height: auto"> 
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/banner") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/banner/" . $banner->banner_id . '/edit') }}" class="btn mx-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/banner/" . $banner->banner_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('Banner akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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