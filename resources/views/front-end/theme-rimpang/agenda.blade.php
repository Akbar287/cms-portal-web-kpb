@extends('front-end.theme-rimpang.layout.layout')

@section('content')
<section
    class="relative pt-20 bg-yellow-main-light py-5 overflow-hidden -z-20 w-full min-h-[91vh] max-w-hd mx-auto"
>
    <h2 class="my-20 text-4xl md:text-[40px]">AGENDA</h2>
        <div class="px-4 md:px-20">
            <div class="flex flex-col font-bold gap-6">
                @foreach($agenda as $a)
                <div
                    class="flex flex-col md:flex-row gap-6 bg-yellow-main p-3 md:p-7"
                >
                    <div>
                    <img src="{{asset('storage/event/' . $a->gambar)}}" class="w-full md:w-64" alt="" />
                    </div>
                    <div class="flex flex-col flex-1 gap-6 justify-between">
                    <p class="text-green-main text-xl">
                        {{ $a->judul }}
                    </p>
                    <p class="text-green-main flex-1">
                        {{ $a->prolog }}
                    </p>
                    <div class="flex justify-between items-end">
                        <div class="flex justify-between gap-6">
                        <p>{{ $a->created_at->format('m Y') }}</p>
                        </div>
                        <a
                        href="{{ url('/agenda/'. $a->slug) }}"
                        class="text-white bg-black hover:bg-gray-800 px-4 py-2 rounded-full duration-100"
                        >Read More</a
                        >
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="pagination bg-white w-fit px-2 py-4 mx-auto my-2 rounded-sm">
        @if($agenda->currentPage() > 1) <a href="{{ url('/agenda?page=1') }}" class="hover:text-orange-main mx-2"><<</a> @endif
            @if($agenda->currentPage() - 1 > 0) <a href="{{ url('/agenda?page=' . $agenda->currentPage() - 1) }}" class="hover:text-orange-main mx-2">{{ $agenda->currentPage() - 1 }}</a> @endif
            <a href="{{ url('/agenda?page=' . $agenda->currentPage()) }}" class="hover:text-orange-main mx-2">{{ $agenda->currentPage() }}</a>
            @if($agenda->currentPage() + 1 < $agenda->lastPage()) <a href="{{ url('/agenda?page=' . $agenda->currentPage() + 1) }}" class="hover:text-orange-main mx-2">{{ $agenda->currentPage() + 1 }}</a> @endif
            @if($agenda->currentPage() < $agenda->lastPage()) <a href="{{ url('/agenda?page=' . $agenda->lastPage()) }}" class="hover:text-orange-main mx-2">>></a> @endif
    </div>
    <!-- Pagination End -->
</section>
@endsection