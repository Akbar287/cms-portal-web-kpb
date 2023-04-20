@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/event") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Detil Event</h4>
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
                                        <option value="" >{{ $event->organisasi()->first()->nama }}</option>
                                    </select>
        
                                    @error('organisasi_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="jenis" class="col-md-4 col-form-label text-md-end">{{
                                    __('jenis')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select disabled name="jenis" id="jenis" class="custom-select  @error('jenis') is-invalid @enderror">
                                        <option value="berita" {{ $event->jenis == 'berita' ? 'selected' : '' }}>Berita</option>
                                        <option value="artikel" {{ $event->jenis == 'artikel' ? 'selected' : '' }}>Artikel</option>
                                        <option value="agenda" {{ $event->jenis == 'agenda' ? 'selected' : '' }}>Agenda</option>
                                    </select>
        
                                    @error('jenis')
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
                                        value="{{ $event->judul }}" autocomplete="name"
                                        autofocus>
        
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('Slug')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="slug" type="text"
                                        class="form-control @error('slug') is-invalid @enderror" name="slug"
                                        value="{{ $event->slug }}" autocomplete="name"
                                        autofocus>
        
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="prolog" class="col-md-4 col-form-label text-md-end">{{ __('Prolog')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input readonly id="prolog" type="text"
                                        class="form-control @error('prolog') is-invalid @enderror" name="prolog"
                                        value="{{ $event->prolog }}" autocomplete="name"
                                        autofocus>
        
                                    @error('prolog')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="summernote" class="col-md-10 col-form-label text-md-end">{{
                                    __('Deskripsi')
                                    }}</label>
        
                                <div class="col-md-10">
                                    <textarea readonly name="deskripsi" class="@error('deskripsi') is-invalid @enderror" id="summernote"></textarea>
                                    <input type="hidden" name="summernote-fallback" value="{{ $deskripsi }}">
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
                                        <option value="aktif" {{ $event->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $event->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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
                                    __('gambar')
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

                                    <img src="{{ asset('/storage/event/' . $event->gambar) }}" alt="{{ $event->judul }}" class="img img-thumbnail img-temporary" style="width: 800px; height: auto"> 
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/event") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <a type="button" href="{{ url("/event/" . $event->event_id . '/edit') }}" class="btn mx-2 btn-warning"><i class="fas fa-pen"></i> Ubah</a>
                                    <form action="{{ url("/event/" . $event->event_id) }}" method="POST">@csrf @method('delete')
                                        <button type="submit" onclick="return confirm('Event akan dihapus!\n Lanjutkan?')" title="Hapus Data" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                                    </form></div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection