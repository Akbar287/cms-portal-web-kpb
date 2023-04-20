@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/hubungi") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
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
                                        <option value="">{{ $hubungi->organisasi()->first()->nama }}</option>
                                    </select>
        
                                    @error('organisasi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="no_hp" class="col-md-4 col-form-label text-md-end">{{ __('Nomor HP')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="no_hp" type="text"
                                        class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                        value="{{ $hubungi->no_hp }}" autocomplete="name"
                                        autofocus>
        
                                    @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="no_wa" class="col-md-4 col-form-label text-md-end">{{ __('Nomor WA')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="no_wa" type="text"
                                        class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
                                        value="{{ $hubungi->no_wa }}" autocomplete="name"
                                        autofocus>
        
                                    @error('no_wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="telepon" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Telepon')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="telepon" type="text"
                                        class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                                        value="{{ $hubungi->telepon }}" autocomplete="name"
                                        autofocus>
        
                                    @error('telepon')
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
                                        value="{{ $hubungi->email }}" autocomplete="name"
                                        autofocus>
        
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="alamat" class="col-md-4 col-form-label text-md-end">{{
                                    __('alamat')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <textarea readonly id="alamat" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror" name="alamat" cols="30" rows="10">{{ $hubungi->alamat }}</textarea>
        
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/hubungi") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/hubungi/" . $hubungi->hubungi_id . '/edit') }}" class="btn mx-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/hubungi/" . $hubungi->hubungi_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('Hubungi akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
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