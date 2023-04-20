@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/visi-misi") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detil Visi Misi</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <form action="{{ url('/visi-misi/' . $visiMisi->visi_misi_id) }}" method="post" enctype="multipart/form-data">@csrf @method('put')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mb-3 justify-content-center">
                                <label for="tentang_kami_id" class="col-md-4 col-form-label text-md-end">{{ __('Tentang Kami')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="tentang_kami_id" id="tentang_kami_id" class="custom-select  @error('tentang_kami_id') is-invalid @enderror">
                                        @foreach($tentangKamis as $o)
                                        <option value="{{ $o->tentang_kami_id }}" {{ $visiMisi->tentang_kami()->first()->tentang_kami_id == $o->tentang_kami_id ? 'selected' : '' }}>{{ $o->judul }}</option>
                                        @endforeach
                                    </select>
        
                                    @error('tentang_kami_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="jenis" class="col-md-4 col-form-label text-md-end">{{ __('Jenis')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="jenis" id="jenis" class="custom-select  @error('jenis') is-invalid @enderror">
                                        <option value="visi" {{ $visiMisi->jenis == 'visi' ? 'selected' : '' }}>Visi</option>
                                        <option value="misi" {{ $visiMisi->jenis == 'misi' ? 'selected' : '' }}>Misi</option>
                                    </select>
        
                                    @error('jenis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{
                                    __('Deskripsi')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <textarea id="deskripsi" type="text"
                                    class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="10">{{ $visiMisi->deskripsi }}</textarea>
        
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
                                    <input id="urutan" type="number" min="1" max="1000"
                                        class="form-control @error('urutan') is-invalid @enderror" name="urutan"
                                        value="{{ $visiMisi->urutan }}" autocomplete="urutan"
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
                                    __('Status')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select name="status" id="status" class="custom-select @error('status') is-invalid @enderror">
                                        <option value="aktif" {{ $visiMisi->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $visiMisi->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
        
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/visi-misi") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
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