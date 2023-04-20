@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section
    class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-20 w-full min-h-[91vh] max-w-hd mx-auto"
>
    <h2 class="my-20 text-4xl md:text-[40px]">GALLERY FOTO</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 px-5 gap-3 mb-10 w-fit mx-auto" x-data>
        @foreach($galleryFoto as $gf)
        <div>
            <button type="button" title="{{ $gf->nama_gallery_foto }}" class="relative group flex justify-center items-center max-w-[300px] h-[90%] md:h-full" @click="$dispatch('lightbox', '{{ asset('/storage/gallery/foto/' . $gf->gambar) }}')">
                <div class="absolute w-full h-full m-auto bg-yellow-main/50 opacity-0 group-hover:opacity-100 duration-100"></div>
                <p class="absolute text-green-main font-bold text-center py-2 opacity-0 group-hover:opacity-100 duration-100 text-2xl">{{ $gf->nama_gallery_foto }}</p>
                <img src="{{ asset('/storage/gallery/foto/' . $gf->gambar) }}" class="object-cover h-full w-full" alt="{{ $gf->nama_gallery_foto }}" />
            </button>
            <p class="text-green-main font-bold text-center py-2 md:hidden">{{ $gf->nama_gallery_foto }}</p>
        </div>
        @endforeach
    </div>
    <div class="pagination bg-white w-fit px-2 py-4 mx-auto my-2 rounded-sm">
        @if($galleryFoto->currentPage() > 1) <a href="{{ url('/gallery-foto?page=1') }}" class="hover:text-orange-main mx-2"><<</a> @endif
        @if($galleryFoto->currentPage() - 1 > 0) <a href="{{ url('/gallery-foto?page=' . $galleryFoto->currentPage() - 1) }}" class="hover:text-orange-main mx-2">{{ $galleryFoto->currentPage() - 1 }}</a> @endif
        <a href="{{ url('/gallery-foto?page=' . $galleryFoto->currentPage()) }}" class="hover:text-orange-main mx-2">{{ $galleryFoto->currentPage() }}</a>
        @if($galleryFoto->currentPage() + 1 < $galleryFoto->lastPage()) <a href="{{ url('/gallery-foto?page=' . $galleryFoto->currentPage() + 1) }}" class="hover:text-orange-main mx-2">{{ $galleryFoto->currentPage() + 1 }}</a> @endif
        @if($galleryFoto->currentPage() < $galleryFoto->lastPage()) <a href="{{ url('/gallery-foto?page=' . $galleryFoto->lastPage()) }}" class="hover:text-orange-main mx-2">>></a> @endif
    </div>
</section>
@endsection