@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/home") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Sosial Media</h4>
                <div class="card-header-action">
                    <a href="{{ url("/sosial-media/create") }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-data">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Ikon</th>
                                        <th>Nama</th>
                                        <th>Url</th>
                                        <th>Status</th>
                                        <th>Detil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sosialMedias as $sosialMedia)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('/storage/sosial-media/'.$sosialMedia->icon) }}" alt="{{ $sosialMedia->nama }}" style="width: 100px; height: auto;" /></td>
                                        <td>{{ $sosialMedia->nama_sosmed }}</td>
                                        <td>{{ $sosialMedia->url }}</td>
                                        <td>{!! $sosialMedia->status == 'aktif' ? '<div class="badge badge-success">Aktif</div>' : '<div class="badge badge-danger">Tidak Aktif</div>' !!}</td>
                                        <td><a href={{ url("/sosial-media/" . $sosialMedia->sosial_media_id) }} class="btn btn-success btn-sm">Detil</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection