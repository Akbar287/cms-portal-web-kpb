@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section
      class="relative pt-20 bg-yellow-main-light py-5 px-5 md:px-28 overflow-hidden -z-20 w-full min-h-[91vh] max-w-hd mx-auto"
    >
      <h2 class="my-20 text-4xl md:text-[40px]">DOWNLOAD</h2>
      <div class="bg-yellow-main p-4 md:p-8">
        <table class="table-fixed w-full font-semibold mb-4">
          <thead class="bg-[#D2B96B]">
            <th class="text-left w-1/4 p-2">kategori</th>
            <th class="w-1/4 p-2">Title</th>
            <th class="hidden md:table-cell w-1/4 p-2">Konten</th>
            <th class="w-1/4 p-2">Download</th>
          </thead>
          <tbody>
            @foreach($downloads as $download)
            <tr>
              <td class="p-2">{{ $download->kategori()->first()->nama_kategori }}</td>
              <td class="p-2">{{ $download->judul }}</td>
              <td class="text-center p-2 hidden md:table-cell">{{ $download->konten }}</td>
              <td class="text-center items-center p-2">
                <a target="_blank" href={{ url("/download/" . $download->download_id . '/download') }} class="bg-green-main hover:brightness-110 text-white py-2 px-4 rounded-full">Unduh</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- Pagination -->
        <div
          class="pagination bg-white w-fit px-2 py-4 mx-auto my-2 rounded-sm"
        >
        @if($downloads->currentPage() > 1) <a href="{{ url('/downloads?page=1') }}" class="hover:text-orange-main mx-2"><<</a> @endif
        @if($downloads->currentPage() - 1 > 0) <a href="{{ url('/downloads?page=' . $downloads->currentPage() - 1) }}" class="hover:text-orange-main mx-2">{{ $downloads->currentPage() - 1 }}</a> @endif
        <a href="{{ url('/downloads?page=' . $downloads->currentPage()) }}" class="hover:text-orange-main mx-2">{{ $downloads->currentPage() }}</a>
        @if($downloads->currentPage() + 1 < $downloads->lastPage()) <a href="{{ url('/downloads?page=' . $downloads->currentPage() + 1) }}" class="hover:text-orange-main mx-2">{{ $downloads->currentPage() + 1 }}</a> @endif
        @if($downloads->currentPage() < $downloads->lastPage()) <a href="{{ url('/downloads?page=' . $downloads->lastPage()) }}" class="hover:text-orange-main mx-2">>></a> @endif
        </div>
        <!-- Pagination End -->
      </div>
    </section>
@endsection