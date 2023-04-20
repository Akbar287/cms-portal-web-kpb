<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- General Info -->
    <meta name="nama" content="{{ Auth::user()->member()->first()->ktp()->first()->nama }}">
    <meta name="id_user" content="{{ Auth::user()->member()->first()->id_member }}">
    <meta name="kartu" content="{{ asset('/images/KPB.png') }}">

    <title>{{ config('app.name', 'Admin CMS e-KPB') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    @if(Route::currentRouteName() == 'event' || Route::currentRouteName() == 'event.create' || Route::currentRouteName() == 'event.show' || Route::currentRouteName() == 'event.edit')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-id-ID.js" defer></script>
    @endif
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="div-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown d-flex">
                        <a href="{{ url('/profil') }}" class="nav-link nav-link-lg nav-link-user">
                            <img alt="profile"
                                src="{{ asset('/storage/profile_img/' . Auth::user()->member()->first()->avatar) }}"
                                class="rounded-circle mr-1">
                        </a>
                        <a href="{{ url('/notifikasi') }}" class="nav-link nav-link-lg nav-link-user">
                            <i class="fas fa-bell"></i>
                        </a>
                        <a href="{{ route('logout') }}" class="nav-link nav-link-lg nav-link-user" id="logout-btn"
                            onclick="event.preventDefault();">
                            <i class="fas fa-sign-out-alt"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand align-items-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/images/logo.png') }}" alt="logo" class="img-responsive" width="30">
                            Admin CMS e-KPB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/images/logo.png') }}" alt="logo" class="img-responsive" width="30">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Utama</li>
                        <li class="{{ (Route::currentRouteName() == 'home') ? 'active': '' }}"><a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'member') ? 'active': '' }}"><a class="nav-link" href="{{ url('/member') }}"><i class="fas fa-users"></i><span>Member</span></a></li>

                        <li class="menu-header">Menu Pengaturan</li>
                        <li class="{{ (Route::currentRouteName() == 'organisasi' || Route::currentRouteName() == 'organisasi.create' || Route::currentRouteName() == 'organisasi.show' || Route::currentRouteName() == 'organisasi.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/organisasi') }}"><i class="fas fa-building"></i><span>Organisasi</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'layanan' || Route::currentRouteName() == 'layanan.create' || Route::currentRouteName() == 'layanan.show' || Route::currentRouteName() == 'layanan.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/layanan') }}"><i class="fas fa-server"></i><span>Layanan</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'banner' || Route::currentRouteName() == 'banner.create' || Route::currentRouteName() == 'banner.show' || Route::currentRouteName() == 'banner.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/banner') }}"><i class="fas fa-file-image"></i><span>Banner</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'video' || Route::currentRouteName() == 'video.create' || Route::currentRouteName() == 'video.show' || Route::currentRouteName() == 'video.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/video') }}"><i class="fas fa-file-video"></i><span>Video</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'sosial-media' || Route::currentRouteName() == 'sosial-media.create' || Route::currentRouteName() == 'sosial-media.show' || Route::currentRouteName() == 'sosial-media.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/sosial-media') }}"><i class="fas fa-globe"></i><span>Sosial Media</span></a></li>

                        <li class="menu-header">Acara</li>
                        <li class="{{ (Route::currentRouteName() == 'tentang' || Route::currentRouteName() == 'tentang.create' || Route::currentRouteName() == 'tentang.show' || Route::currentRouteName() == 'tentang.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/tentang') }}"><i class="fas fa-info"></i><span>Tentang Kami</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'visi-misi' || Route::currentRouteName() == 'visi-misi.create' || Route::currentRouteName() == 'visi-misi.show' || Route::currentRouteName() == 'visi-misi.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/visi-misi') }}"><i class="fas fa-arrow-circle-up"></i><span>Visi Misi</span></a></li>

                        <li class="menu-header">Acara</li>
                        <li class="{{ (Route::currentRouteName() == 'event' || Route::currentRouteName() == 'event.create' || Route::currentRouteName() == 'event.show' || Route::currentRouteName() == 'event.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/event') }}"><i class="fas fa-newspaper"></i><span>Event</span></a></li>
                        
                        <li class="menu-header">Download</li>
                        <li class="{{ (Route::currentRouteName() == 'kategori' || Route::currentRouteName() == 'kategori.create' || Route::currentRouteName() == 'kategori.show' || Route::currentRouteName() == 'kategori.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/kategori') }}"><i class="fas fa-archive"></i><span>Kategori</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'download' || Route::currentRouteName() == 'download.create' || Route::currentRouteName() == 'download.show' || Route::currentRouteName() == 'download.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/download') }}"><i class="fas fa-download"></i><span>Download</span></a></li>

                        <li class="menu-header">Gallery</li>
                        <li class="{{ (Route::currentRouteName() == 'gallery.foto' || Route::currentRouteName() == 'gallery.foto.create' || Route::currentRouteName() == 'gallery.foto.show' || Route::currentRouteName() == 'gallery.foto.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/gallery/foto') }}"><i class="fas fa-file-image"></i><span>Foto</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'gallery.video' || Route::currentRouteName() == 'gallery.video.create' || Route::currentRouteName() == 'gallery.video.show' || Route::currentRouteName() == 'gallery.video.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/gallery/video') }}"><i class="fas fa-file-video"></i><span>Video</span></a></li>

                        <li class="menu-header">Hubungi</li>
                        <li class="{{ (Route::currentRouteName() == 'hubungi' || Route::currentRouteName() == 'hubungi.create' || Route::currentRouteName() == 'hubungi.show' || Route::currentRouteName() == 'hubungi.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/hubungi') }}"><i class="fas fa-phone"></i><span>Hubungi</span></a></li>
                        <li class="{{ (Route::currentRouteName() == 'hubungi-kami' || Route::currentRouteName() == 'hubungi-kami.create' || Route::currentRouteName() == 'hubungi-kami.show' || Route::currentRouteName() == 'hubungi-kami.edit') ? 'active': '' }}"><a class="nav-link" href="{{ url('/hubungi-kami') }}"><i class="fas fa-comment-dots"></i><span>Hubungi Kami</span></a></li>
                    </ul>
                </aside>
            </div>
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Lampung {{ now()->year }} <div class="bullet"></div> Sistem e-KPB
                </div>
            </footer>
        </div>
    </div>
</body>

</html>