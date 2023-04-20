@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/home") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Download</h4>
                <div class="card-header-action">
                    <a href="{{ url("/download/create") }}" class="btn btn-primary">Tambah Data</a>
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
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Status</th>
                                        <th>Detil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($downloads as $download)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $download->judul }}</td>
                                        <td>{{ $download->konten }}</td>
                                        <td>{!! $download->status == 'aktif' ? '<div class="badge badge-success">Aktif</div>' : '<div class="badge badge-danger">Tidak Aktif</div>' !!}</td>
                                        <td><a href={{ url("/download/" . $download->download_id) }} class="btn btn-success btn-sm">Detil</a>
                                        <a target="_blank" href={{ url("/download/" . $download->download_id . '/download') }} class="btn btn-primary btn-sm">Unduh</a>
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