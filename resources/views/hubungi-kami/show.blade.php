@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/hubungi-kami") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detil Hubungi</h4>
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
                                        <option value="">{{ $hubungiKami->organisasi()->first()->nama }}</option>
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
                                        value="{{ $hubungiKami->nama }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $hubungiKami->email }}" autocomplete="name"
                                        autofocus>
        
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="telepon" class="col-md-4 col-form-label text-md-end">{{ __('Telepon')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="telepon" type="text"
                                        class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                        value="{{ $hubungiKami->telepon }}" autocomplete="name"
                                        autofocus>
        
                                    @error('telepon')
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
                                    <textarea readonly id="deskripsi" type="text"
                                    class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" cols="30" rows="10">{{ $hubungiKami->deskripsi }}</textarea>
        
                                    @error('deskripsi')
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
                                        <option value="baru" {{ $hubungiKami->status == 'baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="progress" {{ $hubungiKami->status == 'progress' ? 'selected' : '' }}>Progress</option>
                                        <option value="selesai" {{ $hubungiKami->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
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
                                    <a type="button" href="{{ url("/hubungi-kami") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/hubungi-kami/" . $hubungiKami->hubungi_kami_id . '/edit') }}" class="btn mr-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/hubungi-kami/" . $hubungiKami->hubungi_kami_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('Hubungi Kami akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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