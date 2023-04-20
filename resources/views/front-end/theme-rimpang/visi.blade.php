@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-30 w-full min-h-[91vh] max-w-hd mx-auto">
    <img
        class="absolute top-20 left-0 object-cover h-[500px] w-full bg-left -z-20"
        src="{{asset('storage/images/banner.jpg')}}"
        alt=""
    />
    <div class="absolute w-full h-[500px] -z-10 bg-black/30 top-20"></div>
        <div class="pt-20 px-4 md:ml-[20%] md:max-w-[600px]">
            <h2 class="text-white text-left pl-10 mb-10 text-[36px]">
            Visi dan Misi
            </h2>
            <div class="relative bg-white w-full">
            <div class="absolute bg-orange-main w-[3px] h-16 left-8 -top-8"></div>
            <div class="content pt-10 bg-yellow-main">
                <div class="text px-10 text-green-main font-semibold">
                <p class="title text-xl mb-8">
                    Visi dan Misi
                </p>
                <ul class="list-disc mb-8">
                    @foreach($visiMisi as $vm)
                    <li>{{ $vm->deskripsi }}</li>
                    @endforeach
                </ul>
                </div>
                <img src="{{asset('storage/images/about.jpg')}}" class="w-full h-max" alt="" />
            </div>
        </div>
    </div>
</section>
@endsection