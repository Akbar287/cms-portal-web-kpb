@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-30 w-full min-h-[91vh] max-w-hd mx-auto">
    <img
        class="absolute top-20 left-0 object-cover h-[500px] w-full bg-left -z-20"
        src="{{asset('storage/images/banner.jpg')}}"
        alt=""
    />
    <div class="absolute w-full h-[500px] -z-10 bg-black/30 top-20"></div>
        <div class="pt-20 px-4 lg:mx-[20%]">
            <h2 class="text-white text-left pl-10 mb-10 text-[36px]">Kontak</h2>
            <div class="relative bg-white w-full">
                <div class="absolute bg-orange-main w-[3px] h-16 left-8 -top-8"></div>
                <div class="content pt-10 bg-yellow-main">
                <div class="flex flex-col md:flex-row px-5 md:px-10 py-10 text-green-main font-semibold">
                <div class="flex flex-col gap-6 flex-1 mb-10 md:mb-0">
                    <p class="title text-3xl md:text-4xl">Hubungi Kami</p>
                    <p class="text-xl">Alamat Kantor</p>
                    <p>
                    Alamat: {{ $hubungi->alamat }} <br />
                    Telepon: {{ $hubungi->telepon }} <br />
                    Email: {{ $hubungi->email }}
                    </p>
                </div>
                <div class="flex-1">
                    @if(session('msg')) 
                    <div class="bg-green-500 text-white w-full text-center flex item-center px-4 py-2 rounded shadow mb-2">
                        Pesan anda sudah Kami catat
                    </div>
                    @endif
                    <form action="{{ url('/kontak') }}" method="POST" class="flex flex-col gap-4">@csrf
                    <div class="flex flex-col w-full">
                        <label for="name" class="text-black pl-4">Nama</label>
                        <input
                        type="text"
                        class="outline-green-main bg-gray-300 w-full rounded-full py-2 px-4 text-gray-800 @error('name') is-invalid @enderror"
                        name="name"
                        id="name"
                        />
                    </div>
                    <div class="flex gap-4 w-full">
                        <div class="flex flex-col w-1/2">
                        <label for="tel" class="text-black pl-4">No. Telepon / HP</label>
                        <input
                            type="text"
                            class="outline-green-main bg-gray-300 w-full rounded-full py-2 px-4 text-gray-800 @error('no_telepon') is-invalid @enderror"
                            name="no_telepon"
                            id="tel"
                        />
                        </div>
                        <div class="flex flex-col w-1/2">
                        <label for="email" class="text-black pl-4">E-mail</label>
                        <input
                            type="email"
                            class="outline-green-main bg-gray-300 w-full rounded-full py-2 px-4 text-gray-800 @error('email') is-invalid @enderror"
                            name="email"
                            id="email"
                        />
                        </div>
                    </div>
                    <textarea
                        class="outline-green-main bg-gray-300 rounded-3xl py-2 px-4 text-gray-800 h-20 w-full @error('deskripsi') is-invalid @enderror"
                        name="deskripsi"
                        id=""
                        cols="30"
                        rows="10"
                        placeholder="Pesan"
                    ></textarea>
                    <button
                        type="submit"
                        class="text-white mx-auto bg-green-500 w-fit py-2 px-8 rounded-full hover:bg-green-secondary hover:text-green-main duration-100"
                    >
                        Submit
                    </button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection