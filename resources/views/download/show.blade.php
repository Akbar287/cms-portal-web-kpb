@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/download") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detil Download {{ $download->judul }}</h4>
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
                                        <option value="">{{ $download->organisasi()->first()->nama }}</option>
                                    </select>
        
                                    @error('organisasi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Kategori')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select disabled name="kategori_id" id="kategori_id" class="custom-select  @error('kategori_id') is-invalid @enderror">
                                        <option value="">{{ $download->kategori()->first()->nama_kategori }}</option>
                                    </select>
        
                                    @error('kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="judul" type="text"
                                        class="form-control @error('judul') is-invalid @enderror" name="judul"
                                        value="{{ $download->judul }}" autocomplete="name"
                                        autofocus>
        
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="konten" class="col-md-4 col-form-label text-md-end">{{
                                    __('Konten')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <textarea readonly id="konten" type="text"
                                    class="form-control @error('konten') is-invalid @enderror" name="konten" cols="30" rows="10">{{ $download->konten }}</textarea>
        
                                    @error('konten')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{
                                    __('Status')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select disabled name="status" id="status" class="custom-select  @error('status') is-invalid @enderror">
                                        <option value="aktif" {{ $download->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $download->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
        
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="nama_file" class="col-md-4 col-form-label text-md-end">{{
                                    __('Nama File')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <a target="_blank" type="button" href="{{ url("/download/" . $download->download_id . '/download') }}" class="btn mx-2 btn-primary"><i class="fas fa-download"></i> Unduh</a>
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/download") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/download/" . $download->download_id . '/edit') }}" class="btn mx-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/download/" . $download->download_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('File Download akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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