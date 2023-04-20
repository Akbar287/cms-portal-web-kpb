<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('storage/images/logo-ekpb.png') }}" type="image/x-icon" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Cormorant Garamond' rel='stylesheet'>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600&family=Montserrat:wght@500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script> 
    <!-- AlpineJS --> 
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Portal e-KPB</title>
</head>
<body class="relative bg-yellow-main-light -z-50">
    <script>
        tailwind.config = {
            theme: {
                screens: {
                    'sm': '360px',
                // => @media (min-width: 400px) { ... }
    
                    'md': '700px',
                // => @media (min-width: 768px) { ... }
    
                    'lg': '1024px',
                // => @media (min-width: 1024px) { ... }
    
                    'xl': '1280px',
                // => @media (min-width: 1280px) { ... }
    
                    '2xl': '2800px',
                // => @media (min-width: 1536px) { ... }
                }
            }
        }
    </script> 
    
    <!-- Lightbox -->
    <div class="fixed inset-0 h-screen w-screen bg-black/80 z-[100]" x-data="{lightboxOpen: false, imgSrc: ''}"
        x-show="lightboxOpen" x-transition x-cloak @lightbox.window="lightboxOpen = true; imgSrc = $event.detail;">
        <div class="h-screen w-screen flex justify-center items-center">
            <div class="relative">
            <button class="absolute cursor-pointer -top-4 -right-4 rounded-full h-11 w-11 text-3xl bg-white"
                @click="lightboxOpen = false">&times;</button>
            <!-- Placeholder for dev -->
            <iframe class="hidden md:block" width="560" height="315" :src="imgSrc" title="eKPB" frameborder="0"
                allow="accelerometer; autoplay;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen @click.away="lightboxOpen = false, imgSrc =''"></iframe>
            <iframe class="md:hidden" width="320" height="180" :src="imgSrc" title="eKPB" frameborder="0"
                allow="accelerometer; autoplay;  clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen @click.away="lightboxOpen = false, imgSrc =''"></iframe>
            <!-- Replace with this in prod --> 
            <!-- <video class="hidden md:block" width="560" height="315" :src="imgSrc" title="eKPB" controls frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen @click.away="lightboxOpen = false, imgSrc =''" ></video>
                <video class="md:hidden" width="320" height="180" :src="imgSrc" title="eKPB" controls frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen @click.away="lightboxOpen = false, imgSrc =''" ></video> --> 
            </div>
        </div>
    </div>
    <!-- Lightbox End --> 
    <!-- Floating Button -->
    <div class="fixed  md:block -right-20 bottom-80 button w-32 h-14 z-50 overflow-visible" x-data="{showBtn : false}">
        <div class="relative group hover:scale-105 duration-100 overflow-visible"
            :class="{'right-24 md:right-40 opacity-100' : showBtn, 'right-20 opacity-0' : !showBtn}"
            @scroll.window="showBtn = (window.pageYOffset > 100) ? true : false" x-cloak> <a href="http://virtualkpb.rimpangdigital.com/" class="text-white font-bold text-center">
            <p>e-KPB TOUR<br />
            360</p>
            </a> <img src="{{ asset('storage/images/btn.svg') }}" class="absolute w-40 h-24 -top-7 -z-40 object-contain drop-shadow 0" alt="" /> </div>
    </div>
    <!-- Button End --> 
    <!-- Header -->
    <header class="fixed md:flex w-full top-0 h-20  py-2 justify-center md:px-10 lg:px-16 bg-yellow-main-light z-50"
        x-data="{open:false}">
        <div class="flex flex-col md:flex-row justify-between w-full mx-auto max-w-hd">
            <div class="flex px-4 gap-2 md:gap-0 justify-between w-full md:w-auto"> <a href="index.html" class="flex shrink-0 items-end"> <img src="{{ asset('storage/images/logo-ekpb.png') }}" class=" w-20 shrink-0 h-auto" alt="" /> </a>
            <div class="flex justify-center md:hidden">
                <form class="searchbar flex content-baseline">
                <input type="search"
                    class="flex w-full md:hidden border-b-[3px] bg-transparent border-green-main focus:outline-none" name=""
                    id="" />
                <button type="submit" class="ml-1"> <i class="fa-solid fa-magnifying-glass fa-xl"></i> </button>
                </form>
            </div>
            <button class="shrink-0 relative burger w-12 md:hidden" @click="open = !open"> <img src="{{ asset('storage/images/bars.svg') }}" class="absolute bottom-0 w-12" alt="" x-show="!open" x-transition x-cloak /> <img src="{{ asset('storage/images/close.svg') }}" class="absolute bottom-0 w-12" alt="" x-show="open" x-transition x-cloak /> </button>
            </div>
            <!-- Dropdown -->
            <div class="hidden md:flex">
            <div class="md:flex gap-7" :class="{'hidden' :!open, 'visible' :open}" x-cloak>
                <ul
                    class="flex flex-col text-sm pb-4 shadow md:shadow-none md:pb-0 lg:text-base justify-end md:flex-row w-full bg-yellow-main-light text-green-main font-semibold md:gap-2 lg:gap-5">
                <li
                    class="relative group px-4 my-4 md:px-0 md:my-0 flex md:text-center place-self-end bg-main-yellow md:rounded-xl w-full md:w-20"> <a href="{{url('/')}}" class="w-full h-full z-10">HOME</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="group flex flex-col px-4 my-4 md:px-0 md:my-0 relative hover:bg-white/10 duration-100 w-full md:w-auto place-self-end"
                    x-data="{dropdownOpen:false}" @mouseover.outside="dropdownOpen = false"
                    @click.outside="dropdownOpen = false"> <a href="javascript:void(0)" class="place-self-center w-full h-full z-10" @mouseover="dropdownOpen = true"
                        @click="dropdownOpen = true"> PROFILE </a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                    <div class="md:absolute w-full top-6 left-0 bg-white rounded-md text-main-gray md:w-56 shadow-md"
                        x-show="dropdownOpen" x-transition x-transition:leave.duration.400ms x-cloak>
                    <ul class="flex flex-col gap-y-2 py-2 bg-yellow-main">
                        <li class="flex hover:bg-black/10"> <a href="{{url('/profile-about')}}" class="h-full w-full px-5 py-2">Tentang Kami</a> </li>
                        <li class="flex hover:bg-black/10"> <a href="{{url('/profile-visi')}}" class="h-full w-full px-5 py-2">Visi dan Misi</a> </li>
                    </ul>
                    </div>
                </li>
                <li
                    class="relative group flex px-4 my-4 md:px-0 md:my-0 md:text-center place-self-end bg-main-yellow md:rounded-xl w-full md:w-20"> <a href="{{url('/berita')}}" class="w-full h-full z-10">BERITA</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="group flex flex-col px-4 my-4 md:px-0 md:my-0 relative hover:bg-white/10 duration-100 w-full md:w-auto place-self-end"
                    x-data="{dropdownOpen:false}" @click.outside="dropdownOpen = false"
                    @mouseover.outside="dropdownOpen = false"> <a href="javascript:void(0)" class="place-self-center w-full h-full z-10"
                        @click="dropdownOpen = !dropdownOpen" @mouseover="dropdownOpen = true"> GALLERY </a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                    <div class="md:absolute w-full top-6 left-0 bg-white rounded-md text-main-gray md:w-56 shadow-md"
                        x-show="dropdownOpen" x-transition x-transition:leave.duration.500ms x-cloak>
                    <ul class="flex flex-col gap-y-2 py-2 bg-yellow-main">
                        <li class="flex hover:bg-black/10"> <a href="{{url('/gallery-foto')}}" class="h-full w-full px-5 py-2">GALLERY FOTO</a> </li>
                        <li class="flex hover:bg-black/10"> <a href="{{url('/gallery-video')}}" class="h-full w-full px-5 py-2">GALLERY VIDEO</a> </li>
                    </ul>
                    </div>
                </li>
                <li
                    class="relative group flex px-4 my-4 md:px-0 md:my-0 md:text-center md:place-self-end bg-main-yellow md:rounded-xl w-fit"> <a href="{{url('/kontak')}}" class="w-full h-full z-10">KONTAK</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="relative group flex px-4 my-4 md:px-0 md:my-0 md:text-center md:place-self-end bg-main-yellow md:rounded-xl w-fit"> <a href="https://e-kpb.lampungprov.go.id/" class="w-full h-full z-10">LINK APLIKASI</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="relative group flex px-4 my-4 md:px-0 md:my-0 md:text-center md:place-self-end bg-main-yellow md:rounded-xl w-fit"> <a href="http://virtualkpb.rimpangdigital.com/" class="w-full h-full z-10">TOUR 360</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="hidden md:flex flex-col relative md:h-full hover:bg-white/10 duration-100 w-full md:w-auto justify-end"
                    x-data="{dropdownOpen:false}" @click.outside="dropdownOpen = false" x-cloak> <a href="javascript:void(0)" class="w-7 px-2 relative" @click="dropdownOpen = !dropdownOpen"> <img src="{{ asset('storage/images/search.svg') }}" class="absolute bottom-0 w-12" alt="" x-show="!dropdownOpen" x-transition
                        x-cloak /> <img src="{{ asset('storage/images/close.svg') }}" class="absolute bottom-0 w-12" alt="" x-show="dropdownOpen" x-transition
                        x-cloak /> </a>
                    <div
                        class="md:absolute md:flex w-full md:justify-center md:content-center top-[72px] right-0 rounded-md text-main-gray md:w-fit md:px-4 md:h-20 shadow-md bg-yellow-main"
                        x-show="dropdownOpen" x-transition x-cloak>
                    <ul class="flex items-center">
                        <form action="" class="flex items-end" x-show="dropdownOpen"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="translate-y-10 opacity-0"
                            x-transition:enter-end="-translate-y-0 opacity-100" x-cloak>
                        <input type="search" placeholder="Search..."
                            class="bg-transparent focus:outline-none px-4 w-52 border-b border-black p-2" name="" id="" />
                        <button type="submit" class="flex -ml-8 w-7 mb-2 bg-yellow-main"> <img src="{{ asset('storage/images/search.svg') }}" alt="" /> </button>
                        </form>
                    </ul>
                    </div>
                </li>
            </ul>
            <a href="template.html" class="burger w-9 hidden md:flex items-end hover:brightness-110"> <img src="{{ asset('storage/images/logo-wa.svg') }}" alt="" /> </a> </div>
        </div>
        <!-- Mobile -->
        <div class="md:hidden">
            <div class="md:flex gap-7" :class="{'hidden' :!open, 'visible' :open}" x-cloak>
                <ul
                    class="flex flex-col text-sm py-8 gap-10 shadow md:shadow-none md:pb-0 lg:text-base justify-end md:flex-row w-full bg-yellow-main-light text-green-main font-semibold lg:gap-5">
                <li
                    class="relative group px-4 md:px-0 md:my-0 flex md:text-center place-self-end bg-main-yellow md:rounded-xl w-full md:w-20"> <a href="{{url('/')}}" class="w-full h-full z-10">HOME</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li class="group flex flex-col px-4 md:px-0 md:my-0 relative duration-100 w-full md:w-auto place-self-end"
                    x-data="{dropdownOpen:false}" @click.outside="dropdownOpen = false"> <a href="javascript:void(0)" class="flex justify-between place-self-center w-full h-full z-10"
                        @click="dropdownOpen = !dropdownOpen"> PROFILE <i class="fa-solid fa-chevron-down"></i> </a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                    <div class="md:absolute w-full top-6 left-0 bg-white rounded-md text-main-gray md:w-56 shadow-md"
                        x-show="dropdownOpen" x-transition x-transition:leave.duration.400ms x-cloak>
                    <ul class="flex flex-col gap-y-2 py-2 bg-yellow-main">
                        <li class="flex hover:bg-black/10"> <a href="{{ url('/profile-about') }}" class="h-full w-full px-5 py-2">Tentang Kami</a> </li>
                        <li class="flex hover:bg-black/10"> <a href="{{ url('/profile-visi') }}" class="h-full w-full px-5 py-2">Visi dan Misi</a> </li>
                    </ul>
                    </div>
                </li>
                <li
                    class="relative group flex px-4 md:px-0 md:my-0 md:text-center place-self-end bg-main-yellow md:rounded-xl w-full md:w-20"> <a href="{{ url('/berita') }}" class="w-full h-full z-10">BERITA</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li class="group flex flex-col px-4 md:px-0 md:my-0 relative duration-100 w-full md:w-auto place-self-end"
                    x-data="{dropdownOpen:false}" @click.outside="dropdownOpen = false"> <a href="javascript:void(0)" class="flex justify-between place-self-center w-full h-full z-10"
                        @click="dropdownOpen = !dropdownOpen"> GALLERY <i class="fa-solid fa-chevron-down"></i> </a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                    <div class="md:absolute w-full top-6 left-0 bg-white rounded-md text-main-gray md:w-56 shadow-md"
                        x-show="dropdownOpen" x-transition x-transition:leave.duration.500ms x-cloak>
                    <ul class="flex flex-col gap-y-2 py-2 bg-yellow-main">
                        <li class="flex hover:bg-black/10"> <a href="{{url('/gallery-foto')}}" class="h-full w-full px-5 py-2">GALLERY FOTO</a> </li>
                        <li class="flex hover:bg-black/10"> <a href="{{url('/gallery-video')}}" class="h-full w-full px-5 py-2">GALLERY VIDEO</a> </li>
                    </ul>
                    </div>
                </li>
                <li
                    class="relative group flex px-4 md:px-0 md:my-0 md:text-center md:place-self-end bg-main-yellow md:rounded-xl w-fit"> <a href="{{url('/kontak')}}" class="w-full h-full z-10">KONTAK</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="relative group flex px-4 md:px-0 md:my-0 md:text-center md:place-self-end bg-main-yellow md:rounded-xl w-fit"> <a href="https://e-kpb.lampungprov.go.id/" class="w-full h-full z-10">LINK APLIKASI</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="relative group flex px-4 md:px-0 md:my-0 md:text-center md:place-self-end bg-main-yellow md:rounded-xl w-fit"> <a href="http://virtualkpb.rimpangdigital.com/" class="w-full h-full z-10">TOUR 360</a>
                    <div
                        class="absolute hidden md:block bottom-1 w-full h-2 bg-green-main-light z-0 opacity-0 group-hover:opacity-100 duration-300"> </div>
                </li>
                <li
                    class="hidden md:flex flex-col relative md:h-full hover:bg-white/10 duration-100 w-full md:w-auto justify-end"
                    x-data="{dropdownOpen:false}" @click.outside="dropdownOpen = false" x-cloak> <a href="javascript:void(0)" class="w-10 px-2 relative" @click="dropdownOpen = !dropdownOpen"> <img src="{{ asset('storage/images/search.svg') }}" class="absolute bottom-0 w-12" alt="" x-show="!dropdownOpen" x-transition
                        x-cloak /> <img src="{{ asset('storage/images/close.svg') }}" class="absolute bottom-0 w-12" alt="" x-show="dropdownOpen" x-transition
                        x-cloak /> </a>
                    <div
                        class="md:absolute md:flex w-full md:justify-center md:content-center top-[72px] right-0 rounded-md text-main-gray md:w-fit md:px-4 md:h-20 shadow-md bg-yellow-main"
                        x-show="dropdownOpen" x-transition x-cloak>
                        <ul class="flex items-center">
                            <form action="" class="flex items-end" x-show="dropdownOpen"
                                x-transition:enter="transition ease-out duration-500"
                                x-transition:enter-start="translate-y-10 opacity-0"
                                x-transition:enter-end="-translate-y-0 opacity-100" x-cloak>
                            <input type="search" placeholder="Search..."
                                class="bg-transparent focus:outline-none px-4 w-52 border-b border-black p-2" name="" id="" />
                            <button type="submit" class="flex -ml-8 w-7 mb-2 bg-yellow-main"> <img src="{{ asset('storage/images/search.svg') }}" alt="" /> </button>
                            </form>
                            <!-- <li class="flex hover:bg-black/10">
                                <a href="berita.html" class="h-full w-full px-5 py-2"
                                >GALLERY FOTO</a
                                >
                            </li>
                            <li class="flex hover:bg-black/10">
                                <a href="berita.html" class="h-full w-full px-5 py-2"
                                >GALLERY VIDEO</a
                                >
                            </li> -->
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- <a href="" class="burger w-12 hidden md:flex items-end">
                <img src="/search.svg" alt="" />
                </a> --> 
            <a href="{{url('download')}}" class="burger w-12 hidden md:flex items-end hover:brightness-110"> <img src="{{ asset('storage/images/logo-wa.svg') }}" alt="" /> </a> </div>
        </div>
        <!-- Dropdown End --> 
        </div>
    </header>
    @yield('content')
    <!-- Footer -->
<footer>
    <div class="bg-[url('{{ asset('storage/images/footer.svg') }}')] bg-yellow-main-light h-11 w-full -mb-1"></div>
    <div class="footer  bg-green-main ">
        <div
            class="flex flex-col md:flex-row items-center md:items-start md:justify-between py-9 px-8 md:px-16 max-w-hd mx-auto">
        <div class="hidden md:flex">
            <ul class="text-white font-bold text-center md:text-left text-sm md:text-xl my-5 md:my-0 leading-6">
            <li><a href="{{url('/')}}" class="hover:underline">HOME</a></li>
            <li> <a href="{{url('/profile-about')}}" class="hover:underline">PROFILE</a> </li>
            <li><a href="{{url('/berita')}}" class="hover:underline">BERITA</a></li>
            <li> <a href="{{url('/gallery-foto')}}" class="hover:underline">GALLERY</a> </li>
            <li><a href="{{url('/kontak')}}" class="hover:underline">KONTAK</a></li>
            <li> <a href="https://e-kpb.lampungprov.go.id/" class="hover:underline">LINK APLIKASI</a> </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="text-white font-bold text-center md:text-left text-sm md:text-xl my-5 md:my-0">
            <li class="mb-2"> <a href="{{url('/berita')}}" class="underline hover:text-yellow-main-light">Berita</a> </li>
            <li class="mb-2"> <a href="{{url('/downloads')}}" class="underline hover:text-yellow-main-light">Download</a> </li>
            <li class="mb-2"> <a href="{{url('/agenda')}}" class="underline hover:text-yellow-main-light">Agenda</a> </li>
            <li> <a href="{{url('/gallery-foto')}}" class="hover:text-yellow-main-light"> <span class="underline">Album</span> Foto</a> </li>
            </ul>
        </div>
        <div class="text-white font-bold text-xs leading-5 md:leading-8 my-5 md:my-0">
            <p> <span class="text-sm md:text-xl"> Hubungi Kami </span> <br />
            Alamat:
            {{ $hubungi->alamat }}<br />
            Telepon: {{ $hubungi->telepon }}<br />
            Email: {{ $hubungi->email }} </p>
        </div>
        <div class="social text-white font-bold text-center pt-7 md:pt-0 md:text-xl">
            <p>ikuti kami:</p>
            <div class="flex justify-center gap-2 mt-8"> 
                @foreach($sosialMedia as $sm)
                <a href="{{ $sm->url }}" class="rounded-full bg-white w-10 h-10 p-3 group hover:scale-105 duration-150"> 
                    <img src="{{ asset('storage/sosial-media/' . $sm->icon) }}" class="group-hover:scale-125 duration-150" alt="" /> 
                    {{-- <img src="{{ asset('storage/images/logo-fb.svg') }}" class="group-hover:scale-125 duration-150" alt="" />  --}}
                </a>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</footer>
</body>
</html>