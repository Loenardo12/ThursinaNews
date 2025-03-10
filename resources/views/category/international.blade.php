@extends('layout.app')

@section('content')


    {{-- lastest world news header --}}
    <section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[26px] leading-[39px]">
                Latest Hot News <br />
                world News
            </h2>
            <p
                class="badge-orange rounded-full p-[8px_18px] bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">
                UP TO DATE</p>
        </div>


        {{-- lastest news content --}}
        <div class="grid grid-cols-3 gap-[30px]">
            @foreach ($news['results'] as $article)
                <div
                    class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
                    <div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
                        <a href="{{ $article['href'] }}" target="_blank" class="card-news">
                            <p
                                class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
                                {{ $article['source']['location']['country_name'] }}
                            </p>
                            @if (!empty($article['image']))
                                <img src="{{ $article['image'] }}" class="object-cover w-full h-full" alt="thumbnail">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top"
                                    alt="No Image Available">
                            @endif

                        </a>
                    </div>
                    <div class="card-info flex flex-col gap-[6px]">
                        <h3 class="font-bold text-lg leading-[27px]">{{ $article['title'] }}</h3>
                        <p class="text-sm leading-[21px] text-[#A3A6AE]">Author: <a
                                href="{{ $article['source']['home_page_url'] }}"
                                target="_blank">{{ $article['source']['domain'] }}</a></p>
                        <p class="text-sm leading-[21px] text-[#A3A6AE]">Publish Date:
                            {{ \Carbon\Carbon::parse($article['published_at'])->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            @endforeach

            {{-- <div class="d-flex justify-content-between mt-3">
            @if ($news['has_previous_page'])
                <a href="{{ $news['previous_page'] }}" class="btn btn-primary">Previous Page</a>
            @endif
            @if ($news['has_next_pages'])
                <a href="{{ $news['next_page'] }}" class="btn btn-primary">Next Page</a>
            @endif
        </div> --}}
        </div>
    </section>

    <script src="js/two-lines-text.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
@endsection
