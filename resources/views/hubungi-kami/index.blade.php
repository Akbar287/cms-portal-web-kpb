@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/home") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Hubungi</h4>
                <div class="card-header-action">
                    <a href="{{ url("/hubungi-kami/create") }}" class="btn btn-primary">Tambah Data</a>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Status</th>
                                        <th>Detil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($hubungiKamis as $hubungi_kami)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hubungi_kami->nama }}</td>
                                        <td>{{ $hubungi_kami->email }}</td>
                                        <td>{{ $hubungi_kami->telepon }}</td>
                                        <td>{!! $hubungi_kami->status =='baru' ? '<div class="badge badge-primary">Baru</div>' : ($hubungi_kami->status == 'progress' ? '<div class="badge badge-warning">Progress</div>' : '<div class="badge badge-success">Selesai</div>') !!}</td>
                                        <td><a href={{ url("/hubungi-kami/" . $hubungi_kami->hubungi_kami_id) }} class="btn btn-success btn-sm">Detil</a>
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