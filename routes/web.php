<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\ThemeRimpangController::class, 'index'])->name('front.home');
Route::get('/profile-about', [App\Http\Controllers\ThemeRimpangController::class, 'about'])->name('front.about');
Route::get('/profile-visi', [App\Http\Controllers\ThemeRimpangController::class, 'visi'])->name('front.visi');
Route::get('/gallery-foto', [App\Http\Controllers\ThemeRimpangController::class, 'galleryFoto'])->name('front.gallery.foto');
Route::get('/gallery-video', [App\Http\Controllers\ThemeRimpangController::class, 'galleryVideo'])->name('front.gallery.video');
Route::get('/kontak', [App\Http\Controllers\ThemeRimpangController::class, 'kontak'])->name('front.kontak');
Route::post('/kontak', [App\Http\Controllers\ThemeRimpangController::class, 'kontak_store'])->name('front.kontak.store');
Route::get('/downloads', [App\Http\Controllers\ThemeRimpangController::class, 'download'])->name('front.download');

Route::get('/berita', [App\Http\Controllers\ThemeRimpangController::class, 'berita'])->name('front.berita');
Route::get('/berita/{slug}', [App\Http\Controllers\ThemeRimpangController::class, 'beritaDetail'])->name('front.berita.detail');
Route::get('/agenda', [App\Http\Controllers\ThemeRimpangController::class, 'agenda'])->name('front.agenda');
Route::get('/agenda/{slug}', [App\Http\Controllers\ThemeRimpangController::class, 'agendaDetail'])->name('front.agenda.detail');

Route::get('/download/{download}/download', [App\Http\Controllers\DownloadController::class, 'download'])->name('download.download');

Route::middleware('auth')->group(function ($route) {    
    $route->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    $route->get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    $route->get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
    $route->get('/member/create', [App\Http\Controllers\MemberController::class, 'create'])->name('member.create');
    $route->get('/member/{member}', [App\Http\Controllers\MemberController::class, 'show'])->name('member.show');
    $route->post('/member', [App\Http\Controllers\MemberController::class, 'store'])->name('member.store');
    $route->get('/member/{member}/edit', [App\Http\Controllers\MemberController::class, 'edit'])->name('member.edit');
    $route->put('/member/{member}', [App\Http\Controllers\MemberController::class, 'update'])->name('member.update');
    $route->delete('/member/{member}', [App\Http\Controllers\MemberController::class, 'destroy'])->name('member.delete');
    
    $route->get('/activity', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activity');
    $route->get('/activity/{activity}', [App\Http\Controllers\ActivityLogController::class, 'show'])->name('activity.show');
    $route->get('/activity/create', [App\Http\Controllers\ActivityLogController::class, 'create'])->name('activity.create');
    $route->post('/activity', [App\Http\Controllers\ActivityLogController::class, 'store'])->name('activity.store');
    $route->get('/activity/{activity}/edit', [App\Http\Controllers\ActivityLogController::class, 'edit'])->name('activity.edit');
    $route->put('/activity/{activity}', [App\Http\Controllers\ActivityLogController::class, 'update'])->name('activity.update');
    $route->delete('/activity/{activity}', [App\Http\Controllers\ActivityLogController::class, 'destroy'])->name('activity.delete');
    
    $route->get('/aplikasi', [App\Http\Controllers\AplikasiController::class, 'index'])->name('aplikasi');
    $route->get('/aplikasi/{aplikasi}', [App\Http\Controllers\AplikasiController::class, 'show'])->name('aplikasi.show');
    $route->get('/aplikasi/create', [App\Http\Controllers\AplikasiController::class, 'create'])->name('aplikasi.create');
    $route->post('/aplikasi', [App\Http\Controllers\AplikasiController::class, 'store'])->name('aplikasi.store');
    $route->get('/aplikasi/{aplikasi}/edit', [App\Http\Controllers\AplikasiController::class, 'edit'])->name('aplikasi.edit');
    $route->put('/aplikasi/{aplikasi}', [App\Http\Controllers\AplikasiController::class, 'update'])->name('aplikasi.update');
    $route->delete('/aplikasi/{aplikasi}', [App\Http\Controllers\AplikasiController::class, 'destroy'])->name('aplikasi.delete');
    
    $route->get('/banner', [App\Http\Controllers\BannerController::class, 'index'])->name('banner');
    $route->get('/banner/create', [App\Http\Controllers\BannerController::class, 'create'])->name('banner.create');
    $route->get('/banner/{banner}', [App\Http\Controllers\BannerController::class, 'show'])->name('banner.show');
    $route->post('/banner', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');
    $route->get('/banner/{banner}/edit', [App\Http\Controllers\BannerController::class, 'edit'])->name('banner.edit');
    $route->put('/banner/{banner}', [App\Http\Controllers\BannerController::class, 'update'])->name('banner.update');
    $route->delete('/banner/{banner}', [App\Http\Controllers\BannerController::class, 'destroy'])->name('banner.delete');
    
    $route->get('/download', [App\Http\Controllers\DownloadController::class, 'index'])->name('download');
    $route->get('/download/create', [App\Http\Controllers\DownloadController::class, 'create'])->name('download.create');
    $route->get('/download/{download}', [App\Http\Controllers\DownloadController::class, 'show'])->name('download.show');
    $route->post('/download', [App\Http\Controllers\DownloadController::class, 'store'])->name('download.store');
    $route->get('/download/{download}/edit', [App\Http\Controllers\DownloadController::class, 'edit'])->name('download.edit');
    $route->put('/download/{download}', [App\Http\Controllers\DownloadController::class, 'update'])->name('download.update');
    $route->delete('/download/{download}', [App\Http\Controllers\DownloadController::class, 'destroy'])->name('download.delete');
    
    $route->get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori');
    $route->get('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('kategori.create');
    $route->get('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'show'])->name('kategori.show');
    $route->post('/kategori', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
    $route->get('/kategori/{kategori}/edit', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
    $route->put('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');
    $route->delete('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.delete');
    
    $route->get('/event', [App\Http\Controllers\EventController::class, 'index'])->name('event');
    $route->get('/event/create', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
    $route->get('/event/{event}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');
    $route->post('/event', [App\Http\Controllers\EventController::class, 'store'])->name('event.store');
    $route->get('/event/{event}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
    $route->put('/event/{event}', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    $route->delete('/event/{event}', [App\Http\Controllers\EventController::class, 'destroy'])->name('event.delete');
    
    $route->get('/gallery/foto', [App\Http\Controllers\GalleryFotoController::class, 'index'])->name('gallery.foto');
    $route->get('/gallery/foto/create', [App\Http\Controllers\GalleryFotoController::class, 'create'])->name('gallery.foto.create');
    $route->get('/gallery/foto/{galleryFoto}', [App\Http\Controllers\GalleryFotoController::class, 'show'])->name('gallery.foto.show');
    $route->post('/gallery/foto', [App\Http\Controllers\GalleryFotoController::class, 'store'])->name('gallery.foto.store');
    $route->get('/gallery/foto/{galleryFoto}/edit', [App\Http\Controllers\GalleryFotoController::class, 'edit'])->name('gallery.foto.edit');
    $route->put('/gallery/foto/{galleryFoto}', [App\Http\Controllers\GalleryFotoController::class, 'update'])->name('gallery.foto.update');
    $route->delete('/foto/{galleryFoto}', [App\Http\Controllers\GalleryFotoController::class, 'destroy'])->name('gallery.foto.delete');
    
    $route->get('/gallery/video', [App\Http\Controllers\GalleryVideoController::class, 'index'])->name('gallery.video');
    $route->get('/gallery/video/create', [App\Http\Controllers\GalleryVideoController::class, 'create'])->name('gallery.video.create');
    $route->get('/gallery/video/{galleryVideo}', [App\Http\Controllers\GalleryVideoController::class, 'show'])->name('gallery.video.show');
    $route->post('/gallery/video', [App\Http\Controllers\GalleryVideoController::class, 'store'])->name('gallery.video.store');
    $route->get('/gallery/video/{galleryVideo}/edit', [App\Http\Controllers\GalleryVideoController::class, 'edit'])->name('gallery.video.edit');
    $route->put('/gallery/video/{galleryVideo}', [App\Http\Controllers\GalleryVideoController::class, 'update'])->name('gallery.video.update');
    $route->delete('/gallery/video/{galleryVideo}', [App\Http\Controllers\GalleryVideoController::class, 'destroy'])->name('gallery.video.delete');
    
    $route->get('/hubungi', [App\Http\Controllers\HubungiController::class, 'index'])->name('hubungi');
    $route->get('/hubungi/create', [App\Http\Controllers\HubungiController::class, 'create'])->name('hubungi.create');
    $route->get('/hubungi/{hubungi}', [App\Http\Controllers\HubungiController::class, 'show'])->name('hubungi.show');
    $route->post('/hubungi', [App\Http\Controllers\HubungiController::class, 'store'])->name('hubungi.store');
    $route->get('/hubungi/{hubungi}/edit', [App\Http\Controllers\HubungiController::class, 'edit'])->name('hubungi.edit');
    $route->put('/hubungi/{hubungi}', [App\Http\Controllers\HubungiController::class, 'update'])->name('hubungi.update');
    $route->delete('/hubungi/{hubungi}', [App\Http\Controllers\HubungiController::class, 'destroy'])->name('hubungi.delete');
    
    $route->get('/hubungi-kami', [App\Http\Controllers\HubungiKamiController::class, 'index'])->name('hubungi-kami');
    $route->get('/hubungi-kami/create', [App\Http\Controllers\HubungiKamiController::class, 'create'])->name('hubungi-kami.create');
    $route->get('/hubungi-kami/{hubungiKami}', [App\Http\Controllers\HubungiKamiController::class, 'show'])->name('hubungi-kami.show');
    $route->post('/hubungi-kami', [App\Http\Controllers\HubungiKamiController::class, 'store'])->name('hubungi-kami.store');
    $route->get('/hubungi-kami/{hubungiKami}/edit', [App\Http\Controllers\HubungiKamiController::class, 'edit'])->name('hubungi-kami.edit');
    $route->put('/hubungi-kami/{hubungiKami}', [App\Http\Controllers\HubungiKamiController::class, 'update'])->name('hubungi-kami.update');
    $route->delete('/hubungi-kami/{hubungiKami}', [App\Http\Controllers\HubungiKamiController::class, 'destroy'])->name('hubungi-kami.delete');

    $route->get('/layanan', [App\Http\Controllers\LayananController::class, 'index'])->name('layanan');
    $route->get('/layanan/create', [App\Http\Controllers\LayananController::class, 'create'])->name('layanan.create');
    $route->get('/layanan/{layanan}', [App\Http\Controllers\LayananController::class, 'show'])->name('layanan.show');
    $route->post('/layanan', [App\Http\Controllers\LayananController::class, 'store'])->name('layanan.store');
    $route->get('/layanan/{layanan}/edit', [App\Http\Controllers\LayananController::class, 'edit'])->name('layanan.edit');
    $route->put('/layanan/{layanan}', [App\Http\Controllers\LayananController::class, 'update'])->name('layanan.update');
    $route->delete('/layanan/{layanan}', [App\Http\Controllers\LayananController::class, 'destroy'])->name('layanan.delete');
    
    $route->get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori');
    $route->get('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'show'])->name('kategori.show');
    $route->get('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('kategori.create');
    $route->post('/kategori', [App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
    $route->get('/kategori/{kategori}/edit', [App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
    $route->put('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');
    $route->delete('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.delete');
    
    $route->get('/organisasi', [App\Http\Controllers\OrganisasiController::class, 'index'])->name('organisasi');
    $route->get('/organisasi/create', [App\Http\Controllers\OrganisasiController::class, 'create'])->name('organisasi.create');
    $route->get('/organisasi/{organisasi}', [App\Http\Controllers\OrganisasiController::class, 'show'])->name('organisasi.show');
    $route->post('/organisasi', [App\Http\Controllers\OrganisasiController::class, 'store'])->name('organisasi.store');
    $route->get('/organisasi/{organisasi}/edit', [App\Http\Controllers\OrganisasiController::class, 'edit'])->name('organisasi.edit');
    $route->put('/organisasi/{organisasi}', [App\Http\Controllers\OrganisasiController::class, 'update'])->name('organisasi.update');
    $route->delete('/organisasi/{organisasi}', [App\Http\Controllers\OrganisasiController::class, 'destroy'])->name('organisasi.delete');
    
    $route->get('/sosial-media', [App\Http\Controllers\SosialMediaController::class, 'index'])->name('sosial-media');
    $route->get('/sosial-media/create', [App\Http\Controllers\SosialMediaController::class, 'create'])->name('sosial-media.create');
    $route->get('/sosial-media/{sosialMedia}', [App\Http\Controllers\SosialMediaController::class, 'show'])->name('sosial-media.show');
    $route->post('/sosial-media', [App\Http\Controllers\SosialMediaController::class, 'store'])->name('sosial-media.store');
    $route->get('/sosial-media/{sosialMedia}/edit', [App\Http\Controllers\SosialMediaController::class, 'edit'])->name('sosial-media.edit');
    $route->put('/sosial-media/{sosialMedia}', [App\Http\Controllers\SosialMediaController::class, 'update'])->name('sosial-media.update');
    $route->delete('/sosial-media/{sosialMedia}', [App\Http\Controllers\SosialMediaController::class, 'destroy'])->name('sosial-media.delete');
    
    $route->get('/tentang', [App\Http\Controllers\TentangKamiController::class, 'index'])->name('tentang');
    $route->get('/tentang/create', [App\Http\Controllers\TentangKamiController::class, 'create'])->name('tentang.create');
    $route->get('/tentang/{tentangKami}', [App\Http\Controllers\TentangKamiController::class, 'show'])->name('tentang.show');
    $route->post('/tentang', [App\Http\Controllers\TentangKamiController::class, 'store'])->name('tentang.store');
    $route->get('/tentang/{tentangKami}/edit', [App\Http\Controllers\TentangKamiController::class, 'edit'])->name('tentang.edit');
    $route->put('/tentang/{tentangKami}', [App\Http\Controllers\TentangKamiController::class, 'update'])->name('tentang.update');
    $route->delete('/tentang/{tentangKami}', [App\Http\Controllers\TentangKamiController::class, 'destroy'])->name('tentang.delete');
    
    $route->get('/video', [App\Http\Controllers\VideoController::class, 'index'])->name('video');
    $route->get('/video/create', [App\Http\Controllers\VideoController::class, 'create'])->name('video.create');
    $route->get('/video/{video}', [App\Http\Controllers\VideoController::class, 'show'])->name('video.show');
    $route->post('/video', [App\Http\Controllers\VideoController::class, 'store'])->name('video.store');
    $route->get('/video/{video}/edit', [App\Http\Controllers\VideoController::class, 'edit'])->name('video.edit');
    $route->put('/video/{video}', [App\Http\Controllers\VideoController::class, 'update'])->name('video.update');
    $route->delete('/video/{video}', [App\Http\Controllers\VideoController::class, 'destroy'])->name('video.delete');
    
    $route->get('/visi-misi', [App\Http\Controllers\VisiMisiController::class, 'index'])->name('visi-misi');
    $route->get('/visi-misi/create', [App\Http\Controllers\VisiMisiController::class, 'create'])->name('visi-misi.create');
    $route->get('/visi-misi/{visiMisi}', [App\Http\Controllers\VisiMisiController::class, 'show'])->name('visi-misi.show');
    $route->post('/visi-misi', [App\Http\Controllers\VisiMisiController::class, 'store'])->name('visi-misi.store');
    $route->get('/visi-misi/{visiMisi}/edit', [App\Http\Controllers\VisiMisiController::class, 'edit'])->name('visi-misi.edit');
    $route->put('/visi-misi/{visiMisi}', [App\Http\Controllers\VisiMisiController::class, 'update'])->name('visi-misi.update');
    $route->delete('/visi-misi/{visiMisi}', [App\Http\Controllers\VisiMisiController::class, 'destroy'])->name('visi-misi.delete');
});
