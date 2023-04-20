@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-20 w-full min-h-[91vh] max-w-hd mx-auto">
    <h2 class="my-20 text-4xl md:text-[40px]">BERITA & ARTIKEL</h2>
    <div class="relative flex flex-col md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-y-16 card-container px-8 items-center mb-10">
        <img src="{{ asset('storage/images/1_aset pattern lampung.svg')}}"
            class="absolute top-20 -left-10 md:-left-48 -z-10 opacity-50 rotate-[121deg] w-[40%]" alt="" />
        <img src="{{asset('storage/images/1_aset pattern lampung.svg')}}"
            class="absolute bottom-20 -right-20 md:-right-[220px] -z-10 opacity-50 rotate-[-44deg] w-[40%]" alt="" />


        @foreach($berita as $b)
        <div class="group overflow-hidden rounded-xl w-full lg:max-w-sm bg-white hover:bg-yellow-main  duration-200 mx-auto">
            <img src="{{ asset('storage/event/' . $b->gambar)}}" class="object-cover w-full max-h-[330px]" alt="" />
            <div class="px-6 text-xs md:text-base">
            <p class="text-green-main font-semibold mt-4 min-h-[80px]">
                {{ $b->judul }}
            </p>
            <div class="flex justify-between items-end">
                <p class="font-bold text-green-main">{{ ucfirst($b->jenis) }}</p>
                <a href="{{ url('/berita/' . $b->slug) }}"
                class="bg-black group-hover:bg-orange-main rounded-3xl p-2 text-xs text-white font-bold">
                Read more
                </a>
            </div>
            <p class="text-orange-main">{{ $b->member()->first()->ktp()->first()->nama }}, {{ $b->created_at->format('m, d/Y') }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Pagination -->
    <div class="pagination bg-white w-fit px-2 py-4 mx-auto my-2 rounded-sm">
        @if($berita->currentPage() > 1) <a href="{{ url('/berita?page=1') }}" class="hover:text-orange-main mx-2"><<</a> @endif
            @if($berita->currentPage() - 1 > 0) <a href="{{ url('/berita?page=' . $berita->currentPage() - 1) }}" class="hover:text-orange-main mx-2">{{ $berita->currentPage() - 1 }}</a> @endif
            <a href="{{ url('/berita?page=' . $berita->currentPage()) }}" class="hover:text-orange-main mx-2">{{ $berita->currentPage() }}</a>
            @if($berita->currentPage() + 1 < $berita->lastPage()) <a href="{{ url('/berita?page=' . $berita->currentPage() + 1) }}" class="hover:text-orange-main mx-2">{{ $berita->currentPage() + 1 }}</a> @endif
            @if($berita->currentPage() < $berita->lastPage()) <a href="{{ url('/berita?page=' . $berita->lastPage()) }}" class="hover:text-orange-main mx-2">>></a> @endif
    </div>
    <!-- Pagination End -->
</section>
@endsection