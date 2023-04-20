@extends('front-end.theme-rimpang.layout.layout')

@section('content')

<section class="hero mt-5 max-w-hd mx-auto bg-yellow-main-light overflow-hidden">
    <div class="relative  flex flex-col justify-center items-center md:h-max md:bottom-40">
        <div class="relative z-20 flex  sm:mt-[300px] md:mt-[320px] lg:mt-[170px] xl:mt-[130px] 2xl:mt-[-300px] right-10 invisible  "> <a href="https://aplikasi.kartupetaniberjaya.com/auth/login" target="_blank"
            class="group relative font-bold bg-yellow-main px-2 text-white shadow-md shadow-black/50 hover:bg-green-secondary hover:text-green-main duration-300 rounded-2xl ml-auto  sm:top-[-220px] sm:left-[150px] sm:h-[30px] sm:w-[100px] md:mr-[6px] md:top-[-70px] md:w-[220px] md:left-[200px] md:h-[30px] lg:top-[120px] lg:left-[300px] lg:w-[240px] lg:h-[30px] xl:w-[270px] xl:h-[40px] xl:top-[200px] xl:left-[400px] 2xl:w-[420px] 2xl:h-[60px] 2xl:top-[700px] 2xl:left-[600px]"> <span class="  sm:px-1  md:px-2 lg:px-2 xl:py-2 2xl:py-2 font-Montserrat text-green-main sm:text-[7px]  md:text-[17px] lg:text-[19px] xl:text-[22px] 2xl:text-[35px] ">Daftar/Masuk {{ $organisasi->nama_singkat }} </span> </a> </div>
        <p
            class="judul invisible left-28  text-green-main font-bold relative sm:left-[-70px] sm:top-[-220px] sm:text-[9px]  md:ml-[-100px] md:text-[25px] md:top-[-60px] lg:top-[150px] lg:left-[-160px] lg:text-[40px] 2xl:text-[70px] 2xl:top-[750px] bg-green-main-light bg-opacity-30 font-Montserrat "> {{ $organisasi->nama }}</p>
        <img src="{{ asset('storage/images/hero-potrait03.png') }}"
            class="potrait ml-auto relative sm:invisible md:visible sm:ml-[80px] sm:w-[90px] sm:right-[-50px] sm:top-[-213px] md:w-[200px] md:top-[-63px] md:left-[130px] lg:w-[350px] lg:top-[37px] lg:left-[230px] xl:w-[400px] xl:top-[225px] xl:left-[300px] 2xl:w-[800px] 2xl:top-[835px] 2xl:left-[490px]"
            alt=""> 
        <div class="slider   sm:w-screen sm:h-[150px] md:w-screen md:h-[300px] lg:w-screen lg:h-[400px] xl:w-screen xl:h-[590px] 2xl:w-screen 2xl:h-[1200px]">
            <div class="slides ">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                @foreach($banner as $b)
                <div class="slide @if($loop->iteration === 1) first @endif"> <img src="{{ asset('storage/banner/' . $b->gambar) }}" alt=""> </div>
                @endforeach
            </div>
            <a href="#berita" class="">
            <p class=" text-center text-black bg-green-main-light bg-opacity-30 font-bold sm:text-[5px] md:text-[10px] xl:text-[15px] 2xl:text-[25px] sm:mt-[-380px] md:mt-[-250px] lg:mt-[-150px] xl:mt-[15px] 2xl:mt-[590px]   ">Scroll Ke <br>
                BERITA & ARTIKEL <br>
            </p>
            <p class="justify-center flex"><img src="{{ asset('storage/images/panah.png') }}" class="sm:w-[10px] xl:w-[25px] 2xl:w-[35px]" alt=""></p>
            </a> 
            
            <!--manual navigation start--> 
            <!-- <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div> --> 
            <!--manual navigation end--> 
        </div>
        
        <!--image slider end--> 
        
        <script type="text/javascript">
            var counter = 1;
            setInterval(function () {
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if (counter > 4) {
                    counter = 1;
                }
            }, 5000);
        </script> 
    </div>
    <div class="flex flex-col ">
        <img src="{{ asset('storage/images/1_aset pattern lampung.svg') }}"
        class="absolute -top-100 -left-52 opacity-50 rotate-[121deg] -z-10 md:w-[550px]" alt="" />
        <h1 class=" lg:pl-0 mt-2 md:mt-0 lg:w-5/12 text-green-main font-bold md:text-[50px] lg:text-[40px] text-center md:self-center sm:text[20px]"> {{ $organisasi->nama }} </h1>
    </div>
    <div class="flex flex-col mb-10 md:flex-row md:justify-center md:pt- md:py-20 duration-100 gap-2">
        <h1 class="pl-3 lg:pl-0 mt-6 md:mt-0 z-10 lg:w-5/12 md:text-9xl lg:text-[160px] md:text-center md:self-center sm:text-6xl font-sans "> {{ $organisasi->nama_singkat }} </h1>
        <p class="text-green-main px-7 md:px-0 md:w-5/12 font-medium md:self-center md:text-lg lg:text-2xl"> {{ $organisasi->deskripsi }} </p>
    </div>
    <div class="flex justify-center space-x-2 "> <a href="https://aplikasi.kartupetaniberjaya.com/auth/login" target="_blank"
        class=" bottom-40 font-bold bg-yellow-main px-2 text-white shadow-md shadow-black/50 hover:bg-green-secondary hover:text-green-main duration-300 rounded-2xl  sm:top-[-220px] sm:left-[150px] sm:h-[30px] sm:w-[100px] md:mr-[6px] md:top-[-70px] md:w-[220px] md:left-[200px] md:h-[30px] lg:top-[120px] lg:left-[300px] lg:w-[240px] lg:h-[30px] xl:w-[270px] xl:h-[40px] xl:top-[200px] xl:left-[400px] 2xl:w-[420px] 2xl:h-[60px] 2xl:top-[700px] 2xl:left-[600px]"> <span class="  sm:px-1  md:px-2 lg:px-2 xl:py-2 2xl:py-2 font-Montserrat text-green-main sm:text-[7px]  md:text-[17px] lg:text-[19px] xl:text-[22px] 2xl:text-[35px] ">Daftar/Masuk {{ $organisasi->nama_singkat }} </span> </a> </div>
    <div class="news w-full mt-10" id="berita">
        <h2 class="text-center mb-10 text-2xl md:text-4xl font-bold"> BERITA & ARTIKEL </h2>
        @if(count($berita) > 0)
        <div class="card flex flex-col md:flex-row my-10 justify-center items-center gap-7 md:gap-3 lg:gap-12 duration-100"> 
            
            @foreach($berita as $b)
            <a href="{{ url('/berita/' . $b->slug) }}"
                class="md:w-72 bg-white rounded-xl shadow-md overflow-hidden  sm:w-[350px]   duration-75 hover:shadow-md hover:-translate-y-1 ">
                <div class="sm:flex md:block">
                    <div class="sm:shrink-0"> <img class=" sm:w-40 sm:h-48 h-auto md:w-[350px]   object-cover " src="{{ asset('storage/images/news.jpg') }}" alt=""> </div>
                    <div class="p-6"> 
                    <!-- <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Company retreats</div> -->
                    <p
                            class="block mt-1 text-lg leading-tight hover:underline my-3  text-green-main md:text-base font-bold sm:text-[13px]"> {{ $b->judul }} </p>
                    <p class="text-xs md:text-sm mt-5 text-orange-main font-normal"> {{ $b->member()->first()->ktp()->first()->nama }}, {{$b->created_at->format('m, d/Y')}} </p>
                    </div>
                </div>
            </a>
            @endforeach
            
            
            <div class="flex justify-center"> 
                <a href="{{url('berita')}}" class="group">
                    <h2 class="text-center my-5 text-2xl group-hover:underline"> View More... </h2>
                </a> 
            </div>
        </div>
        @else 
            <div class=" justify-center"> 
                <h2 class="text-center my-5 text-2xl"> Tidak ada Berita </h2>
            </div>
            @endif
    <div class="relative flex flex-col md:flex-row md:justify-between bg-yellow-main h-auto" x-data> <img src="{{ asset('storage/images/pattern1.png') }}" class=" object-cover mt-32  w-72 opacity-50 sm:collapse md:visible  " alt="">
        <div class="relative flex video_containermd:w-8/12 overflow-hidden mx-auto"> <img src="{{ asset('storage/video/' . $video->gambar) }}" class="object-cover" alt="Video Thumbnail" />
        <div class="absolute bg-yellow-main/25 top-0 left-0 w-full h-full flex ">
            <button title="Video" class="rounded-full bg-black/50 hover:bg-black/75 w-24 h-24 text-white m-auto duration-100"
                @click="$dispatch('lightbox', '{{ $video->url }}')"> <i class="fa-solid fa-play fa-2xl"></i> </button>
        </div>
        </div>
        <img src="{{ asset('storage/images/pattern2.png') }}" class="object-cover mt-32 w-72 opacity-50 sm:collapse md:visible " alt=""> </div>
    <!--  --> 
</section>
<!-- Hero End --> 
<!-- Content -->
<section class="relative bg-yellow-main-light py-5 overflow-hidden -z-20 max-w-hd mx-auto "> <!-- News --> 
        <!-- News End --> 
    <!-- Services -->
    <div class="services px-5">
        <div class="bg-yellow-main py-6 md:py-12">
        <h2 class="md:text-4xl">LAYANAN {{ $organisasi->nama_singkat }}</h2>
        @foreach($layanan as $l)
            @if($loop->iteration === 1) <div class="card-container flex flex-col md:flex-row gap-5 px-10 mt-10 lg:px-28"> @endif
            @if($loop->iteration %4 === 0) <div class="card-container flex flex-col md:flex-row gap-5 px-10 mt-10 lg:px-28"> @endif
                <div class="group max-w-[258px] relative hover:bg-orange-main px-4 pb-5 pt-4 mx-auto">
                    <div class="bg-yellow-main text-yellow-main"> 
                        <!-- <img
                            src="./images/2_aset pattern2.svg"
                            class="absolute opacity-50"
                            alt=""
                            /> -->
                        <svg class="absolute fill-green-main/50 group-hover:fill-yellow-main-light/50" viewBox="0 0 1920 141.4"
                            preserveAspectRatio="none">
                        <path
                            d="M1430.6,119.8c-9.8.2-14.3-1.8-13.4-12.1,1-12.3.3-24.8.1-37.2-.1-3.4,1.7-8.6-4.7-9s-6,4.4-5.7,8.2c.6,7.3-2.1,11.1-10.5,10.1-7-.8-11.3,1.4-10.3,8.9.9,7-2.5,10-9.9,9.4-6.4-.6-8.1,3.3-7.3,8.1,2,11.8-4,15.1-15.4,13.6a42,42,0,0,0-8.7-.2c-9.2.8-13.5-2.5-12.1-11.6,1-6.3-.9-10.7-9.1-9.9-6.8.7-8.9-3.1-8.2-8.6,1-8-3.1-10.6-10.8-9.7s-10.7-2.3-9.8-9.3c1.2-9.4-5.4-9.2-12.6-9.5-8.6-.3-10.4,3.5-10.1,10.6.4,13.4-.5,26.8.5,40.2.5,6.4-1,8.1-7.5,8.1-48-.1-96-.2-144,0-7,0-9.5-2.3-9.4-8.7.3-13.2.2-26.4-.1-39.6-.1-3.7,2.5-9.5-4.9-9.8-7.6-.3-5.5,5.5-5.4,9.3.1,9.1-4.9,11.1-13.6,14.3s-13.2,14.4-24.1,16.8c-.6.1-.7,3.7-.4,5.5,1.5,9.8-3,13.5-13.2,12.2a46.63,46.63,0,0,0-11.2,0c-8.1.8-12.8-1.4-11.7-10,.9-7.2-1.2-12.3-10.6-11.8-6.7.4-7.1-4.3-6.8-8.7.5-6.8-1.9-10.4-9.7-9.4s-12-1.5-10.9-9.5c1.1-8.3-4.3-9.2-11.5-9.3-8.4-.1-9.3,4.2-9.2,10.4.2,12.8-.3,25.6.1,38.4.2,7.3-2,10.2-10.5,10.2q-70.8-.45-141.5-.1c-8.4.1-10.7-2.9-10.5-10.3.4-12.8.3-25.6,0-38.4-.1-3.7,2.3-9.5-5.2-9.6-6.4,0-5.3,5-5.2,8.6.4,6.7-1.9,10.4-9.8,9.6s-11.5,2.8-11,10.3c.3,5.1-1.6,8.5-7.7,7.9-9-.9-10.6,4-9.7,10.6,1.4,9.8-3.8,12.3-13,11.2a30.53,30.53,0,0,0-7.4,0c-11.2,1.5-17.6-1.5-15.6-13.5.8-4.7-.8-8.7-7.3-8.1-8.6.9-10.9-3.3-10.1-10.4.7-6.1-2.6-8.8-8.8-8-10.5,1.4-12.8-3.6-11.9-12.1.8-7.4-4.1-8.8-11-8.9s-9.6,2.5-9.5,8.9c.2,14.4-.2,28.7.1,43.1.1,6.3-2.1,9-9.3,9q-72-.3-144,0c-7.1,0-9.4-2.4-9.2-8.9.3-13.6.2-27.2,0-40.7-.1-3.5,1.4-8.6-5.2-8.6-6.3.1-5.5,5.1-5.2,8.6.5,6.9-2,10.3-9.7,9.4-8.5-.9-13.7,1.5-13.1,10.7a4.92,4.92,0,0,1-5.3,5.4c-11.5-1.1-12.4,5.2-12,13.5.4,7.9-5.2,11.5-12.9,10.2-6.9-1.2-18.7,6.3-19.1-8.6-.2-6.6-4.1-11.8-11.7-12.4-6.8-.6-8.2-4.1-7.6-9.4.6-6.1-1.3-10.1-8.8-9.2-9.1,1.1-12.9-2.2-12.1-11,.8-7.8-4.8-9.5-11.9-9.9-9.2-.5-8.5,5.3-8.6,10.7-.1,14-.3,27.9-.1,41.9,0,5.8-2.1,8.3-8.7,8.2q-72-.3-144,0c-6.9,0-9.6-2.2-9.5-8.8.3-13.6.2-27.2,0-40.7-.1-3.5,1.5-8.5-5.1-8.7s-5.7,4.8-5.3,8.3c.7,7.5-2.2,11.1-10.5,9.9s-11.4,2.1-10.5,9.8c.7,5.7-2,9-8.5,8.5-8.3-.7-10,3.8-9.1,10.1,1.3,9.2-3.1,12.8-12.7,11.6a30.53,30.53,0,0,0-7.4,0c-11.2,1.5-17.5-1.4-15.6-13.4.7-4.6-.6-8.8-7.2-8.2-8.5.8-10.9-3.4-10.2-10.5.8-7.7-3.6-10.6-11.2-9.9-6.8.6-10-1.7-9.4-8.5.6-6.2-1.3-10.9-9.5-10.1-7.1.6-9.7-3.5-10-9.1a164.88,164.88,0,0,1,.1-18.6c.4-6.8,4-10,11.9-9.9q64.5.45,129.1,0c8.3-.1,10.7,2.8,10.4,10.2-.5,12.4.2,24.8-.1,37.2-.2,7.2,1,11.5,10.6,11.6,8.9,0,10.8-3.7,10-10.6-1-8,2.6-11.6,11.2-10.5,7.7,1,10.4-2.6,10-9.3-.2-4,1.3-7.2,6.2-6.7,9.9,1,12.2-3.9,11.2-11.8-.9-7.4,2.2-10.9,10.5-9.9a41,41,0,0,0,9.9-.1c11.1-1.3,16.7,2.4,14.9,13.5-.9,5.9,2,8.9,8.4,8.2,7.4-.8,9.6,2.8,8.9,8.9-.8,6.9,2,10.2,9.8,9.4s11.4,2.9,11.1,10.3c-.1,3.8-.4,8.4,6,7.9s5-5.3,5-8.9c.2-12.8.6-25.6-.1-38.4-.5-8.9,3.1-11.2,12.1-11.1,42.6.4,85.3.2,127.9.1,4.6,0,8.9,1.5,13.3,2.1,7,.9,8.8,4.5,8.7,10.4-.2,12.4.3,24.8-.2,37.2-.3,7.7,3.9,9,10.6,8.9,6.1,0,11-.7,9.9-8-1.3-8.5,3.6-11.2,11.5-10.6,7.7.6,10.5-2.5,10-9.4-.4-5.3,1.7-9.4,8.3-9,8.5.6,9.8-4.1,8.9-10.2-1.5-9.8,3.8-12.3,12.9-11.3a36.17,36.17,0,0,0,8.7,0c10.8-1.5,15.5,2.3,13.8,12.8-.8,5.1.5,9.6,7.7,8.8,7.9-.9,10.5,2.9,9.6,9.6-1,7.6,3.4,9.7,10.4,8.8,8.3-1,11.1,2.6,10.8,9.9-.2,3.6-1.1,8.4,5.4,8.4s5.3-5,5.3-8.5c.2-13.6.4-27.2.1-40.7-.1-6.3,1.7-9.1,9-9.1q72,.3,144,0c6.4,0,8.8,2.4,8.7,8.3-.2,13.6.2,27.2-.1,40.7-.1,6.9,2.3,9.8,10,9.6,6.6-.2,11.6-.7,10.7-8.7-.9-7.3,2.1-11,10.5-10,7.8,1,11.7-2.3,10.8-9.9-.7-5.8,1.7-9,8.3-8.4,7.2.7,10.1-2.8,9.1-9-1.7-10.4,3-14.2,13.8-12.7a36.24,36.24,0,0,0,8.7-.1c8.9-.9,14.4,1.3,12.8,11.2-1.1,6.8,1.3,11.4,10,10.6,6.2-.6,7.9,3,7.3,8.1-1.1,8.5,3.5,11.2,11.7,10.2,8-.9,10,3,9.8,9.6-.1,3.6-1.3,8.6,5.1,8.7s5.3-4.9,5.3-8.5c.2-13.6.2-27.2,0-40.7-.1-6.2,1.9-9,9.2-8.9,48,.2,96,.1,144,0,6.4,0,8.8,2.3,8.7,8.2-.3,13.6.1,27.2-.2,40.7-.2,6.6,1.6,9.9,9.7,9.8,7.6-.1,12.1-1.7,11.1-9.6-1-7.2,2.5-10.1,9.9-9.2,8.6,1.1,12.3-2.3,11.4-10.5-.6-5,1.3-8.6,7.5-7.8,9.1,1.1,10.7-4,9.8-10.6-1.2-8.7,2.5-12.2,11.8-11.2a52.42,52.42,0,0,0,11.2,0c9.9-1.2,13.7,2.7,12.3,11.8-.9,6.3,1.1,10.8,9.3,10,6.9-.7,8.5,3.2,8,8.6-.6,6.7,1.9,10.6,9.7,9.7,8.3-1,12.5,1.8,11.7,10.3-.3,3.6-.7,8.5,5.8,8,5.6-.4,4.6-4.7,4.6-8,.1-14,.2-27.9-.1-41.9-.1-5.8,2-8.4,8.6-8.3q72,.3,144,0c7.1,0,9.5,2.6,9.4,8.9-.2,13.6.1,27.2-.2,40.7-.1,7,2.6,11,10.6,11.3,8.6.3,10.9-4.4,10-11.1-1.1-7.7,1.9-10.9,10.2-9.9,7.3.8,12.2-.9,11.1-9.3-.8-6,1.4-9.8,8.8-9.1,6.5.7,9.5-2.5,8.5-8.2-2.1-12.1,4.3-14.9,15.4-13.5a59.87,59.87,0,0,0,11.2.1c7.4-.6,9.4,2.3,8,9-1.4,6.9-.6,13.4,9.8,12.6,6.7-.5,8.8,2.8,8.3,8.5-.6,6.2,2.8,8.6,8.9,7.7,10.4-1.4,13.1,3.6,12.5,12.2-.3,3.7-1,8.6,5.5,8.3s4.9-5.3,4.9-8.8c.2-13.2.4-26.4,0-39.6-.3-7.6,2.6-10,10.7-9.9q70.8.45,141.5,0c7.7,0,10.1,2.7,9.9,9.6-.4,13.2.1,26.4-.2,39.6-.2,6.5,1.3,10.1,9.5,9.7,6.9-.3,11.5-1.6,10.3-9.1-1.3-7.9,2.5-10.7,10.4-9.7,9.4,1.3,12.8-2.7,11.8-11.2-.6-4.7,1.5-7.7,7-7.1,9.7,1.1,11.3-4.1,10.3-11.3-1.1-8.2,2.7-11.4,11.3-10.4a52.42,52.42,0,0,0,11.2,0c9.2-1,14.3,1.6,12.9,11.3-.8,5.9-.1,10.9,8.7,10.3,6.4-.5,8.8,3.3,8.5,8.9-.3,6.6,2.2,10.1,10,9.6,7.2-.4,11.8,2.4,11.4,10.2-.2,3.6-1,8.6,5.7,8,6.3-.6,4.7-5.5,4.7-9.1.2-13.2-.1-26.4.2-39.6.1-3.4-1.9-8.8,4.5-9,6.7-.2,4.6,5.5,4.7,8.8.2,27-.1,53.9.2,80.8.1,6.3-2.6,8-8.8,7.9-48-.1-96-.2-144,.1-8,0-9.7-3.1-9.5-9.8.3-13.2-.2-26.4-.1-39.6,0-4.1.4-8.4-5.6-8.1-4.7.2-5.7,3.7-5.1,7.6,1.1,7.5-2,11-10.3,10s-11.3,2.4-10.3,10c.7,4.9-1.1,8.6-7.3,8.1-8.6-.8-11.2,3.4-10.1,10.4,1.5,9.8-3.6,12.4-12.8,11.4a36.17,36.17,0,0,0-8.7,0c-11.1,1.5-15.2-2.2-14.7-13.3.5-11.8-23.7-8.2-19.1-24.3.4-1.3-3.8-2.4-6.4-2.4a4.82,4.82,0,0,0-1.2,0c-8.8,1.2-12-2.7-11.1-10.6,1-8.4-5.1-7.8-11.2-8.1-6.9-.3-9.6,2.1-9.5,8.7.3,13.2-.3,26.4.3,39.6.4,8.3-3,10.6-11.5,10.5-23.2-.4-46.3-.1-69.5-.1C1476,119.6,1453.3,119.2,1430.6,119.8Z" />
                        </svg>
                    </div>
                    <img src="{{ asset('storage/layanan/' . $l->icon ) }}" class="h-24 mt-12" alt="" />
                    <h3 class="mt-4 text-green-main font-bold text-2xl">{{ 'Layanan ' . $l->nama }}</h3>
                    <p class="text-green-main group-hover:text-white my-4"> {{ $l->deskripsi }}</p>
                </div>
                @if($loop->iteration %3 === 0) </div> @endif
            @endforeach
        <div class="flex justify-center"> <a href="" class="group">
            <h2 class="text-center my-5 text-2xl group-hover:underline "> View More... </h2>
            </a> </div>
        </div>
    </div>
</section>
@endsection