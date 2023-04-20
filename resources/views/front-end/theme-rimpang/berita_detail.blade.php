@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section
    class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-30 w-full min-h-[91vh] max-w-hd mx-auto"
>
    <div class="px-2 py-8 max-w-[1200px] mx-auto md:mb-16">
        <p class="text-green-main font-semibold text-4xl md:text-[40px]">{{ strtoupper($event->jenis) }}</p>
        {!! $deskripsi !!}
    </div>
</section>
@endsection