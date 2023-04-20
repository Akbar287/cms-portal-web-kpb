@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section
    class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-20 w-full px-8 md:px-16 lg:px-32  min-h-[91vh] max-w-hd mx-auto"
>
    <h2 class="my-20 text-4xl md:text-[40px]">GALLERY VIDEO</h2>
    <div class="bg-yellow-main pb-6" x-data>
        <div class="relative flex w-full mb-10">
            <div class="absolute flex w-full h-full bg-yellow-main/50">
                <button
                class="rounded-full bg-black/50 hover:bg-black/75 w-24 h-24 text-white m-auto duration-100"  @click="$dispatch('lightbox', '{{ $video->url }}')" 
                >
                <i class="fa-solid fa-play fa-2xl"></i>
                </button>
            </div>
            <img src="{{ asset('storage/video/' . $video->gambar) }}" class="w-full h-full" alt="" />
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 px-5 gap-y-8 gap-x-3 mb-10 w-fit mx-auto" style="margin-bottom: 70px;">
            @foreach($galleryVideo as $gf)
            <div class="card">
                <div class="relative group flex justify-center items-center max-w-[300px] h-full">
                    <div class="absolute flex flex-col w-full h-full m-auto justify-center bg-yellow-main/50 md:opacity-0 group-hover:opacity-100 duration-100">
                        <div class="w-full">
                        <button title="play video" type="button" class="rounded-full flex bg-black/50 hover:bg-black/75 w-24 h-24 text-white mx-auto duration-100" @click="$dispatch('lightbox', '{{ $gf->url }}')">
                            <i class="fa-solid fa-play fa-2xl m-auto"></i>
                        </button>
                        <p class="absolute w-full break-all text-green-main font-bold text-center py-2 duration-100 text-xs md:text-2xl">
                            {{ $gf->nama_gallery_video }}
                        </p>
                        </div>
                    </div>
                    <img src="{{ asset('storage/gallery/video/'.$gf->gambar) }}" class="object-cover h-full w-full" alt="" />
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div
            class="pagination bg-white w-fit px-2 py-4 mx-auto my-2 rounded-sm"
        >
            @if($galleryVideo->currentPage() > 1) <a href="{{ url('/gallery-video?page=1') }}" class="hover:text-orange-main mx-2"><<</a> @endif
            @if($galleryVideo->currentPage() - 1 > 0) <a href="{{ url('/gallery-video?page=' . $galleryVideo->currentPage() - 1) }}" class="hover:text-orange-main mx-2">{{ $galleryVideo->currentPage() - 1 }}</a> @endif
            <a href="{{ url('/gallery-video?page=' . $galleryVideo->currentPage()) }}" class="hover:text-orange-main mx-2">{{ $galleryVideo->currentPage() }}</a>
            @if($galleryVideo->currentPage() + 1 < $galleryVideo->lastPage()) <a href="{{ url('/gallery-video?page=' . $galleryVideo->currentPage() + 1) }}" class="hover:text-orange-main mx-2">{{ $galleryVideo->currentPage() + 1 }}</a> @endif
            @if($galleryVideo->currentPage() < $galleryVideo->lastPage()) <a href="{{ url('/gallery-video?page=' . $galleryVideo->lastPage()) }}" class="hover:text-orange-main mx-2">>></a> @endif
        </div>
        <!-- Pagination End -->
    </div>
</section>
@endsection