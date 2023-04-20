@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Selamat Datang</h4>
                </div>
                <div class="card-body">
                    {{ Auth::user()->member()->first()->ktp()->first()->nama }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
